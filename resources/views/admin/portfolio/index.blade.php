@extends('layouts.admin')

@section('title', 'Kelola Portofolio')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Daftar Portofolio Proyek</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola data proyek yang telah selesai dikerjakan.</p>
        </div>
        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus text-xs"></i>
            Tambah Proyek
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 w-24 text-center">Gambar</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Judul Proyek</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Kategori & Tipe</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Lokasi & Tahun</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right w-40">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($portfolios as $portfolio)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center">
                        <div class="w-16 h-12 rounded overflow-hidden bg-gray-100 mx-auto">
                            @if($portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image))
                                <img src="{{ Storage::url($portfolio->main_image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($portfolio->title, 40) }}</div>
                        <div class="text-xs text-gray-500 font-mono mt-1">{{ $portfolio->slug }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 mb-1">
                            {{ $portfolio->category->name ?? '-' }}
                        </span>
                        <div class="text-xs text-gray-600">{{ $portfolio->project_type }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900"><i class="fas fa-map-marker-alt text-gray-400 mr-1"></i> {{ $portfolio->location ?? '-' }}</div>
                        <div class="text-xs text-gray-500 mt-1"><i class="fas fa-calendar text-gray-400 mr-1"></i> {{ $portfolio->year ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.portfolio.gallery', $portfolio) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-purple-50 text-purple-600 hover:bg-purple-100 transition-colors" title="Kelola Galeri">
                            <i class="fas fa-images text-sm"></i>
                        </a>
                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portofolio ini beserta gambarnya?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Hapus">
                                <i class="fas fa-trash-alt text-sm"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-images text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 mb-1">Belum ada portofolio</h3>
                        <p class="text-sm text-gray-500 mb-4">Tambahkan proyek pertama Anda untuk menampilkannya di website.</p>
                        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 text-sm font-medium text-red-800 hover:text-red-900">
                            <i class="fas fa-plus"></i> Tambah Proyek
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($portfolios->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $portfolios->links() }}
    </div>
    @endif
</div>
@endsection
