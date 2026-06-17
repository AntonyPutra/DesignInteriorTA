<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::getInstance();
        return view('admin.company_profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name'      => 'required|string|max:255',
            'brand_name'        => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'about_description' => 'nullable|string',
            'vision'            => 'nullable|string',
            'mission'           => 'nullable|string',
            'address'           => 'nullable|string|max:500',
            'whatsapp'          => 'nullable|string|max:20',
            'email'             => 'nullable|email|max:255',
            'website'           => 'nullable|string|max:255',
            'instagram'         => 'nullable|string|max:100',
            'logo'              => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'footer_text'       => 'nullable|string|max:255',
        ]);

        $profile = CompanyProfile::getInstance();

        $logoPath = $profile->logo;
        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $logoPath = $request->file('logo')->store('company', 'public');
        }

        $profile->update([
            'company_name'      => $request->company_name,
            'brand_name'        => $request->brand_name,
            'short_description' => $request->short_description,
            'about_description' => $request->about_description,
            'vision'            => $request->vision,
            'mission'           => $request->mission,
            'address'           => $request->address,
            'whatsapp'          => $request->whatsapp,
            'email'             => $request->email,
            'website'           => $request->website,
            'instagram'         => $request->instagram,
            'logo'              => $logoPath,
            'footer_text'       => $request->footer_text,
        ]);

        return redirect()->route('admin.company-profile.edit')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
