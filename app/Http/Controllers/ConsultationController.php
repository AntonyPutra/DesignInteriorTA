<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('public.consultation.create');
    }

    public function store(Request $request)
    {
        // Support both modal quick-consult ('phone', 'subject') and full consultation form
        $whatsappNumber = $request->input('whatsapp') ?? $request->input('phone');
        $request->merge([
            'whatsapp'         => $whatsappNumber,
            'project_location' => $request->input('project_location') ?? 'Jakarta / Jabodetabek',
            'project_type'     => $request->input('project_type') ?? $request->input('subject') ?? 'Interior Design',
            'room_type'        => $request->input('room_type') ?? 'General Interior',
            'area_size'        => $request->input('area_size') ?? 1,
        ]);

        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'whatsapp'         => 'required|string|max:20',
            'email'            => 'nullable|email|max:255',
            'project_location' => 'nullable|string|max:255',
            'project_type'     => 'nullable|string|max:100',
            'room_type'        => 'nullable|string|max:100',
            'area_size'        => 'nullable|numeric|min:1',
            'estimated_budget' => 'nullable|string|max:100',
            'design_style'     => 'nullable|string|max:100',
            'message'          => 'nullable|string|max:2000',
            'reference_file'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'name.required'             => 'Nama lengkap wajib diisi.',
            'whatsapp.required'         => 'Nomor WhatsApp / HP wajib diisi.',
            'email.email'               => 'Format email tidak valid.',
            'reference_file.mimes'      => 'File referensi harus berformat JPG, PNG, atau PDF.',
            'reference_file.max'        => 'Ukuran file tidak boleh lebih dari 5MB.',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('reference_file')) {
            $filePath = $request->file('reference_file')->store('consultations/references', 'public');
        }

        $consultation = Consultation::create([
            'name'             => $validated['name'],
            'whatsapp'         => $validated['whatsapp'],
            'email'            => $validated['email'] ?? null,
            'project_location' => $validated['project_location'] ?? 'Jakarta / Jabodetabek',
            'project_type'     => $validated['project_type'] ?? 'Interior Design',
            'room_type'        => $validated['room_type'] ?? 'General Interior',
            'area_size'        => $validated['area_size'] ?? 1,
            'estimated_budget' => $validated['estimated_budget'] ?? null,
            'design_style'     => $validated['design_style'] ?? null,
            'message'          => $validated['message'] ?? null,
            'reference_file'   => $filePath,
            'status'           => 'pending',
        ]);

        $message = "Terima kasih! Form konsultasi berhasil dikirim. Nomor Referensi Tiket Anda: #{$consultation->ticket_code}. Tim kami akan menghubungi Anda segera.";

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'       => true,
                'ticket_code'   => $consultation->ticket_code,
                'message'       => $message,
                'whatsapp_link' => 'https://wa.me/6282213641995?text=' . urlencode("Halo Pratama Design Studio, saya baru saja mengirim form konsultasi dengan Tiket #{$consultation->ticket_code} ({$consultation->name})."),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }
}
