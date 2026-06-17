@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Welcome Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Ini adalah halaman dashboard admin Pratama Design Studio. Anda dapat mengelola layanan, portofolio, konsultasi, dan testimoni melalui menu di samping.</p>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach([
            ['Layanan', $stats['services'], 'fas fa-layer-group', 'text-blue-600', 'bg-blue-50', route('admin.services.index')],
            ['Portofolio', $stats['portfolios'], 'fas fa-images', 'text-purple-600', 'bg-purple-50', route('admin.portfolio.index')],
            ['Konsultasi', $stats['consultations'], 'fas fa-comment-dots', 'text-green-600', 'bg-green-50', route('admin.consultations.index')],
            ['Testimoni', $stats['testimonials'], 'fas fa-star', 'text-amber-600', 'bg-amber-50', route('admin.testimonials.index')],
        ] as [$label, $count, $icon, $iconColor, $bgColor, $link])
        <a href="{{ $link }}" class="block bg-white rounded-xl shadow-sm border border-gray-200 p-6 transition-all duration-200 hover:shadow-md hover:border-gray-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">{{ $label }}</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $count }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg {{ $bgColor }} flex items-center justify-center transition-transform duration-200 group-hover:scale-110">
                    <i class="{{ $icon }} text-xl {{ $iconColor }}"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium text-gray-500 group-hover:text-gray-700 transition-colors">
                <span>Kelola {{ $label }}</span>
                <i class="fas fa-arrow-right ml-2 text-xs"></i>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Recent Consultations --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800">Konsultasi Terbaru</h3>
            <a href="{{ route('admin.consultations.index') }}" class="text-sm font-medium text-red-800 hover:text-red-900 transition-colors">Lihat Semua</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold border-b border-gray-200">Tanggal</th>
                        <th class="px-6 py-4 font-semibold border-b border-gray-200">Klien</th>
                        <th class="px-6 py-4 font-semibold border-b border-gray-200">Proyek</th>
                        <th class="px-6 py-4 font-semibold border-b border-gray-200">Status</th>
                        <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($recentConsultations as $consultation)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $consultation->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $consultation->name }}</div>
                            <div class="text-xs text-gray-500">{{ $consultation->whatsapp }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $consultation->project_type }}</div>
                            <div class="text-xs text-gray-500">{{ $consultation->room_type }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($consultation->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Baru</span>
                            @elseif($consultation->status === 'contacted')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Dihubungi</span>
                            @elseif($consultation->status === 'scheduled')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Meeting/Survey</span>
                            @elseif($consultation->status === 'finished')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Deal</span>
                            @elseif($consultation->status === 'cancelled')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Batal</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.consultations.show', $consultation) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 hover:text-gray-900 transition-colors" title="Lihat Detail">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                            Belum ada data konsultasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
