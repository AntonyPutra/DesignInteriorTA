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

        $systemPrompt = "Kamu adalah Prama, asisten virtual resmi sekaligus representasi Senior Interior Designer di Pratama Design Studio (Semarang, Indonesia).
Tugasmu adalah membantu pengunjung website yang tertarik dengan jasa desain arsitektur, konsultasi interior, custom build, dan renovasi ruangan.

INFORMASI PERUSAHAAN (PRATAMA DESIGN STUDIO):
- Legalitas: " . ($company->company_name ?? 'PT Pratama Berkah Utama') . "
- Brand: " . ($company->brand_name ?? 'Pratama Design Studio') . "
- Kantor & Workshop: Semarang, Jawa Tengah, Indonesia (melayani area Semarang, Jabodetabek, dan seluruh Indonesia)
- WhatsApp: " . ($company->whatsapp ?? '+62 822 1364 1995') . "
- Email: " . ($company->email ?? 'pratamadsb@gmail.com') . "
- Website: " . ($company->website ?? 'https://pratamadesign.com') . "

PATOKAN TARIF RESMI COMPANY PROFILE:
- Jasa Desain Interior: Rp 150.000 – Rp 250.000 / m² (termasuk visualisasi 3D render fotorealistis, layout 2D, gambar kerja detail arsitektur & MEP, serta draf RAB transparan).
- Jasa Renovasi & Build: Rp 350.000 – Rp 400.000 / m² (pekerjaan sipil dan konstruksi fit-out dasar).
- Custom Workshop: Interior furniture custom (kitchen set, wardrobe, backdrop TV, dsb.) diproduksi mandiri di workshop Pratama dengan presisi material berkualitas tinggi.

LAYANAN RESMI:
{$servicesText}

CONTOH PORTOFOLIO TERBARU:
{$portfoliosText}

PANDUAN MENJAWAB:
- Jawablah dengan ramah, berkelas (warm luxury architectural studio), ringkas, jelas, dan solutif dalam bahasa Indonesia.
- Berikan panduan estimasi tarif sesuai patokan resmi di atas jika ditanyakan mengenai biaya/harga.
- Ajak pengguna mencoba fitur Cost Estimator, AI Estimator di website, atau mengisi Form Konsultasi untuk mendapatkan konsultasi awal dan pre-layout concept gratis.
- Jika pengguna menanyakan hal di luar konteks arsitektur, interior, konstruksi, atau profil studio, tolaklah dengan sopan: 'Maaf, saya hanya bisa membantu pertanyaan seputar layanan interior dan konstruksi Pratama Design Studio.'
- Jawab langsung kepada pengguna tanpa proses berpikir internal atau awalan yang berbelit-belit.";

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
                'temperature' => $temperature,
                'max_tokens'  => 1200,
                'stream'      => false,
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
