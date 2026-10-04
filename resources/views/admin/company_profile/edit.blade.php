@extends('layouts.admin')

@section('title', 'Profil Perusahaan')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="font-display text-2xl font-bold text-[#24211d]">Profil & Identitas Perusahaan</h2>
        <p class="text-xs text-[#777166]">Kelola profil brand, visi misi, kontak operasional, dan informasi yang terpajang di footer website.</p>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden max-w-5xl">
    <form action="{{ route('admin.company-profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            
            {{-- Bagian Kiri: Info Utama --}}
            <div class="space-y-6">
                <h3 class="font-display text-lg font-bold text-[#24211d] border-b border-[#eee9e0] pb-2">Informasi Identitas Brand</h3>

                {{-- Company Name --}}
                <div>
                    <label for="company_name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Nama Legal Perusahaan <span class="text-[#b55b48]">*</span>
                    </label>
                    <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}" required
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('company_name') border-[#b55b48] @enderror">
                    @error('company_name') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Brand Name --}}
                <div>
                    <label for="brand_name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Nama Komersial (Brand) <span class="text-[#b55b48]">*</span>
                    </label>
                    <input type="text" id="brand_name" name="brand_name" value="{{ old('brand_name', $profile->brand_name) }}" required
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('brand_name') border-[#b55b48] @enderror">
                    @error('brand_name') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Short Description --}}
                <div>
                    <label for="short_description" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Tagline / Deskripsi Singkat
                    </label>
                    <textarea id="short_description" name="short_description" rows="3"
                              class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('short_description') border-[#b55b48] @enderror">{{ old('short_description', $profile->short_description) }}</textarea>
                    <p class="mt-1.5 text-[11px] text-[#8c8477]">Digunakan pada meta tag SEO dan perkenalan singkat.</p>
                    @error('short_description') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- About Description --}}
                <div>
                    <label for="about_description" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Tentang Perusahaan (Profil Lengkap)
                    </label>
                    <textarea id="about_description" name="about_description" rows="5"
                              class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('about_description') border-[#b55b48] @enderror">{{ old('about_description', $profile->about_description) }}</textarea>
                    @error('about_description') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Vision --}}
                <div>
                    <label for="vision" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Visi Studio
                    </label>
                    <textarea id="vision" name="vision" rows="3"
                              class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('vision') border-[#b55b48] @enderror">{{ old('vision', $profile->vision) }}</textarea>
                    @error('vision') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Mission --}}
                <div>
                    <label for="mission" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Misi Studio
                    </label>
                    <textarea id="mission" name="mission" rows="4"
                              class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('mission') border-[#b55b48] @enderror">{{ old('mission', $profile->mission) }}</textarea>
                    @error('mission') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Bagian Kanan: Kontak & Aset --}}
            <div class="space-y-6">
                <h3 class="font-display text-lg font-bold text-[#24211d] border-b border-[#eee9e0] pb-2">Kontak & Kehadiran Digital</h3>

                {{-- Logo --}}
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">Logo Studio</label>
                    @if($profile->logo)
                        <div class="mb-3 relative w-32 h-20 bg-[#faf8f5] rounded-2xl border border-[#e8e4dc] flex items-center justify-center overflow-hidden p-2">
                            <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="max-w-full max-h-full object-contain">
                        </div>
                    @endif
                    <input type="file" name="logo" id="logo" accept="image/*" class="block w-full text-xs text-[#564e42]
                        file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold
                        file:bg-[#f5ecea] file:text-[#b55b48] hover:file:bg-[#eed0cb] border border-[#d8d2c6] rounded-xl p-2 transition-colors">
                    <p class="mt-1.5 text-[11px] text-[#8c8477]">Format: PNG, JPG, WEBP. Rekomendasi latar transparan.</p>
                    @error('logo') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Address --}}
                <div>
                    <label for="address" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Alamat Studio / Kantor
                    </label>
                    <textarea id="address" name="address" rows="3"
                              class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('address') border-[#b55b48] @enderror">{{ old('address', $profile->address) }}</textarea>
                    @error('address') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label for="whatsapp" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Nomor WhatsApp Resmi
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#2e6930]">
                            <i class="fab fa-whatsapp"></i>
                        </span>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}" placeholder="+62 812 3456 7890"
                               class="w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('whatsapp') border-[#b55b48] @enderror">
                    </div>
                    @error('whatsapp') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Email Kontak
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#8c8477]">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="studio@pratamaid.com"
                               class="w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('email') border-[#b55b48] @enderror">
                    </div>
                    @error('email') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Website --}}
                <div>
                    <label for="website" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Alamat Website
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#8c8477]">
                            <i class="fas fa-globe"></i>
                        </span>
                        <input type="url" id="website" name="website" value="{{ old('website', $profile->website) }}" placeholder="https://pratamadesign.com"
                               class="w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('website') border-[#b55b48] @enderror">
                    </div>
                    @error('website') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label for="instagram" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Tautan Instagram
                    </label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#b55b48]">
                            <i class="fab fa-instagram"></i>
                        </span>
                        <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $profile->instagram) }}" placeholder="https://instagram.com/pratamadesign"
                               class="w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('instagram') border-[#b55b48] @enderror">
                    </div>
                    @error('instagram') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Footer Text --}}
                <div>
                    <label for="footer_text" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Teks Hak Cipta (Footer Website)
                    </label>
                    <input type="text" id="footer_text" name="footer_text" value="{{ old('footer_text', $profile->footer_text) }}" placeholder="© 2026 Pratama Design Studio. All rights reserved."
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('footer_text') border-[#b55b48] @enderror">
                    @error('footer_text') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-[#f0ece4]">
            <div class="text-xs text-[#8c8477]">
                Pembaruan profil terakhir: {{ $profile->updated_at->format('d M Y, H:i') }}
            </div>
            <button type="submit" class="px-6 py-2.5 text-xs font-semibold uppercase tracking-wider text-white bg-[#b55b48] hover:bg-[#9c4c3b] rounded-xl shadow-md shadow-[#b55b48]/25 transition-all flex items-center gap-2">
                <i class="fas fa-save text-[11px]"></i>
                Simpan Profil Perusahaan
            </button>
        </div>
    </form>
</div>
@endsection
