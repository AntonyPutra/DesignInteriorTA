@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
    
    <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#faf8f5]">
        <div>
            <h2 class="font-display text-xl font-bold text-[#24211d]">Daftar Testimoni & Ulasan Klien</h2>
            <p class="text-xs text-[#777166] mt-0.5">Ulasan kepuasan hasil rancangan interior yang tampil di beranda utama website.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
            <i class="fas fa-plus text-[10px]"></i>
            Tambah Testimoni
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                    <th class="px-6 py-4">Klien & Proyek</th>
                    <th class="px-6 py-4 w-32">Rating Bintang</th>
                    <th class="px-6 py-4">Kutipan Ulasan</th>
                    <th class="px-6 py-4 text-center w-28">Status</th>
                    <th class="px-6 py-4 text-right w-32">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#eee9e0]">
                @forelse($testimonials as $testimonial)
                <tr class="hover:bg-[#faf8f5] transition-colors {{ $testimonial->status !== 'active' ? 'bg-[#faf8f5]/60 opacity-75' : '' }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#f2f0eb] border border-[#e8e4dc] flex items-center justify-center text-[#564e42] font-display font-bold text-sm shrink-0 shadow-2xs">
                                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-[#24211d]">{{ $testimonial->client_name }}</div>
                                <div class="text-xs text-[#8c8477] mt-0.5">{{ $testimonial->project_name ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex text-[#c28438] text-xs gap-0.5">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-[#c28438]' : 'text-[#ded9cf]' }}"></i>
                            @endfor
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-xs text-[#564e42] italic line-clamp-2 leading-relaxed" title="{{ $testimonial->message }}">
                            "{{ Str::limit($testimonial->message, 90) }}"
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($testimonial->status === 'active')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#eef4ee] text-[#2e6930] border border-[#cbe3cc]">Tampil</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f2f0eb] text-[#777166] border border-[#dcd7cb]">Sembunyi</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-1">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Edit Testimoni">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#fbf0ee] text-[#9c3623] hover:bg-[#9c3623] hover:text-white transition-all shadow-xs" title="Hapus Testimoni">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-[#777166]">
                        <i class="fas fa-star text-3xl text-[#d4cebe] mb-2 block"></i>
                        <p class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Testimoni</p>
                        <p class="text-xs text-[#777166] mb-4">Tambahkan testimoni kepuasan klien untuk dipajang pada halaman depan.</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#b55b48] hover:text-[#9c4c3b]">
                            <i class="fas fa-plus"></i> Tambah Testimoni Baru
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($testimonials->hasPages())
    <div class="px-6 py-4 border-t border-[#e8e4dc] bg-[#faf8f5]">
        {{ $testimonials->links() }}
    </div>
    @endif
</div>
@endsection
