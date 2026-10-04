@extends('layouts.admin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
    
    <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#faf8f5]">
        <div>
            <h2 class="font-display text-xl font-bold text-[#24211d]">Daftar Layanan Desain</h2>
            <p class="text-xs text-[#777166] mt-0.5">Kelola paket dan spesialisasi layanan interior yang dipublikasikan ke klien.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
            <i class="fas fa-plus text-[10px]"></i>
            Tambah Layanan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                    <th class="px-6 py-4 w-16 text-center">Ikon</th>
                    <th class="px-6 py-4">Nama Layanan</th>
                    <th class="px-6 py-4">Deskripsi Singkat</th>
                    <th class="px-6 py-4 text-center w-28">Status</th>
                    <th class="px-6 py-4 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#eee9e0]">
                @forelse($services as $service)
                <tr class="hover:bg-[#faf8f5] transition-colors">
                    <td class="px-6 py-4 text-center">
                        <div class="w-11 h-11 rounded-2xl bg-[#f5ecea] border border-[#eed0cb] flex items-center justify-center mx-auto text-[#b55b48] shadow-2xs">
                            @php
                                $iconMap = [
                                    'chat-bubble-left-right' => 'fas fa-comments',
                                    'calendar-days'          => 'fas fa-calendar-days',
                                    'calculator'             => 'fas fa-calculator',
                                    'computer-desktop'       => 'fas fa-display',
                                    'wrench-screwdriver'     => 'fas fa-screwdriver-wrench',
                                    'home-modern'            => 'fas fa-house-chimney',
                                    'default'                => 'fas fa-layer-group',
                                ];
                                $faIcon = $iconMap[$service->icon] ?? $iconMap['default'];
                            @endphp
                            <i class="{{ $faIcon }} text-base"></i>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-[#24211d]">{{ $service->name }}</div>
                        <div class="text-xs text-[#999285] font-mono mt-0.5">{{ $service->slug }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-[#564e42] line-clamp-2 leading-relaxed" title="{{ $service->description }}">
                            {{ Str::limit($service->description, 110) }}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($service->status === 'active')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#eef4ee] text-[#2e6930] border border-[#cbe3cc]">
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f2f0eb] text-[#777166] border border-[#dcd7cb]">
                                Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Edit Layanan">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#fbf0ee] text-[#9c3623] hover:bg-[#9c3623] hover:text-white transition-all shadow-xs" title="Hapus Layanan">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <i class="fas fa-layer-group text-3xl text-[#d4cebe] mb-2 block"></i>
                        <h3 class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Layanan</h3>
                        <p class="text-xs text-[#777166] mb-4">Tambahkan layanan interior perdana untuk ditampilkan pada portofolio dan beranda.</p>
                        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#b55b48] hover:text-[#9c4c3b]">
                            <i class="fas fa-plus"></i> Tambah Layanan Baru
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
