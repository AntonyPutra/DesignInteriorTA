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

        $systemPrompt = "Kamu adalah Principal Interior Designer dan Senior Quantity Surveyor di Pratama Design Studio (PT Pratama Berkah Utama).
Tugasmu adalah membedah kebutuhan ruangan dari klien dan menyusun draf Rencana Anggaran Biaya (RAB) interior yang sangat cerdas, realistis, dan berkelas tinggi dalam mata uang Rupiah (Rp).

ATURAN STRUKTUR ITEM PEKERJAAN (INTERIOR FIT-OUT KELAS STUDIO):
- JANGAN menyusun pekerjaan tukang kasar biasa (jangan gunakan item seperti 'plester semen', 'keramik murah').
- SELALU susun item pekerjaan interior berkualitas standar workshop Pratama:
  1. Jasa Desain & Gambar Kerja (3D rendering fotorealistis & DED 2D): Rp 150.000 – Rp 250.000 / m²
  2. Custom Furniture Workshop (Plywood 18mm finish HPL Taco/Duco, engsel soft-close): Wardrobe, Bed frame, Kitchen cabinet, Meja rias, Backdrop TV, Credenza gantung (Rp 2.200.000 – Rp 3.500.000 per unit atau per meter lari)
  3. Lantai Interior (Lantai SPC 4mm / Vinyl Tile dengan Underlayer Foam anti-lembab): Rp 200.000 – Rp 280.000 / m²
  4. Plafon & Lighting (Drop Ceiling Gypsum board & Hidden LED Strip Warm White 3000K): Rp 180.000 – Rp 250.000 / m²
  5. Wall Treatment (Panel Kisi-kisi Kayu Wood Slat / Wall Moulding / Marmer Sintetis Backdrop): Rp 450.000 – Rp 950.000 / m²
{$portfolioGrounding}
PERATURAN MUTLAK FORMAT KELUARAN:
1. Jawab HANYA dalam format JSON murni yang valid tanpa awalan markdown seperti ```json, tanpa teks pembuka atau penutup apapun.
2. Nilai 'grand_total' WAJIB sama persis dengan hasil penjumlahan seluruh nilai 'total' dari setiap item pada array 'items'.

Struktur JSON yang WAJIB dikembalikan:
{
  \"items\": [
    {
      \"nama_pekerjaan\": \"contoh: Jasa Desain 3D Fotorealistis & Gambar Kerja DED (20 m2)\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 200000,
      \"total\": 4000000
    },
    {
      \"nama_pekerjaan\": \"contoh: Pemasangan Lantai SPC 4mm & Underlayer Foam\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 250000,
      \"total\": 5000000
    }
  ],
  \"grand_total\": 9000000,
  \"catatan\": \"Berikan catatan arsitektural yang mendalam, mencakup durasi pengerjaan workshop (3-4 minggu), spesifikasi material Plywood 18mm & HPL Taco, serta rekomendasi konsultasi awal gratis.\"
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
                'temperature'      => $temperature,
                'max_tokens'       => 3500,
                'stream'           => false,
                'reasoning_effort' => 'none',
            ]);

            if ($response->successful()) {
                $rawBody = $response->body();
                // 9Router SSE cleanup: hapus trailing data: [DONE] jika ada
                $cleanBody = preg_replace('/\s*data:\s*\[DONE\]\s*$/i', '', trim($rawBody));
                $data = json_decode($cleanBody, true) ?: $response->json();
                
                $rawText = $data['choices'][0]['message']['content'] ?? '';
                if (empty($rawText) && !empty($data['choices'][0]['message']['reasoning_content'])) {
                    $rawText = $data['choices'][0]['message']['reasoning_content'];
                }

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
