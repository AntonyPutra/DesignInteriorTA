@extends('layouts.admin')

@section('title', 'Kategori Portofolio')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
    
    <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#faf8f5]">
        <div>
            <h2 class="font-display text-xl font-bold text-[#24211d]">Daftar Kategori Portofolio</h2>
            <p class="text-xs text-[#777166] mt-0.5">Klasifikasi proyek interior seperti Landed House, Apartemen, F&B, dan Ruang Kerja.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 bg-[#f2f0eb] hover:bg-[#e8e4dc] text-[#24211d] text-xs font-semibold uppercase tracking-wider border border-[#d8d2c6] rounded-xl transition-all shadow-2xs">
                <i class="fas fa-arrow-left text-[10px] text-[#8c8477]"></i>
                Kembali ke Portofolio
            </a>
            <a href="{{ route('admin.portfolio-categories.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
                <i class="fas fa-plus text-[10px]"></i>
                Tambah Kategori
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                    <th class="px-6 py-4">Nama Kategori</th>
                    <th class="px-6 py-4">Slug Identitas</th>
                    <th class="px-6 py-4">Deskripsi Ruang</th>
                    <th class="px-6 py-4 text-center w-28">Jumlah Proyek</th>
                    <th class="px-6 py-4 text-center w-28">Status</th>
                    <th class="px-6 py-4 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#eee9e0]">
                @forelse($categories as $category)
                <tr class="hover:bg-[#faf8f5] transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-[#24211d]">{{ $category->name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-mono bg-[#f2f0eb] text-[#564e42] px-2 py-0.5 rounded-lg border border-[#e0dad0]">{{ $category->slug }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-[#564e42] line-clamp-2 leading-relaxed">{{ $category->description ?? '-' }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#f5ecea] text-[#b55b48] border border-[#eed0cb]">
                            {{ $category->portfolios_count }} Proyek
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($category->status === 'active')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#eef4ee] text-[#2e6930] border border-[#cbe3cc]">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f2f0eb] text-[#777166] border border-[#dcd7cb]">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Edit Kategori">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        @if($category->portfolios_count == 0)
                        <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#fbf0ee] text-[#9c3623] hover:bg-[#9c3623] hover:text-white transition-all shadow-xs" title="Hapus Kategori">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                        @else
                        <button disabled class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f2f0eb] text-[#b0a99c] cursor-not-allowed opacity-60" title="Kategori masih memiliki portofolio aktif">
                            <i class="fas fa-trash-alt text-xs"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-[#777166]">
                        <i class="fas fa-tags text-3xl text-[#d4cebe] mb-2 block"></i>
                        <p class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Kategori Portofolio</p>
                        <p class="text-xs text-[#777166]">Tambahkan kategori pertama untuk mengorganisir karya portofolio Anda.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
    <div class="px-6 py-4 border-t border-[#e8e4dc] bg-[#faf8f5]">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection
