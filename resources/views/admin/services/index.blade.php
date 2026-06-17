@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Daftar Layanan</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola data layanan yang ditampilkan di website.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus text-xs"></i>
            Tambah Layanan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 w-16 text-center">Icon</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Nama Layanan</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Deskripsi Singkat</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-center w-24">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($services as $service)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center mx-auto text-red-800">
                            {{-- Convert the icon string (e.g. 'chat-bubble-left-right') to FA class (fallback if needed) --}}
                            @php
                                $iconMap = [
                                    'chat-bubble-left-right' => 'fas fa-comments',
                                    'calendar-days'          => 'fas fa-calendar-days',
                                    'calculator'             => 'fas fa-calculator',
                                    'computer-desktop'       => 'fas fa-display',
                                    'wrench-screwdriver'     => 'fas fa-screwdriver-wrench',
                                    'home-modern'            => 'fas fa-house-chimney',
                                    'default'                => 'fas fa-star',
                                ];
                                $faIcon = $iconMap[$service->icon] ?? $iconMap['default'];
                            @endphp
                            <i class="{{ $faIcon }} text-lg"></i>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $service->name }}</div>
                        <div class="text-xs text-gray-500 font-mono mt-1">{{ $service->slug }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2" title="{{ $service->description }}">
                            {{ Str::limit($service->description, 100) }}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($service->status === 'active')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
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
                            <i class="fas fa-layer-group text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 mb-1">Belum ada layanan</h3>
                        <p class="text-sm text-gray-500 mb-4">Tambahkan layanan pertama Anda untuk menampilkannya di website.</p>
                        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 text-sm font-medium text-red-800 hover:text-red-900">
                            <i class="fas fa-plus"></i> Tambah Layanan
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
