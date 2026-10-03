@extends('layouts.admin')

@section('title', 'Edit Kategori Portofolio')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio-categories.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Edit Kategori</h2>
            <p class="text-sm text-gray-500">Perbarui data kategori: {{ $portfolioCategory->name }}</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden max-w-2xl">
    <form action="{{ route('admin.portfolio-categories.update', $portfolioCategory) }}" method="POST" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $portfolioCategory->name) }}" required
                       class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Slug: <span class="font-mono text-gray-700">{{ $portfolioCategory->slug }}</span></p>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi Kategori
                </label>
                <textarea id="description" name="description" rows="3"
                          class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('description') border-red-500 @enderror">{{ old('description', $portfolioCategory->description) }}</textarea>
                @error('description')
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
                    <option value="active" {{ old('status', $portfolioCategory->status) === 'active' ? 'selected' : '' }}>Aktif (Dapat dipilih di portofolio)</option>
                    <option value="inactive" {{ old('status', $portfolioCategory->status) === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center justify-end gap-3">
            <a href="{{ route('admin.portfolio-categories.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" class="px-5 py-2 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm flex items-center gap-2">
                <i class="fas fa-save text-xs"></i>
                Perbarui Kategori
            </button>
        </div>
    </form>
</div>
@endsection
