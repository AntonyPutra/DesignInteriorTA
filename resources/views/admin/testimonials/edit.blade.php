@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Edit Testimoni: {{ $testimonial->client_name }}</h2>
            <p class="text-xs text-[#777166]">Perbarui kutipan testimoni, rating bintang, atau visibilitas ulasan.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden max-w-3xl">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            {{-- Client Name --}}
            <div>
                <label for="client_name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Nama Klien <span class="text-[#b55b48]">*</span>
                </label>
                <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required
                       class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('client_name') border-[#b55b48] @enderror">
                @error('client_name') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Project Name --}}
            <div>
                <label for="project_name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Nama Proyek / Ruangan
                </label>
                <input type="text" id="project_name" name="project_name" value="{{ old('project_name', $testimonial->project_name) }}" placeholder="Contoh: Interior Rumah Citraland"
                       class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
            </div>

            {{-- Rating --}}
            <div>
                <label for="rating" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Rating Bintang <span class="text-[#b55b48]">*</span>
                </label>
                <select id="rating" name="rating" required
                        class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('rating') border-[#b55b48] @enderror">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                            {{ $i }} Bintang ({{ str_repeat('★', $i) }})
                        </option>
                    @endfor
                </select>
                @error('rating') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
            </div>

            {{-- Status Publish --}}
            <div class="flex items-center pt-5">
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <div class="relative">
                        <input type="hidden" name="status" value="inactive">
                        <input type="checkbox" name="status" value="active" {{ old('status', $testimonial->status) == 'active' ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-11 h-6 rounded-full transition-colors duration-200 peer-checked:bg-[#2e6930] bg-[#d8d2c6]"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 rounded-full bg-white shadow-sm transition-transform duration-200 peer-checked:translate-x-5"></div>
                    </div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#564e42]">Tampilkan di Beranda</span>
                </label>
            </div>

            {{-- Message --}}
            <div class="md:col-span-2">
                <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Kutipan Ulasan / Testimoni <span class="text-[#b55b48]">*</span>
                </label>
                <textarea id="message" name="message" rows="4" required
                          class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('message') border-[#b55b48] @enderror">{{ old('message', $testimonial->message) }}</textarea>
                @error('message') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-[#f0ece4]">
            <div class="text-xs text-[#8c8477]">
                Pembaruan terakhir: {{ $testimonial->updated_at->format('d M Y, H:i') }}
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#564e42] bg-[#f2f0eb] hover:bg-[#e8e4dc] border border-[#d8d2c6] rounded-xl transition-all">
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
