@extends('layouts.admin')

@section('title', 'Edit Portofolio')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Proyek</h2>
            <p class="text-sm text-gray-500">Ubah data proyek {{ $portfolio->title }}.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-5xl">
    <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
            
            {{-- Bagian Kiri: Informasi Dasar --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Informasi Dasar</h3>

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Judul Proyek <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('title') border-red-500 @enderror">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Category (Service) --}}
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                        Kategori (Layanan) <span class="text-red-500">*</span>
                    </label>
                    <select id="category_id" name="category_id" required
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('category_id') border-red-500 @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $portfolio->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Project Type & Room Type --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="project_type" class="block text-sm font-medium text-gray-700 mb-1">
                            Jenis Proyek
                        </label>
                        <input type="text" id="project_type" name="project_type" value="{{ old('project_type', $portfolio->project_type) }}" placeholder="Contoh: Residential"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="room_type" class="block text-sm font-medium text-gray-700 mb-1">
                            Jenis Ruangan
                        </label>
                        <input type="text" id="room_type" name="room_type" value="{{ old('room_type', $portfolio->room_type) }}" placeholder="Contoh: Living Room"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>

                {{-- Design Style --}}
                <div>
                    <label for="design_style" class="block text-sm font-medium text-gray-700 mb-1">
                        Style Desain
                    </label>
                    <input type="text" id="design_style" name="design_style" value="{{ old('design_style', $portfolio->design_style) }}" placeholder="Contoh: Modern Minimalist"
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                </div>
            </div>

            {{-- Bagian Kanan: Detail & Gambar --}}
            <div class="space-y-6">
                <h3 class="text-base font-semibold text-gray-800 border-b border-gray-200 pb-2">Detail & Gambar</h3>

                {{-- Location, Year, Client --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                            Lokasi
                        </label>
                        <input type="text" id="location" name="location" value="{{ old('location', $portfolio->location) }}" placeholder="Contoh: Jakarta Selatan"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 mb-1">
                            Tahun
                        </label>
                        <input type="text" id="year" name="year" value="{{ old('year', $portfolio->year) }}"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div class="col-span-2">
                        <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Klien
                        </label>
                        <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $portfolio->client_name) }}" placeholder="Nama Klien / Perusahaan"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>

                {{-- Main Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Gambar Utama
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors relative overflow-hidden" id="image-dropzone">
                        <div class="space-y-1 text-center {{ $portfolio->main_image ? 'hidden' : '' }}" id="upload-content">
                            <i class="fas fa-image mx-auto text-3xl text-gray-400 mb-2"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500 px-1">
                                    <span>Pilih file</span>
                                    <input id="main_image" name="main_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar.</p>
                        </div>
                        
                        <div id="image-preview" class="{{ $portfolio->main_image ? '' : 'hidden' }} absolute inset-0 bg-white">
                            @if($portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image))
                                <img src="{{ Storage::url($portfolio->main_image) }}" alt="Preview" class="w-full h-full object-contain">
                            @else
                                <img src="" alt="Preview" class="w-full h-full object-contain">
                            @endif
                            <div class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity flex items-center justify-center">
                                <label for="main_image_change" class="cursor-pointer bg-white text-gray-800 px-4 py-2 rounded-lg font-medium text-sm hover:bg-gray-100 shadow-sm">
                                    Ganti Gambar
                                    <input id="main_image_change" name="main_image" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('main_image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Deskripsi Penuh --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi Proyek
                </label>
                <textarea id="description" name="description" rows="5"
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('description') border-red-500 @enderror">{{ old('description', $portfolio->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-gray-200">
            <div class="text-sm text-gray-500">
                Terakhir diubah: {{ $portfolio->updated_at->format('d M Y, H:i') }}
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.portfolio.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-red-800 border border-transparent rounded-lg shadow-sm hover:bg-red-900 transition-colors flex items-center gap-2">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
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
</script>
@endpush
