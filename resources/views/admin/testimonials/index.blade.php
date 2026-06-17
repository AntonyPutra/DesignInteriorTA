@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Daftar Testimoni Klien</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola review dan testimoni dari klien yang tampil di halaman utama.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus text-xs"></i>
            Tambah Testimoni
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Klien & Proyek</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 w-32">Rating</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Isi Testimoni</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 w-24 text-center">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($testimonials as $testimonial)
                <tr class="hover:bg-gray-50 transition-colors {{ !$testimonial->is_published ? 'bg-gray-50/50 opacity-75' : '' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm shrink-0">
                                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $testimonial->client_name }}</div>
                                <div class="text-xs text-gray-500 mt-0.5">{{ $testimonial->project_name ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex text-amber-400 text-sm">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-gray-200' }}"></i>
                            @endfor
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 italic line-clamp-2" title="{{ $testimonial->message }}">
                            "{{ Str::limit($testimonial->message, 80) }}"
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($testimonial->is_published)
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-800">Tampil</span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">Sembunyi</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?');">
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
                            <i class="fas fa-star text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 mb-1">Belum ada testimoni</h3>
                        <p class="text-sm text-gray-500 mb-4">Tambahkan testimoni pertama dari klien Anda.</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 text-sm font-medium text-red-800 hover:text-red-900">
                            <i class="fas fa-plus"></i> Tambah Testimoni
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($testimonials->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $testimonials->links() }}
    </div>
    @endif
</div>
@endsection
