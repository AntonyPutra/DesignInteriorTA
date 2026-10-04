@extends('layouts.admin')

@section('title', 'Daftar Konsultasi')

@section('content')
<div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
    
    <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-[#faf8f5]">
        <div>
            <h2 class="font-display text-xl font-bold text-[#24211d]">Manajemen Pengajuan Konsultasi</h2>
            <p class="text-xs text-[#777166] mt-0.5">Daftar calon klien yang mengirimkan formulir konsultasi desain & renovasi dari website.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                    <th class="px-6 py-4 w-32">Tanggal Masuk</th>
                    <th class="px-6 py-4">Data Klien</th>
                    <th class="px-6 py-4">Kebutuhan Proyek</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-right w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#eee9e0]">
                @forelse($consultations as $consultation)
                <tr class="hover:bg-[#faf8f5] transition-colors {{ $consultation->status === 'pending' ? 'bg-[#fdfaf7]' : '' }}">
                    <td class="px-6 py-4">
                        <div class="text-xs font-semibold text-[#24211d]">{{ $consultation->created_at->format('d M Y') }}</div>
                        <div class="text-[10px] text-[#999285]">{{ $consultation->created_at->format('H:i') }} WIB</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-[#24211d]">{{ $consultation->name }}</div>
                        <div class="flex flex-col gap-1 mt-1">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->whatsapp) }}" target="_blank" class="text-xs text-[#2e6930] hover:text-[#18391a] flex items-center gap-1.5 w-fit font-medium">
                                <i class="fab fa-whatsapp"></i> {{ $consultation->whatsapp }}
                            </a>
                            @if($consultation->email)
                            <a href="mailto:{{ $consultation->email }}" class="text-[11px] text-[#777166] hover:text-[#24211d] flex items-center gap-1.5 w-fit">
                                <i class="fas fa-envelope text-[10px]"></i> {{ Str::limit($consultation->email, 22) }}
                            </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-xs font-semibold text-[#24211d]">{{ $consultation->project_type }} &middot; {{ $consultation->room_type }}</div>
                        <div class="text-xs text-[#777166] mt-0.5 flex items-center gap-1.5">
                            <i class="fas fa-map-marker-alt text-[#b55b48] text-[10px]"></i> 
                            <span>{{ Str::limit($consultation->project_location, 30) }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($consultation->status === 'pending')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f5ecea] text-[#b55b48] border border-[#eed0cb]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#b55b48] mr-1.5 animate-pulse"></span> Baru
                            </span>
                        @elseif($consultation->status === 'contacted')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#fcf5e8] text-[#9c6a1e] border border-[#f0debe]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#c28438] mr-1.5"></span> Dihubungi
                            </span>
                        @elseif($consultation->status === 'scheduled')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f3f0f7] text-[#6b4c8a] border border-[#e0d6eb]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#6b4c8a] mr-1.5"></span> Meeting / Survey
                            </span>
                        @elseif($consultation->status === 'finished')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#eef4ee] text-[#2e6930] border border-[#cbe3cc]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#2e6930] mr-1.5"></span> Deal
                            </span>
                        @elseif($consultation->status === 'cancelled')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f4f2ef] text-[#736c60] border border-[#dcd7cb]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#736c60] mr-1.5"></span> Batal
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.consultations.show', $consultation) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Lihat Detail & Proses">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-[#777166]">
                        <i class="fas fa-comment-dots text-3xl text-[#d4cebe] mb-2 block"></i>
                        <p class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Pengajuan Konsultasi</p>
                        <p class="text-xs text-[#777166]">Form konsultasi yang disubmit pengunjung akan otomatis tercatat di sini.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($consultations->hasPages())
    <div class="px-6 py-4 border-t border-[#e8e4dc] bg-[#faf8f5]">
        {{ $consultations->links() }}
    </div>
    @endif
</div>
@endsection
