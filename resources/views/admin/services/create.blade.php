@extends('layouts.admin')

@section('title', 'Tambah Layanan Baru')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Tambah Layanan</h2>
            <p class="text-sm text-gray-500">Buat layanan baru untuk ditampilkan di halaman publik.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-4xl">
    <form action="{{ route('admin.services.store') }}" method="POST" class="p-6 sm:p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            {{-- Name --}}
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Layanan <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Slug akan digenerate otomatis berdasarkan nama layanan.</p>
            </div>

            {{-- Icon --}}
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">
                    Icon <span class="text-red-500">*</span>
                </label>
                <select id="icon" name="icon" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('icon') border-red-500 @enderror">
                    <option value="">-- Pilih Icon --</option>
                    @foreach([
                        'chat-bubble-left-right' => 'Consultation / Chat',
                        'calendar-days'          => 'Planning / Schedule',
                        'calculator'             => 'Budgeting / Calculator',
                        'computer-desktop'       => '3D Render / Desktop',
                        'wrench-screwdriver'     => 'Production / Tools',
                        'home-modern'            => 'Fit Out / House',
                    ] as $val => $label)
                        <option value="{{ $val }}" {{ old('icon') == $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                    Status <span class="text-red-500">*</span>
                </label>
                <select id="status" name="status" required
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('status') border-red-500 @enderror">
                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Layanan tidak aktif akan disembunyikan dari website.</p>
            </div>

            {{-- Description --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Deskripsi singkat tentang layanan ini (disarankan 2-3 kalimat max).</p>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-5 border-t border-gray-200">
            <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-red-800 border border-transparent rounded-lg shadow-sm hover:bg-red-900 transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i>
                Simpan Layanan
            </button>
        </div>
    </form>
</div>
@endsection
