<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        set_time_limit(120);
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = $request->input('message');
        $apiKey = config('services.gemini.api_key');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API Key belum dikonfigurasi. Silakan tambahkan GEMINI_API_KEY di file .env'
            ], 500);
        }

        // Ambil data dinamis dari database
        $company = CompanyProfile::getInstance();
        $services = Service::active()->get(['name', 'description']);
        $portfolios = Portfolio::published()->latest()->take(5)->get(['title', 'client_name', 'project_type']);

        // Format data layanan
        $servicesText = "";
        foreach ($services as $service) {
            $servicesText .= "- " . $service->name . ": " . strip_tags($service->description) . "\n";
        }

        // Format data portofolio
        $portfoliosText = "";
        foreach ($portfolios as $portfolio) {
            $portfoliosText .= "- " . $portfolio->title . " (Klien: " . $portfolio->client_name . ", Tipe: " . $portfolio->project_type . ")\n";
        }

        $systemPrompt = "Kamu adalah Prama, asisten virtual resmi untuk {$company->company_name} ({$company->brand_name}).
Tugasmu adalah membantu pengunjung website yang tertarik dengan layanan desain interior kami.

Informasi detail perusahaan (dari database kami):
- Nama Perusahaan: {$company->company_name}
- Nama Brand: {$company->brand_name}
- Deskripsi: {$company->short_description}
- Visi: {$company->vision}
- Misi: {$company->mission}
- Lokasi: {$company->address}
- WhatsApp: {$company->whatsapp}
- Email: {$company->email}
- Website: {$company->website}
- Instagram: {$company->instagram}

Daftar Layanan Kami (Wajib direkomendasikan jika relevan):
{$servicesText}
Contoh Portofolio Terbaru Kami (Untuk meyakinkan klien):
{$portfoliosText}
Panduan Menjawab:
- Gunakan data di atas untuk menjawab pertanyaan terkait profil, layanan, atau portofolio perusahaan.
- Jika pengunjung menanyakan hal di luar konteks desain interior, renovasi, atau layanan kami, kamu WAJIB menolak menjawab dengan sopan: 'Maaf, saya hanya bisa membantu pertanyaan seputar layanan interior Pratama Design Studio.'

PERATURAN MUTLAK: 
Jawablah secara LANGSUNG kepada pengguna. DILARANG KERAS menyertakan proses berpikir (internal monologue), draf, atau penjelasan langkah. HANYA KELUARKAN KALIMAT PERCAKAPAN AKHIR. Jawablah dengan singkat, ramah, persuasif, dan profesional dalam bahasa Indonesia.";

        // Fix: Use the exact model that is available and working for this specific API Key
        $modelName = 'gemma-4-26b-a4b-it';

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key=" . $apiKey;

        try {
            $response = Http::withoutVerifying()->timeout(60)->post($url, [
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => "Instruksi Sistem: " . $systemPrompt . "\n\nPertanyaan Pengguna: " . $userMessage]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 2000,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                $rawText = '';
                if (isset($data['candidates'][0]['content']['parts'])) {
                    foreach ($data['candidates'][0]['content']['parts'] as $part) {
                        // Abaikan bagian 'thought' (internal monologue bawaan model)
                        if (empty($part['thought']) || $part['thought'] !== true) {
                            $rawText .= $part['text'] ?? '';
                        }
                    }
                }
                
                // Bersihkan kutipan atau sisa-sisa spasi
                $reply = trim($rawText);
                
                // Jika masih ada teks monologue di atasnya dan jawaban asli ada di dalam tanda kutip ganda terakhir
                if (preg_match('/"([^"]+)"$/', $reply, $quoteMatches)) {
                    $reply = $quoteMatches[1];
                }
                
                return response()->json(['reply' => $reply]);
            } else {
                Log::error('Gemini API Error: ' . $response->body());
                return response()->json(['error' => 'Terjadi kesalahan saat menghubungi AI.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Chatbot Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan sistem.'], 500);
        }
    }
}
