<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API Key belum dikonfigurasi. Silakan tambahkan GEMINI_API_KEY di file .env'
            ], 500);
        }

        $systemPrompt = "Kamu adalah Prama, asisten virtual resmi untuk Pratama Design Studio. 
Tugasmu adalah membantu pengunjung website yang tertarik dengan layanan desain interior kami. 
Informasi perusahaan:
- Layanan kami meliputi: Desain Interior, Build (Pembangunan), dan Konsultasi.
- Kami menjamin kualitas tinggi dan desain yang modern serta fungsional.
- Jika pengunjung menanyakan hal di luar konteks desain interior, renovasi, atau layanan Pratama Design Studio, kamu WAJIB menolak menjawab dengan sopan dengan mengatakan: 'Maaf, saya hanya bisa membantu pertanyaan seputar layanan interior Pratama Design Studio.'
- Jawablah dengan singkat, padat, jelas, ramah, dan profesional. Gunakan bahasa Indonesia yang baik.";

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

        try {
            $response = Http::post($url, [
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
                    'maxOutputTokens' => 500,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak bisa memberikan jawaban saat ini.';
                
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
