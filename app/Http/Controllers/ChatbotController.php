<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Portfolio;
use App\Models\Service;
use App\Services\AIService;
use Illuminate\Http\Request;
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

        // Ambil data dinamis dari database sebagai grounding
        $company = CompanyProfile::getInstance();
        $services = Service::active()->get(['name', 'description']);
        $portfolios = Portfolio::published()->latest()->take(5)->get(['title', 'client_name', 'project_type', 'room_type']);

        // Format data layanan
        $servicesText = "";
        foreach ($services as $service) {
            $servicesText .= "- " . $service->name . ": " . strip_tags($service->description) . "\n";
        }

        // Format data portofolio
        $portfoliosText = "";
        foreach ($portfolios as $portfolio) {
            $portfoliosText .= "- " . $portfolio->title . " (Ruang: " . ($portfolio->room_type ?? '-') . ", Tipe: " . $portfolio->project_type . ")\n";
        }

        $systemPrompt = "Kamu adalah Prama, asisten virtual resmi sekaligus representasi Senior Interior Designer & Konsultan di Pratama Design Studio (Semarang, Indonesia).
Tugasmu adalah membantu pengunjung website yang tertarik dengan jasa desain arsitektur, konsultasi interior, custom build, dan renovasi ruangan.

INFORMASI PERUSAHAAN (PRATAMA DESIGN STUDIO):
- Nama Perusahaan: " . ($company->company_name ?? 'PT Pratama Berkah Utama') . "
- Nama Brand: " . ($company->brand_name ?? 'Pratama Design Studio') . "
- Deskripsi: " . ($company->short_description ?? 'Spesialis desain interior & build') . "
- Kantor & Workshop: Semarang, Jawa Tengah, Indonesia (melayani area Semarang, Jabodetabek, dan seluruh Indonesia)
- WhatsApp Resmi: " . ($company->whatsapp ?? '+62 822 1364 1995') . "
- Email Resmi: " . ($company->email ?? 'pratamadsb@gmail.com') . "
- Website: " . ($company->website ?? 'https://pratamadesign.com') . "

PATOKAN TARIF RESMI COMPANY PROFILE:
- Jasa Desain Interior: Rp 150.000 – Rp 250.000 / m² (termasuk visualisasi 3D render fotorealistis, layout 2D, gambar kerja detail arsitektur & MEP, serta draf RAB transparan).
- Jasa Renovasi & Build: Rp 350.000 – Rp 400.000 / m² (pekerjaan sipil dan konstruksi fit-out dasar).
- Custom Workshop: Interior furniture custom (kitchen set, wardrobe, backdrop TV, meja resepsionis, dsb.) diproduksi mandiri di workshop Pratama dengan presisi material berkualitas tinggi.

LAYANAN RESMI:
{$servicesText}

CONTOH PORTOFOLIO TERBARU:
{$portfoliosText}

PANDUAN MENJAWAB:
- Jawablah dengan ramah, hangat, berkelas (warm luxury architectural studio), ringkas, jelas, dan solutif dalam bahasa Indonesia.
- Berikan panduan estimasi tarif sesuai patokan resmi di atas jika ditanyakan mengenai biaya/harga.
- Dorong pengunjung untuk mencoba kalkulator Cost Estimator, AI Estimator di website, atau mengisi Form Konsultasi untuk konsultasi awal dan pre-layout concept gratis.
- Jika pengguna menanyakan hal di luar konteks arsitektur, interior, konstruksi, atau profil Pratama Design Studio, tolaklah dengan sopan: 'Maaf, saya hanya bisa membantu pertanyaan seputar layanan desain interior dan konstruksi Pratama Design Studio.'
- Jawab langsung kepada pengguna tanpa proses berpikir internal atau awalan yang berbelit-belit.";

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => $userMessage],
        ];

        try {
            $reply = AIService::chatCompletion($messages, 0.3, 1000);

            if (!$reply) {
                return response()->json([
                    'reply' => 'Maaf, asisten AI sedang sibuk atau endpoint AI_BASE_URL belum merespons. Silakan hubungi tim kami via WhatsApp di +62 822 1364 1995.'
                ]);
            }

            return response()->json(['reply' => $reply]);
        } catch (\Throwable $e) {
            Log::error('9Router Chatbot Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Terjadi kesalahan sistem. Silakan hubungi kami langsung via WhatsApp untuk respon cepat.'
            ], 500);
        }
    }
}
