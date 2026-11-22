<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIEstimatorController extends Controller
{
    public function index()
    {
        return view('ai-estimator');
    }

    public function generateEstimate(Request $request)
    {
        set_time_limit(120);

        $request->validate([
            'prompt' => 'required|string|max:1500',
        ]);

        $userPrompt = $request->input('prompt');

        // Konfigurasi 9Router (OpenAI-compatible)
        $baseUrl     = rtrim(config('services.ninerouter.base_url', config('services.ai.base_url', 'http://192.168.1.3:20128/v1')), '/');
        $apiKey      = config('services.ninerouter.api_key', config('services.ai.api_key'));
        $model       = config('services.ninerouter.model', config('services.ai.model', 'pratama_ai'));
        $temperature = (float) config('services.ninerouter.temperature', config('services.ai.temperature', 0.3));

        // Database Grounding: Ambil contoh karya portofolio studio dari database sebagai referensi material & spesifikasi
        $portfolioGrounding = '';
        try {
            $portfolioItems = \App\Models\Portfolio::published()
                ->with('category')
                ->limit(8)
                ->get(['title', 'project_type', 'room_type', 'design_style']);

            if ($portfolioItems->isNotEmpty()) {
                $portfolioGrounding = "\nACUAN SPESIFIKASI & PORTOFOLIO NYATA STUDIO:\n" .
                    $portfolioItems->map(fn($p) => "- {$p->title} (Tipe: {$p->project_type}, Ruang: {$p->room_type}, Gaya: {$p->design_style})")->implode("\n") . "\n";
            }
        } catch (\Throwable $e) {
            $portfolioGrounding = '';
        }

        $systemPrompt = "Kamu adalah Senior Interior Designer dan Quantity Surveyor di Pratama Design Studio (Semarang, Indonesia).
Tugasmu adalah membaca spesifikasi, ukuran, dan kebutuhan renovasi/desain ruangan dari klien, lalu menghasilkan draf estimasi Rencana Anggaran Biaya (RAB) sederhana yang realistis dan akurat dalam Rupiah (Rp).

PATOKAN TARIF RESMI COMPANY PROFILE PRATAMA DESIGN STUDIO:
- Jasa Desain Interior: Rp 150.000 – Rp 250.000 / m² (konseptual, 3D render realistis, denah 2D, gambar kerja arsitektur & MEP).
- Jasa Renovasi / Build: Rp 350.000 – Rp 400.000 / m² (pekerjaan sipil dasar, fit-out, pembongkaran, partisi, plester/cat).
- Custom Furniture: Dihitung per unit/meter lari (m1) standar multiplex/plywood finishing HPL/Duco di workshop Pratama.
{$portfolioGrounding}
PERATURAN MUTLAK FORMAT KELUARAN:
1. Jawab HANYA dalam format JSON murni yang valid tanpa awalan markdown seperti ```json, tanpa teks pembuka atau penutup apapun.
2. Nilai 'grand_total' WAJIB sama persis dengan hasil penjumlahan seluruh nilai 'total' dari setiap item pada array 'items'.

Struktur JSON yang WAJIB dikembalikan:
{
  \"items\": [
    {
      \"nama_pekerjaan\": \"contoh: Jasa Desain Interior & Gambar Kerja (20 m2)\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 200000,
      \"total\": 4000000
    },
    {
      \"nama_pekerjaan\": \"contoh: Pemasangan Lantai SPC 4mm & Underlayer\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 250000,
      \"total\": 5000000
    }
  ],
  \"grand_total\": 9000000,
  \"catatan\": \"Catatan singkat mengenai durasi pengerjaan, patokan tarif resmi Pratama Design Studio Semarang, dan rekomendasi konsultasi awal gratis.\"
}";

        $url = $baseUrl . '/chat/completions';

        try {
            $req = Http::timeout(120);
            if (!empty($apiKey)) {
                $req = $req->withToken($apiKey);
            }

            $response = $req->post($url, [
                'model'       => $model,
                'messages'    => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user',   'content' => "Spesifikasi & Kebutuhan Klien:\n" . $userPrompt],
                ],
                'temperature' => $temperature,
                'max_tokens'  => 2500,
                'stream'      => false,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $rawText = $data['choices'][0]['message']['content'] ?? '';

                // 1. Sanitasi reasoning tokens dari model pratama_ai
                $reply = preg_replace('/<think>.*?<\/think>/s', '', $rawText);
                $reply = trim($reply);

                // 2. Bersihkan blok markdown jika ada
                if (preg_match('/```(?:json)?\s*(.*?)\s*```/s', $reply, $matches)) {
                    $reply = $matches[1];
                }

                // 3. Validasi JSON
                $decoded = json_decode(trim($reply), true);
                if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded) || !isset($decoded['items'])) {
                    Log::error('AI Estimator Invalid JSON response: ' . $reply);
                    return response()->json([
                        'error' => 'Format estimasi AI tidak valid. Silakan coba lagi dengan spesifikasi ruangan yang lebih spesifik.'
                    ], 500);
                }

                // 4. Rekonsiliasi matematis grand_total agar 100% konsisten
                $sumTotal = 0;
                foreach ($decoded['items'] as &$item) {
                    $vol = isset($item['volume']) ? (float) $item['volume'] : 1;
                    $hrg = isset($item['harga_satuan']) ? (int) $item['harga_satuan'] : 0;
                    $tot = isset($item['total']) ? (int) $item['total'] : (int) ($vol * $hrg);
                    $item['total'] = $tot;
                    $sumTotal += $tot;
                }
                unset($item);

                if (!isset($decoded['grand_total']) || (int) $decoded['grand_total'] === 0) {
                    $decoded['grand_total'] = $sumTotal;
                }

                return response()->json(['data' => $decoded]);
            } else {
                Log::error('9Router API Error (Estimator): status ' . $response->status() . ' - ' . $response->body());
                return response()->json([
                    'error' => 'Layanan estimasi AI sedang mengalami gangguan sementara. Silakan coba beberapa saat lagi.'
                ], 502);
            }
        } catch (\Throwable $e) {
            Log::error('AI Estimator Exception: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan sistem saat memproses estimasi AI. Silakan coba lagi.'
            ], 500);
        }
    }
}
