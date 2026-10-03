@extends('layouts.admin')

@section('title', 'Kategori Portofolio')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Daftar Kategori Portofolio</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola kategori untuk pengelompokan portofolio dan estimasi proyek.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center gap-2 px-3.5 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                <i class="fas fa-arrow-left text-xs"></i>
                Kembali ke Portofolio
            </a>
            <a href="{{ route('admin.portfolio-categories.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                <i class="fas fa-plus text-xs"></i>
                Tambah Kategori
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Nama Kategori</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Slug</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Deskripsi</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-center w-28">Jumlah Proyek</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-center w-24">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-900">{{ $category->name }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs font-mono bg-gray-100 text-gray-600 px-2 py-0.5 rounded">{{ $category->slug }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $category->description ?? '-' }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                            {{ $category->portfolios_count }} proyek
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($category->status === 'active')
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.portfolio-categories.edit', $category) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit Kategori">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                        @if($category->portfolios_count == 0)
                        <form action="{{ route('admin.portfolio-categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Hapus Kategori">
                                <i class="fas fa-trash-alt text-sm"></i>
                            </button>
                        </form>
                        @else
                        <button disabled class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed" title="Kategori masih dipakai portofolio">
                            <i class="fas fa-trash-alt text-sm"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-folder-open text-4xl mb-3 text-gray-300 block"></i>
                        <p class="text-sm font-medium">Belum ada kategori portofolio.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection
