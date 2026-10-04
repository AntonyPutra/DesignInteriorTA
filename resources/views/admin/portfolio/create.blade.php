@extends('layouts.admin')

@section('title', 'Tambah Portofolio')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Tambah Proyek Baru</h2>
            <p class="text-xs text-[#777166]">Dokumentasikan hasil karya arsitektur dan interior baru ke dalam portofolio studio.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden max-w-5xl">
    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            
            {{-- Bagian Kiri: Informasi Dasar --}}
            <div class="space-y-6">
                <h3 class="font-display text-lg font-bold text-[#24211d] border-b border-[#eee9e0] pb-2">Informasi Dasar Proyek</h3>

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Judul Proyek <span class="text-[#b55b48]">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Contoh: Modern Japandi Residence"
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('title') border-[#b55b48] @enderror">
                    @error('title') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Category (Service) --}}
                <div>
                    <label for="portfolio_category_id" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Kategori Ruang / Bangunan <span class="text-[#b55b48]">*</span>
                    </label>
                    <select id="portfolio_category_id" name="portfolio_category_id" required
                            class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('portfolio_category_id') border-[#b55b48] @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('portfolio_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('portfolio_category_id') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Status Publikasi <span class="text-[#b55b48]">*</span>
                    </label>
                    <select id="status" name="status" required
                            class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('status') border-[#b55b48] @enderror">
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published (Tampil di Website)</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Simpan Sementara)</option>
                    </select>
                    @error('status') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>

                {{-- Project Type & Room Type --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="project_type" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                            Jenis Proyek
                        </label>
                        <input type="text" id="project_type" name="project_type" value="{{ old('project_type') }}" placeholder="Residential / Commercial"
                               class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    </div>
                    <div>
                        <label for="room_type" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                            Ruangan Utama
                        </label>
                        <input type="text" id="room_type" name="room_type" value="{{ old('room_type') }}" placeholder="Living Room / Kitchen"
                               class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    </div>
                </div>

                {{-- Design Style --}}
                <div>
                    <label for="design_style" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Konsep & Gaya Desain
                    </label>
                    <input type="text" id="design_style" name="design_style" value="{{ old('design_style') }}" placeholder="Contoh: Warm Minimalist, Japandi, Industrial Classic"
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                </div>
            </div>

            {{-- Bagian Kanan: Detail & Gambar --}}
            <div class="space-y-6">
                <h3 class="font-display text-lg font-bold text-[#24211d] border-b border-[#eee9e0] pb-2">Spesifikasi & Visual</h3>

                {{-- Location, Year, Client --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="location" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                            Lokasi Kota
                        </label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Contoh: Surabaya / Malang"
                               class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    </div>
                    <div>
                        <label for="year" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                            Tahun Selesai
                        </label>
                        <input type="text" id="year" name="year" value="{{ old('year', date('Y')) }}"
                               class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    </div>
                    <div class="col-span-2">
                        <label for="client_name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                            Klien / Pemilik
                        </label>
                        <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" placeholder="Nama Pribadi atau Korporasi"
                               class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    </div>
                </div>

                {{-- Main Image --}}
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Foto Utama Portofolio <span class="text-[#b55b48]">*</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-6 pb-6 border-2 border-[#d8d2c6] border-dashed rounded-2xl bg-[#faf8f5] hover:bg-[#f5ecea] transition-colors relative" id="image-dropzone">
                        <div class="space-y-1.5 text-center" id="upload-content">
                            <i class="fas fa-image mx-auto text-3xl text-[#a8a296] mb-1 block"></i>
                            <div class="flex text-xs text-[#564e42] justify-center items-center">
                                <label for="main_image" class="relative cursor-pointer bg-white px-2 py-1 rounded-md font-semibold text-[#b55b48] hover:text-[#9c4c3b] shadow-2xs">
                                    <span>Pilih Berkas Foto</span>
                                    <input id="main_image" name="main_image" type="file" class="sr-only" accept="image/*" required onchange="previewImage(this)">
                                </label>
                                <p class="pl-2">atau tarik ke sini</p>
                            </div>
                            <p class="text-[11px] text-[#8c8477]">JPG, PNG, WebP maks 2MB (Rekomendasi rasio 4:3 / 16:9)</p>
                        </div>
                        <div id="image-preview" class="hidden absolute inset-0 rounded-2xl overflow-hidden bg-white">
                            <img src="" alt="Preview" class="w-full h-full object-cover">
                            <button type="button" onclick="removeImage()" class="absolute top-2 right-2 bg-[#b55b48] text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-[#9c4c3b] shadow-md">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </div>
                    </div>
                    @error('main_image') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Deskripsi Penuh --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Narasi & Deskripsi Lengkap Proyek
                </label>
                <textarea id="description" name="description" rows="5" placeholder="Ceritakan konsep arsitektural, material yang dipilih, dan tantangan desain yang berhasil diselesaikan..."
                          class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('description') border-[#b55b48] @enderror">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-6 border-t border-[#f0ece4]">
            <a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#564e42] bg-[#f2f0eb] hover:bg-[#e8e4dc] border border-[#d8d2c6] rounded-xl transition-all">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white bg-[#b55b48] hover:bg-[#9c4c3b] rounded-xl shadow-md shadow-[#b55b48]/25 transition-all flex items-center gap-2">
                <i class="fas fa-save text-[11px]"></i>
                Simpan Proyek
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('upload-content').classList.add('hidden');
                document.getElementById('image-preview').classList.remove('hidden');
                document.querySelector('#image-preview img').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        document.getElementById('main_image').value = '';
        document.getElementById('image-preview').classList.add('hidden');
        document.getElementById('upload-content').classList.remove('hidden');
        document.querySelector('#image-preview img').src = '';
    }
</script>
@endpush
