@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Welcome Hero Card --}}
    <div class="relative bg-gradient-to-br from-[#24211d] to-[#363027] rounded-3xl p-6 sm:p-8 text-[#e8e4dc] shadow-xl border border-[#3e382f] overflow-hidden">
        {{-- Subtle decorative watermark --}}
        <div class="absolute -right-8 -bottom-10 opacity-5 pointer-events-none select-none font-display text-[160px] font-bold text-white">
            P
        </div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#b55b48]/20 text-[#d98d88] border border-[#b55b48]/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#b55b48] animate-pulse"></span>
                    Studio Management
                </span>
                <h2 class="font-display text-2xl sm:text-4xl font-bold text-white tracking-tight leading-tight">
                    Selamat Datang, {{ Auth::user()->name }}
                </h2>
                <p class="text-[#c7bfb2] text-sm sm:text-base leading-relaxed">
                    Kelola portofolio karya, konfigurasi layanan interior, respon konsultasi klien masuk, dan testimoni publik dalam satu kendali terpadu.
                </p>
            </div>

            <div class="flex flex-wrap sm:flex-nowrap items-center gap-3 shrink-0">
                <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider shadow-lg shadow-[#b55b48]/30 transition-all duration-200">
                    <i class="fas fa-plus text-[10px]"></i>
                    Proyek Baru
                </a>
                <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-white border border-white/15 text-xs font-semibold uppercase tracking-wider backdrop-blur-sm transition-all duration-200">
                    <i class="fas fa-comment-dots text-[10px]"></i>
                    Cek Konsultasi
                </a>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach([
            ['Layanan', $stats['services'], 'fas fa-layer-group', 'text-[#b55b48]', 'bg-[#f5ecea]', 'border-[#eed0cb]', route('admin.services.index')],
            ['Portofolio', $stats['portfolios'], 'fas fa-images', 'text-[#302c24]', 'bg-[#f2f0eb]', 'border-[#e0dad0]', route('admin.portfolio.index')],
            ['Konsultasi', $stats['consultations'], 'fas fa-comment-dots', 'text-[#2e6930]', 'bg-[#eef4ee]', 'border-[#cbe3cc]', route('admin.consultations.index')],
            ['Testimoni', $stats['testimonials'], 'fas fa-star', 'text-[#c28438]', 'bg-[#fcf5e8]', 'border-[#f0debe]', route('admin.testimonials.index')],
        ] as [$label, $count, $icon, $iconColor, $bgColor, $borderColor, $link])
        <a href="{{ $link }}" class="block bg-white rounded-2xl border border-[#e8e4dc] p-6 shadow-sm hover:shadow-md hover:border-[#b55b48]/40 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#777166] mb-1.5">{{ $label }}</p>
                    <h3 class="font-display text-4xl font-bold text-[#24211d] leading-none">{{ $count }}</h3>
                </div>
                <div class="w-13 h-13 rounded-2xl {{ $bgColor }} border {{ $borderColor }} flex items-center justify-center transition-transform duration-200 group-hover:scale-110 shadow-xs">
                    <i class="{{ $icon }} text-xl {{ $iconColor }}"></i>
                </div>
            </div>
            <div class="mt-5 pt-3.5 border-t border-[#f2f0eb] flex items-center justify-between text-xs font-semibold text-[#564e42] group-hover:text-[#b55b48] transition-colors">
                <span>Kelola {{ $label }}</span>
                <i class="fas fa-arrow-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Recent Consultations --}}
    <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
        <div class="px-6 sm:px-8 py-5 border-b border-[#e8e4dc] flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#faf8f5]">
            <div>
                <h3 class="font-display text-xl font-bold text-[#24211d]">Konsultasi Terbaru Masuk</h3>
                <p class="text-xs text-[#777166] mt-0.5">Permintaan rancangan interior yang dikirimkan calon klien melalui website.</p>
            </div>
            <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wider text-[#b55b48] hover:text-[#9c4c3b] transition-colors">
                <span>Lihat Semua Konsultasi</span>
                <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#f8f6f2] text-[#6b6355] text-[11px] font-semibold uppercase tracking-wider border-b border-[#e8e4dc]">
                        <th class="px-6 py-4">Tanggal Masuk</th>
                        <th class="px-6 py-4">Nama Klien</th>
                        <th class="px-6 py-4">Tipe Proyek & Ruangan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#eee9e0]">
                    @forelse($recentConsultations as $consultation)
                    <tr class="hover:bg-[#faf8f5] transition-colors">
                        <td class="px-6 py-4 text-xs font-medium text-[#777166]">
                            <div>{{ $consultation->created_at->format('d M Y') }}</div>
                            <div class="text-[10px] text-[#999285]">{{ $consultation->created_at->format('H:i') }} WIB</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-[#24211d]">{{ $consultation->name }}</div>
                            <div class="text-xs text-[#2e6930] flex items-center gap-1 mt-0.5">
                                <i class="fab fa-whatsapp text-xs"></i>
                                <span>{{ $consultation->whatsapp }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs font-semibold text-[#24211d]">{{ $consultation->project_type }}</div>
                            <div class="text-xs text-[#777166] mt-0.5">{{ $consultation->room_type }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($consultation->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f5ecea] text-[#b55b48] border border-[#eed0cb]">Baru</span>
                            @elseif($consultation->status === 'contacted')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#fcf5e8] text-[#9c6a1e] border border-[#f0debe]">Dihubungi</span>
                            @elseif($consultation->status === 'scheduled')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f3f0f7] text-[#6b4c8a] border border-[#e0d6eb]">Meeting / Survey</span>
                            @elseif($consultation->status === 'finished')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#eef4ee] text-[#2e6930] border border-[#cbe3cc]">Deal</span>
                            @elseif($consultation->status === 'cancelled')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#f4f2ef] text-[#736c60] border border-[#dcd7cb]">Batal</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.consultations.show', $consultation) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#f5ecea] text-[#b55b48] hover:bg-[#b55b48] hover:text-white transition-all shadow-xs" title="Lihat Detail Konsultasi">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-[#777166]">
                            <i class="fas fa-inbox text-3xl text-[#d4cebe] mb-2 block"></i>
                            <p class="text-sm font-medium">Belum ada data konsultasi masuk saat ini.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
