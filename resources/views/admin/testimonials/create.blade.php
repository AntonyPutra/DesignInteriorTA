@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Tambah Testimoni</h2>
            <p class="text-sm text-gray-500">Buat testimoni baru dari klien.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-3xl">
    <form action="{{ route('admin.testimonials.store') }}" method="POST" class="p-6 sm:p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            {{-- Client Name --}}
            <div>
                <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Klien <span class="text-red-500">*</span>
                </label>
                <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" required
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('client_name') border-red-500 @enderror">
                @error('client_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Project Name --}}
            <div>
                <label for="project_name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Proyek
                </label>
                <input type="text" id="project_name" name="project_name" value="{{ old('project_name') }}" placeholder="Contoh: Interior Rumah PIK"
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
            </div>

            {{-- Rating --}}
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                    Rating <span class="text-red-500">*</span>
                </label>
                <select id="rating" name="rating" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('rating') border-red-500 @enderror">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', 5) == $i ? 'selected' : '' }}>
                            {{ $i }} Bintang
                        </option>
                    @endfor
                </select>
                @error('rating') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Status Publish --}}
            <div class="flex items-center pt-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-10 h-5 rounded-full transition-colors duration-200 peer-checked:bg-green-500 bg-gray-300"></div>
                        <div class="absolute left-0.5 top-0.5 w-4 h-4 rounded-full bg-white shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Tampilkan di Website</span>
                </label>
            </div>

            {{-- Message --}}
            <div class="md:col-span-2">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                    Isi Testimoni <span class="text-red-500">*</span>
                </label>
                <textarea id="message" name="message" rows="4" required
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-200">
            <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-red-800 border border-transparent rounded-lg shadow-sm hover:bg-red-900 transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i>
                Simpan Testimoni
            </button>
        </div>
    </form>
</div>
@endsection
