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
            'prompt' => 'required|string|max:1000',
        ]);

        $userPrompt = $request->input('prompt');
        $apiKey = config('services.gemini.api_key');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API Key belum dikonfigurasi. Silakan tambahkan GEMINI_API_KEY di file .env'
            ], 500);
        }

        $systemPrompt = "Kamu adalah Quantity Surveyor dan Ahli Estimasi Biaya Interior (AI Estimator) di Pratama Design Studio.
Tugasmu adalah membaca cerita/keinginan renovasi ruangan dari klien dan menghasilkan estimasi biaya (RAB) sederhana yang logis.
Harga menggunakan standar harga di Indonesia.

PERATURAN MUTLAK:
Hanya keluarkan respon dalam format JSON murni yang valid tanpa awalan markdown seperti ```json, tanpa penjelasan apapun sebelum/sesudah JSON.

Struktur JSON yang WAJIB dikembalikan:
{
  \"items\": [
    {
      \"nama_pekerjaan\": \"contoh: Pemasangan Lantai Vinyl 3mm\",
      \"volume\": 16,
      \"satuan\": \"m2\",
      \"harga_satuan\": 250000,
      \"total\": 4000000
    }
  ],
  \"grand_total\": 4000000,
  \"catatan\": \"Catatan singkat mengenai asumsi perhitungan (misal: Harga belum termasuk biaya bongkar).\"
}";

        $modelName = 'gemma-4-26b-a4b-it';
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key=" . $apiKey;

        try {
            $response = Http::withoutVerifying()->timeout(60)->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => "Instruksi Sistem: " . $systemPrompt . "\n\nCerita Klien: " . $userPrompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.4, // Rendah agar konsisten
                    'maxOutputTokens' => 2500,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                $rawText = '';
                if (isset($data['candidates'][0]['content']['parts'])) {
                    foreach ($data['candidates'][0]['content']['parts'] as $part) {
                        if (empty($part['thought']) || $part['thought'] !== true) {
                            $rawText .= $part['text'] ?? '';
                        }
                    }
                }
                
                $reply = trim($rawText);
                
                // Coba bersihkan markdown jika AI tetap membandel
                if (preg_match('/```(?:json)?\s*(.*?)\s*```/s', $reply, $matches)) {
                    $reply = $matches[1];
                }
                
                // Validate JSON
                json_decode($reply);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    Log::error('AI Estimator Invalid JSON: ' . $reply);
                    return response()->json(['error' => 'AI menghasilkan format yang tidak valid. Silakan coba lagi dengan cerita yang lebih detail.'], 500);
                }

                return response()->json(['data' => json_decode($reply, true)]);
            } else {
                Log::error('Gemini API Error (Estimator): ' . $response->body());
                return response()->json(['error' => 'Terjadi kesalahan saat menghubungi AI.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('AI Estimator Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan sistem.'], 500);
        }
    }
}
