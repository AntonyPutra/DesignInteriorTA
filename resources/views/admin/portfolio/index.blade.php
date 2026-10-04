@extends('layouts.admin')

@section('title', 'Kelola Portofolio')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
    
    <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#faf8f5]">
        <div>
            <h2 class="font-display text-xl font-bold text-[#24211d]">Daftar Portofolio Proyek</h2>
            <p class="text-xs text-[#777166] mt-0.5">Kelola karya arsitektur dan interior yang dipamerkan di website.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.portfolio-categories.index') }}" class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 bg-[#f2f0eb] hover:bg-[#e8e4dc] text-[#24211d] text-xs font-semibold uppercase tracking-wider border border-[#d8d2c6] rounded-xl transition-all shadow-2xs">
                <i class="fas fa-tags text-[10px] text-[#8c8477]"></i>
                Kelola Kategori
            </a>
            <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
                <i class="fas fa-plus text-[10px]"></i>
                Tambah Proyek
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                    <th class="px-6 py-4 w-24 text-center">Gambar</th>
                    <th class="px-6 py-4">Judul Proyek</th>
                    <th class="px-6 py-4">Kategori & Tipe</th>
                    <th class="px-6 py-4">Lokasi & Tahun</th>
                    <th class="px-6 py-4 text-right w-40">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#eee9e0]">
                @forelse($portfolios as $portfolio)
                <tr class="hover:bg-[#faf8f5] transition-colors">
                    <td class="px-6 py-4 text-center">
                        <div class="w-16 h-12 rounded-xl overflow-hidden bg-[#f2f0eb] border border-[#e8e4dc] mx-auto shadow-2xs">
                            @if($portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image))
                                <img src="{{ Storage::url($portfolio->main_image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#a8a296]">
                                    <i class="fas fa-image text-sm"></i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-[#24211d]">{{ Str::limit($portfolio->title, 40) }}</div>
                        <div class="text-xs text-[#999285] font-mono mt-0.5">{{ $portfolio->slug }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-[#f5ecea] text-[#b55b48] border border-[#eed0cb] mb-1">
                            {{ $portfolio->category->name ?? '-' }}
                        </span>
                        <div class="text-xs text-[#777166]">{{ $portfolio->project_type }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs font-semibold text-[#24211d] flex items-center gap-1.5">
                            <i class="fas fa-map-marker-alt text-[#b55b48] text-[10px]"></i> 
                            <span>{{ $portfolio->location ?? '-' }}</span>
                        </div>
                        <div class="text-xs text-[#777166] mt-0.5 flex items-center gap-1.5">
                            <i class="fas fa-calendar text-[#8c8477] text-[10px]"></i> 
                            <span>{{ $portfolio->year ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.portfolio.gallery', $portfolio) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f2f0eb] text-[#302c24] hover:bg-[#302c24] hover:text-white transition-all shadow-xs" title="Kelola Galeri Foto">
                            <i class="fas fa-images text-xs"></i>
                        </a>
                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Edit Proyek">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portofolio ini beserta gambarnya?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#fbf0ee] text-[#9c3623] hover:bg-[#9c3623] hover:text-white transition-all shadow-xs" title="Hapus Proyek">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <i class="fas fa-images text-3xl text-[#d4cebe] mb-2 block"></i>
                        <h3 class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Proyek</h3>
                        <p class="text-xs text-[#777166] mb-4">Tambahkan proyek pertama Anda untuk dipamerkan ke galeri portofolio website.</p>
                        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#b55b48] hover:text-[#9c4c3b]">
                            <i class="fas fa-plus"></i> Tambah Proyek Baru
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($portfolios->hasPages())
    <div class="px-6 py-4 border-t border-[#e8e4dc] bg-[#faf8f5]">
        {{ $portfolios->links() }}
    </div>
    @endif
</div>
@endsection
