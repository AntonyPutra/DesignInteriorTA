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
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'whatsapp'         => 'required|string|max:20',
            'email'            => 'nullable|email|max:255',
            'project_location' => 'required|string|max:255',
            'project_type'     => 'required|string|max:100',
            'room_type'        => 'required|string|max:100',
            'area_size'        => 'required|numeric|min:1',
            'estimated_budget' => 'nullable|string|max:100',
            'design_style'     => 'nullable|string|max:100',
            'message'          => 'nullable|string|max:2000',
            'reference_file'   => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ], [
            'name.required'             => 'Nama lengkap wajib diisi.',
            'whatsapp.required'         => 'Nomor WhatsApp wajib diisi.',
            'project_location.required' => 'Lokasi proyek wajib diisi.',
            'project_type.required'     => 'Jenis proyek wajib dipilih.',
            'room_type.required'        => 'Jenis ruangan wajib dipilih.',
            'area_size.required'        => 'Luas ruangan wajib diisi.',
            'area_size.numeric'         => 'Luas ruangan harus berupa angka.',
            'email.email'               => 'Format email tidak valid.',
            'reference_file.mimes'      => 'File referensi harus berformat JPG, PNG, atau PDF.',
            'reference_file.max'        => 'Ukuran file tidak boleh lebih dari 5MB.',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('reference_file')) {
            $filePath = $request->file('reference_file')->store('consultations/references', 'public');
        }

        Consultation::create([
            'name'             => $validated['name'],
            'whatsapp'         => $validated['whatsapp'],
            'email'            => $validated['email'] ?? null,
            'project_location' => $validated['project_location'],
            'project_type'     => $validated['project_type'],
            'room_type'        => $validated['room_type'],
            'area_size'        => $validated['area_size'],
            'estimated_budget' => $validated['estimated_budget'] ?? null,
            'design_style'     => $validated['design_style'] ?? null,
            'message'          => $validated['message'] ?? null,
            'reference_file'   => $filePath,
            'status'           => 'pending',
        ]);

        return redirect()->route('consultation.create')
            ->with('success', 'Terima kasih! Form konsultasi Anda telah terkirim. Tim kami akan menghubungi Anda dalam 1x24 jam.');
    }
}
