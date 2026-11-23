<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        set_time_limit(120);

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');

        // Konfigurasi 9Router (OpenAI-compatible)
        $baseUrl     = rtrim(config('services.ninerouter.base_url', config('services.ai.base_url', 'http://192.168.1.3:20128/v1')), '/');
        $apiKey      = config('services.ninerouter.api_key', config('services.ai.api_key'));
        $model       = config('services.ninerouter.model', config('services.ai.model', 'pratama_ai'));
        $temperature = (float) config('services.ninerouter.temperature', config('services.ai.temperature', 0.3));

        // Data dinamis database sebagai grounding
        $company = CompanyProfile::getInstance();
        $services = Service::active()->get(['name', 'description']);
        $portfolios = Portfolio::published()->latest()->take(5)->get(['title', 'client_name', 'project_type', 'room_type']);

        $servicesText = "";
        foreach ($services as $service) {
            $servicesText .= "- " . $service->name . ": " . strip_tags($service->description) . "\n";
        }

        $portfoliosText = "";
        foreach ($portfolios as $portfolio) {
            $portfoliosText .= "- " . $portfolio->title . " (Ruang: " . ($portfolio->room_type ?? '-') . ", Tipe: " . $portfolio->project_type . ")\n";
        }

        $systemPrompt = "Kamu adalah Prama, asisten virtual resmi sekaligus representasi Senior Interior Designer di Pratama Design Studio (PT Pratama Berkah Utama).
Tugasmu: Melayani calon klien dan pengunjung website dengan cerdas, hangat (warm luxury), sangat menguasai seluk-beluk desain interior, arsitektur, dan konstruksi fit-out.

PROFIL STUDIO & WORKSHOP:
- Perusahaan: PT Pratama Berkah Utama (Pratama Design Studio & Build)
- Lokasi Kantor & Workshop: Semarang, Jawa Tengah & melayani proyek di Jabodetabek serta seluruh Indonesia.
- Workshop Mandiri: Kami memiliki workshop produksi furniture custom sendiri (bukan makelar), menjamin presisi tinggi, material anti-rayap, dan kontrol kualitas ketat.
- Kontak Resmi: WhatsApp +62 822 1364 1995 | Email pratamadsb@gmail.com | Website https://pratamadesign.com

ALUR PROYEK DI PRATAMA:
1. Konsultasi & Diskusi Kebutuhan (Gratis konsultasi awal)
2. Survey Lokasi & Pembuatan Pre-Layout Concept (Gratis sebelum kesepakatan)
3. Visualisasi 3D Rendering Fotorealistis & Gambar Kerja Detail (DED Arsitektur, Elektrikal, MEP)
4. Penyusunan Rencana Anggaran Biaya (RAB) transparan & Agreement
5. Fabrikasi Furniture di Workshop Pratama & Fit-out di Lokasi
6. Quality Check & Serah Terima Proyek

ACUAN TARIF RESMI COMPANY PROFILE:
- Jasa Desain Interior: Rp 150.000 – Rp 250.000 / m² (3D render realistis, denah 2D, gambar kerja detail, draf RAB).
- Jasa Renovasi & Build (Pekerjaan Sipil): Rp 350.000 – Rp 400.000 / m² (fit-out dasar, partisi, pembongkaran, cat dinding premium).
- Custom Furniture Workshop: Rp 2.200.000 – Rp 3.500.000 / meter lari (m1) bahan Plywood/Multiplex 18mm finish HPL Taco/Duco, engsel hidrolik slow-motion.
- Lantai SPC 4mm / Luxury Vinyl: Rp 200.000 – Rp 280.000 / m² lengkap underlayer foam anti-lembab.

SPESIFIKASI MATERIAL KAMI:
- Rangka & Bodi Furniture: Multiplek / Plywood 18mm grade A (bukan serbuk kayu MDF/particle board yang mudah lapuk).
- Finishing: HPL (Taco, Carta, Aica) dengan edging rapi, atau cat Duco polyurethane tahan gores.
- Hardware: Engsel soft-close / slow-motion dan rel laci double track berkualitas tinggi.
- Top Table Kitchen: Granit alam (Nero Assoluto, Starwhite) atau Solid Surface / Quadra marmer sintetis tahan panas & noda.

PANDUAN KOMUNIKASI PRAMA:
- Selalu menyapa dengan santun, percaya diri, dan berkelas ala studio arsitektur terkemuka.
- Pahami konteks pertanyaan klien: bila klien bertanya rekomendasi gaya (Japandi, Modern Luxury, Minimalis, Industrial), jelaskan paduan warna, pencahayaan warm white 3000K, dan tekstur material yang cocok.
- Bila klien bertanya harga/estimasi, jelaskan patokan tarif resmi di atas dan rekomendasikan mencoba menu 'AI Smart Estimator' atau 'Cost Estimator' di website, atau mengklik tombol WhatsApp untuk janji temu survei.
- Jawab secara ringkas, padat, dan langsung menjawab inti pertanyaan tanpa basa-basi berulang.";

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
                    ['role' => 'user',   'content' => $userMessage],
                ],
                'temperature'      => $temperature,
                'max_tokens'       => 3000,
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

                // Sanitasi reasoning tokens dari model pratama_ai
                $reply = preg_replace('/<think>.*?<\/think>/s', '', $rawText);
                $reply = trim($reply);

                return response()->json(['reply' => $reply]);
            } else {
                Log::error('9Router API Error (Chatbot): status ' . $response->status() . ' - ' . $response->body());
                return response()->json([
                    'reply' => 'Maaf, asisten AI sedang sibuk. Silakan hubungi tim kami via WhatsApp di +62 822 1364 1995.'
                ]);
            }
        } catch (\Throwable $e) {
            Log::error('9Router Chatbot Exception: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Terjadi kesalahan sistem sementara. Silakan hubungi tim kami via WhatsApp untuk respon cepat.'
            ], 500);
        }
    }
}
