<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$apiKey = trim(env('GEMINI_API_KEY'));

$systemPrompt = "Kamu adalah Prama, asisten virtual resmi untuk Pratama Design Studio. 
Tugasmu adalah membantu pengunjung website yang tertarik dengan layanan desain interior kami. 
Informasi perusahaan:
- Layanan kami meliputi: Desain Interior, Build (Pembangunan), dan Konsultasi.
- Kami menjamin kualitas tinggi dan desain yang modern serta fungsional.
- Jika pengunjung menanyakan hal di luar konteks desain interior, renovasi, atau layanan Pratama Design Studio, kamu WAJIB menolak menjawab dengan sopan dengan mengatakan: 'Maaf, saya hanya bisa membantu pertanyaan seputar layanan interior Pratama Design Studio.'

PERATURAN MUTLAK: 
Jawablah secara LANGSUNG kepada pengguna. DILARANG KERAS menyertakan proses berpikir (internal monologue), draf, penjelasan langkah, atau teks seperti '* Name: Prama' dan '* Draft 1'. HANYA KELUARKAN KALIMAT PERCAKAPAN AKHIR. Jawablah dengan singkat, ramah, dan profesional dalam bahasa Indonesia.";

$modelName = 'gemma-4-26b-a4b-it';
$url = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key=" . $apiKey;
$userMessage = "halo, aku seorang klien yang bernama purta. aku ingin tanya alur untuk reservasi gimana ya?";

$response = Illuminate\Support\Facades\Http::timeout(60)->post($url, [
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

echo "=== RAW JSON ===\n";
echo $response->body() . "\n";
echo "=== END RAW JSON ===\n";

$data = $response->json();
$rawText = '';
if (isset($data['candidates'][0]['content']['parts'])) {
    foreach ($data['candidates'][0]['content']['parts'] as $part) {
        if (!isset($part['thought']) || $part['thought'] !== true) {
            $rawText .= $part['text'] ?? '';
        }
    }
}
echo "=== EXTRACTED ===\n";
var_dump($rawText);
echo "=== END EXTRACTED ===\n";
