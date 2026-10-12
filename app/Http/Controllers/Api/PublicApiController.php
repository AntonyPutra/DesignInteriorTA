<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Consultation;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicApiController extends Controller
{
    /**
     * GET /api/services
     * Mengambil daftar layanan studio beserta URL gambarnya.
     */
    public function services(): JsonResponse
    {
        $services = Service::active()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Daftar layanan berhasil diambil.',
            'data'    => $services,
        ]);
    }

    /**
     * GET /api/company-profile
     * Mengambil profil perusahaan, kontak, media sosial, dan logo studio.
     */
    public function companyProfile(): JsonResponse
    {
        $company = CompanyProfile::getInstance();

        return response()->json([
            'status'  => true,
            'message' => 'Profil perusahaan berhasil diambil.',
            'data'    => $company,
        ]);
    }

    /**
     * GET /api/testimonials
     * Mengambil daftar testimoni klien yang aktif.
     */
    public function testimonials(): JsonResponse
    {
        $testimonials = Testimonial::active()->latest()->take(6)->get();

        return response()->json([
            'status'  => true,
            'message' => 'Daftar testimoni berhasil diambil.',
            'data'    => $testimonials,
        ]);
    }

    /**
     * POST /api/consultations
     * Mengirim formulir permintaan konsultasi desain dari Front-End.
     */
    public function storeConsultation(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:30',
            'email'        => 'nullable|email|max:255',
            'service_type' => 'nullable|string|max:100',
            'location'     => 'nullable|string|max:255',
            'budget'       => 'nullable|string|max:100',
            'message'      => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validasi gagal.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $consultation = Consultation::create($validator->validated());

        return response()->json([
            'status'  => true,
            'message' => "Permintaan konsultasi berhasil dikirim. Nomor Referensi Tiket Anda: #{$consultation->ticket_code}.",
            'data'    => $consultation,
        ], 201);
    }
}
