@extends('layouts.admin')

@section('title', 'Tambah Kategori Portofolio')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio-categories.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Tambah Kategori Baru</h2>
            <p class="text-xs text-[#777166]">Kelompokkan proyek berdasarkan tipe arsitektur atau fungsi ruangan.</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden max-w-2xl">
    <form action="{{ route('admin.portfolio-categories.store') }}" method="POST" class="p-6 sm:p-8">
        @csrf

        <div class="space-y-6">
            {{-- Name --}}
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Nama Kategori <span class="text-[#b55b48]">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Villa, Commercial Space, F&B"
                       class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('name') border-[#b55b48] @enderror">
                @error('name')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
                <p class="mt-1.5 text-[11px] text-[#8c8477]">Slug tautan URL akan dibuat secara otomatis dari nama kategori.</p>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Deskripsi Kategori (Opsional)
                </label>
                <textarea id="description" name="description" rows="3" placeholder="Keterangan singkat mengenai cakupan kategori desain ini..."
                          class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('description') border-[#b55b48] @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                    Status <span class="text-[#b55b48]">*</span>
                </label>
                <select id="status" name="status" required
                        class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] @error('status') border-[#b55b48] @enderror">
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Aktif (Dapat dipilih pada portofolio)</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-[#f0ece4] flex items-center justify-end gap-3">
            <a href="{{ route('admin.portfolio-categories.index') }}" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#564e42] bg-[#f2f0eb] hover:bg-[#e8e4dc] border border-[#d8d2c6] rounded-xl transition-all">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 text-xs font-semibold uppercase tracking-wider text-white bg-[#b55b48] hover:bg-[#9c4c3b] rounded-xl shadow-md shadow-[#b55b48]/25 transition-all flex items-center gap-2">
                <i class="fas fa-save text-[11px]"></i>
                Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection
