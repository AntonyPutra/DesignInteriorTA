@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Edit Layanan: {{ $service->name }}</h2>
            <p class="text-xs text-[#777166]">Perbarui deskripsi, konfigurasi ikon, atau visibilitas publik layanan ini.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden max-w-4xl">
    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            {{-- Name --}}
            <div class="md:col-span-2">
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Nama Layanan <span class="text-[#b55b48]">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required
                       class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('name') border-[#b55b48] @enderror">
                @error('name')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-[11px] text-[#8c8477]">Slug saat ini: <code class="bg-[#f2f0eb] text-[#24211d] px-1.5 py-0.5 rounded">{{ $service->slug }}</code></p>
            </div>

            {{-- Icon --}}
            <div>
                <label for="icon" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Ikon Representasi <span class="text-[#b55b48]">*</span>
                </label>
                <select id="icon" name="icon" required
                        class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('icon') border-[#b55b48] @enderror">
                    <option value="">-- Pilih Ikon Layanan --</option>
                    @foreach([
                        'chat-bubble-left-right' => 'Konsultasi / Diskusi (Chat)',
                        'calendar-days'          => 'Perencanaan & Jadwal (Calendar)',
                        'calculator'             => 'Estimasi Biaya & RAB (Calculator)',
                        'computer-desktop'       => '3D Visualisasi Render (Desktop)',
                        'wrench-screwdriver'     => 'Produksi & Workshop (Tools)',
                        'home-modern'            => 'Fit Out & Renovasi (House)',
                    ] as $val => $label)
                        <option value="{{ $val }}" {{ old('icon', $service->icon) == $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('icon')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Status Publikasi <span class="text-[#b55b48]">*</span>
                </label>
                <select id="status" name="status" required
                        class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('status') border-[#b55b48] @enderror">
                    <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Aktif (Tampil di Website)</option>
                    <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif (Sembunyikan)</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Deskripsi Ringkas Layanan <span class="text-[#b55b48]">*</span>
                </label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('description') border-[#b55b48] @enderror">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-[#f0ece4]">
            <div class="text-xs text-[#8c8477]">
                Pembaruan terakhir: {{ $service->updated_at->format('d M Y, H:i') }}
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#564e42] bg-[#f2f0eb] hover:bg-[#e8e4dc] border border-[#d8d2c6] rounded-xl transition-all">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white bg-[#b55b48] hover:bg-[#9c4c3b] rounded-xl shadow-md shadow-[#b55b48]/25 transition-all flex items-center gap-2">
                    <i class="fas fa-save text-[11px]"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
