<?php

namespace App\Http\Controllers;

use App\Services\AIService;
use Illuminate\Http\Request;
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
            'prompt' => 'required|string|max:2000',
        ]);

        $userPrompt = $request->input('prompt');

        $systemPrompt = "Kamu adalah Senior Interior Designer & Quantity Surveyor di Pratama Design Studio (Semarang, Indonesia).
Tugasmu adalah membaca spesifikasi, ukuran, kebutuhan, dan cerita renovasi/desain interior dari klien, lalu menghasilkan draf estimasi Rencana Anggaran Biaya (RAB) sederhana yang realistis, logis, dan profesional dalam mata uang Rupiah (Rp).

PATOKAN TARIF RESMI COMPANY PROFILE PRATAMA DESIGN STUDIO:
- Jasa Desain Interior: Rp 150.000 – Rp 250.000 / m² (konseptual, gambar 3D render realistis, denah 2D, gambar kerja detail arsitektur & MEP).
- Jasa Renovasi & Build (Pekerjaan Sipil / Fit-Out Dasar): Rp 350.000 – Rp 400.000 / m² (pembongkaran, partisi gypsum/kaca, plester/cat dinding, lantai vinyl/keramik dasar).
- Custom Furniture Workshop: Dihitung per unit/meter lari (m1) dengan standar material multiplex/plywood finishing HPL/Duco berkualitas tinggi di workshop resmi Pratama.

PERATURAN MUTLAK FORMAT KELUARAN:
Hanya keluarkan respon dalam format JSON murni yang valid tanpa awalan markdown seperti ```json, tanpa penjelasan atau kalimat pembuka/penutup apapun sebelum/sesudah JSON.

Struktur JSON yang WAJIB dikembalikan:
{
  \"items\": [
    {
      \"nama_pekerjaan\": \"contoh: Jasa Desain Interior & Gambar Kerja Detail (20 m2)\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 200000,
      \"total\": 4000000
    },
    {
      \"nama_pekerjaan\": \"contoh: Pekerjaan Pemasangan Lantai SPC 4mm & Underlayer\",
      \"volume\": 20,
      \"satuan\": \"m2\",
      \"harga_satuan\": 250000,
      \"total\": 5000000
    }
  ],
  \"grand_total\": 9000000,
  \"catatan\": \"Catatan singkat mengenai estimasi durasi pekerjaan, patokan tarif resmi Pratama Design Studio Semarang, dan saran konsultasi langsung.\"
}";

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => "Cerita & Spesifikasi Kebutuhan Klien:\n" . $userPrompt],
        ];

        try {
            $reply = AIService::chatCompletion($messages, 0.3, 2500);

            if (!$reply) {
                return response()->json([
                    'error' => 'Layanan AI 9Router sedang tidak dapat dijangkau. Pastikan endpoint AI_BASE_URL aktif.'
                ], 503);
            }

            // Bersihkan format markdown jika model tetap menyertakannya
            if (preg_match('/```(?:json)?\s*(.*?)\s*```/s', $reply, $matches)) {
                $reply = $matches[1];
            }

            $decoded = json_decode(trim($reply), true);
            if (json_last_error() !== JSON_ERROR_NONE || !isset($decoded['items']) || !isset($decoded['grand_total'])) {
                Log::error('9Router AI Estimator Invalid JSON: ' . $reply);
                return response()->json([
                    'error' => 'AI menghasilkan format yang tidak sesuai. Silakan coba lagi dengan spesifikasi ruangan yang lebih detail.'
                ], 500);
            }

            return response()->json(['data' => $decoded]);
        } catch (\Throwable $e) {
            Log::error('AI Estimator Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan sistem saat memproses estimasi AI.'], 500);
        }
    }
}
