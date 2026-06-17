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
    <form action="{{ route('admin.company-profile.update') }}" method="POST" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            
            {{-- Bagian Kiri: Info Utama --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Informasi Utama</h3>

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Perusahaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $profile->name) }}" required
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('name') border-red-500 @enderror">
                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- About Text --}}
                <div>
                    <label for="about_text" class="block text-sm font-medium text-gray-700 mb-1">
                        Teks Singkat Tentang Kami
                    </label>
                    <textarea id="about_text" name="about_text" rows="5"
                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('about_text') border-red-500 @enderror">{{ old('about_text', $profile->about_text) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Tampil di footer atau bagian about singkat.</p>
                    @error('about_text') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
            </div>

            {{-- Bagian Kanan: Kontak & Sosial Media --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Kontak & Sosial Media</h3>

                {{-- Phone / WA --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Telepon / WhatsApp
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fab fa-whatsapp"></i>
                        </span>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" placeholder="Contoh: +62 822 1364 1995"
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('phone') border-red-500 @enderror">
                    </div>
                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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

                {{-- Facebook --}}
                <div class="hidden"> {{-- Disembunyikan dulu jika tidak diperlukan, tapi tetap disediakan inputnya --}}
                    <label for="facebook" class="block text-sm font-medium text-gray-700 mb-1">
                        Facebook URL
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fab fa-facebook"></i>
                        </span>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $profile->facebook) }}"
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>

                {{-- YouTube --}}
                <div class="hidden">
                    <label for="youtube" class="block text-sm font-medium text-gray-700 mb-1">
                        YouTube URL
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fab fa-youtube"></i>
                        </span>
                        <input type="url" id="youtube" name="youtube" value="{{ old('youtube', $profile->youtube) }}"
                               class="w-full pl-9 rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>

                {{-- Map Embed (Opsional) --}}
                <div>
                    <label for="map_embed" class="block text-sm font-medium text-gray-700 mb-1">
                        Google Maps Embed Link (Opsional)
                    </label>
                    <textarea id="map_embed" name="map_embed" rows="3" placeholder="<iframe src='...'></iframe>"
                              class="w-full font-mono text-sm rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('map_embed') border-red-500 @enderror">{{ old('map_embed', $profile->map_embed) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Paste kode Iframe dari Google Maps (Share -> Embed a map).</p>
                    @error('map_embed') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
