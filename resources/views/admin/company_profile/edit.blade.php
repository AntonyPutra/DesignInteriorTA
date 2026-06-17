@extends('layouts.admin')

@section('title', 'Profil Perusahaan')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Profil Perusahaan</h2>
        <p class="text-sm text-gray-500">Kelola informasi kontak dan profil perusahaan yang tampil di website.</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-5xl">
    <form action="{{ route('admin.company-profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            
            {{-- Bagian Kiri: Info Utama --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Informasi Utama</h3>

                {{-- Company Name --}}
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Perusahaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}" required
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('company_name') border-red-500 @enderror">
                    @error('company_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Brand Name --}}
                <div>
                    <label for="brand_name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Brand <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="brand_name" name="brand_name" value="{{ old('brand_name', $profile->brand_name) }}" required
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('brand_name') border-red-500 @enderror">
                    @error('brand_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Short Description --}}
                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi Singkat
                    </label>
                    <textarea id="short_description" name="short_description" rows="3"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('short_description') border-red-500 @enderror">{{ old('short_description', $profile->short_description) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Tampil di hero section atau meta deskripsi.</p>
                    @error('short_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- About Description --}}
                <div>
                    <label for="about_description" class="block text-sm font-medium text-gray-700 mb-1">
                        Tentang Perusahaan Lengkap
                    </label>
                    <textarea id="about_description" name="about_description" rows="5"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('about_description') border-red-500 @enderror">{{ old('about_description', $profile->about_description) }}</textarea>
                    @error('about_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Vision --}}
                <div>
                    <label for="vision" class="block text-sm font-medium text-gray-700 mb-1">
                        Visi
                    </label>
                    <textarea id="vision" name="vision" rows="3"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('vision') border-red-500 @enderror">{{ old('vision', $profile->vision) }}</textarea>
                    @error('vision') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Mission --}}
                <div>
                    <label for="mission" class="block text-sm font-medium text-gray-700 mb-1">
                        Misi
                    </label>
                    <textarea id="mission" name="mission" rows="4"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('mission') border-red-500 @enderror">{{ old('mission', $profile->mission) }}</textarea>
                    @error('mission') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Bagian Kanan: Kontak & Aset --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Kontak & Aset</h3>

                {{-- Logo --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo Perusahaan</label>
                    @if($profile->logo)
                        <div class="mb-3 relative w-32 h-32 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center overflow-hidden">
                            <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="max-w-full max-h-full object-contain p-2">
                        </div>
                    @endif
                    <input type="file" name="logo" id="logo" accept="image/*" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                        file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-colors">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WEBP. Maks: 2MB.</p>
                    @error('logo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Address --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat Lengkap
                    </label>
                    <textarea id="address" name="address" rows="3"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('address') border-red-500 @enderror">{{ old('address', $profile->address) }}</textarea>
                    @error('address') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">
                        WhatsApp
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fab fa-whatsapp"></i>
                        </span>
                        <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}" placeholder="Contoh: +62 822 1364 1995"
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('whatsapp') border-red-500 @enderror">
                    </div>
                    @error('whatsapp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="email@contoh.com"
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('email') border-red-500 @enderror">
                    </div>
                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Website --}}
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-1">
                        Website URL
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-globe"></i>
                        </span>
                        <input type="url" id="website" name="website" value="{{ old('website', $profile->website) }}" placeholder="https://..."
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('website') border-red-500 @enderror">
                    </div>
                    @error('website') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label for="instagram" class="block text-sm font-medium text-gray-700 mb-1">
                        Instagram URL
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fab fa-instagram"></i>
                        </span>
                        <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $profile->instagram) }}" placeholder="https://instagram.com/..."
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('instagram') border-red-500 @enderror">
                    </div>
                    @error('instagram') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Footer Text --}}
                <div>
                    <label for="footer_text" class="block text-sm font-medium text-gray-700 mb-1">
                        Teks Copyright (Footer)
                    </label>
                    <input type="text" id="footer_text" name="footer_text" value="{{ old('footer_text', $profile->footer_text) }}" placeholder="© 2024 Pratama Design Studio. All rights reserved."
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('footer_text') border-red-500 @enderror">
                    @error('footer_text') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Terakhir diupdate: {{ $profile->updated_at->format('d M Y, H:i') }}
            </div>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-red-800 border border-transparent rounded-lg shadow-sm hover:bg-red-900 transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i>
                Simpan Profil
            </button>
        </div>
    </form>
</div>
@endsection
