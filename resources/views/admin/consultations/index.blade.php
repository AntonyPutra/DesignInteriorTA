@extends('layouts.admin')

@section('title', 'Daftar Konsultasi')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Manajemen Konsultasi</h2>
            <p class="text-sm text-gray-500 mt-1">Daftar klien yang telah mengisi form konsultasi dari website.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 w-32">Tanggal</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Klien</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Detail Proyek</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200">Status</th>
                    <th class="px-6 py-4 font-semibold border-b border-gray-200 text-right w-24">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($consultations as $consultation)
                <tr class="hover:bg-gray-50 transition-colors {{ $consultation->status === 'new' ? 'bg-blue-50/30' : '' }}">
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">{{ $consultation->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-gray-500">{{ $consultation->created_at->format('H:i') }} WIB</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $consultation->name }}</div>
                        <div class="flex flex-col gap-1 mt-1">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->whatsapp) }}" target="_blank" class="text-xs text-green-600 hover:text-green-700 flex items-center gap-1 w-fit">
                                <i class="fab fa-whatsapp"></i> {{ $consultation->whatsapp }}
                            </a>
                            @if($consultation->email)
                            <a href="mailto:{{ $consultation->email }}" class="text-xs text-gray-500 hover:text-gray-700 flex items-center gap-1 w-fit">
                                <i class="fas fa-envelope"></i> {{ Str::limit($consultation->email, 20) }}
                            </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium">{{ $consultation->project_type }} &middot; {{ $consultation->room_type }}</div>
                        <div class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i> {{ Str::limit($consultation->project_location, 25) }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($consultation->status === 'new')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5"></span> Baru
                            </span>
                        @elseif($consultation->status === 'contacted')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span> Dihubungi
                            </span>
                        @elseif($consultation->status === 'meeting')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-purple-500 mr-1.5"></span> Meeting/Survey
                            </span>
                        @elseif($consultation->status === 'deal')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Deal
                            </span>
                        @elseif($consultation->status === 'cancel')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span> Batal
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.consultations.show', $consultation) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-600 hover:bg-red-800 hover:text-white transition-colors" title="Lihat Detail & Proses">
                            <i class="fas fa-chevron-right text-sm"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-comment-dots text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 mb-1">Belum ada konsultasi</h3>
                        <p class="text-sm text-gray-500">Data konsultasi dari klien akan muncul di sini.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($consultations->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $consultations->links() }}
    </div>
    @endif
</div>
@endsection
