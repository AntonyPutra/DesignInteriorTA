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

PERATURAN MUTLAK: Jawablah LANGSUNG tanpa internal monologue, draf, atau pemikiran. Keluarkan HANYA kalimat akhir yang akan dibaca pengguna.";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemma-4-26b-a4b-it:generateContent?key=" . $apiKey;

$response = Illuminate\Support\Facades\Http::timeout(60)->post($url, [
    'systemInstruction' => [
        'parts' => [
            ['text' => $systemPrompt]
        ]
    ],
    'contents' => [
        ['role' => 'user', 'parts' => [['text' => "halo"]]]
    ]
]);

echo $response->body() . "\n";
