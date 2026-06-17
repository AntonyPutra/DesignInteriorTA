@extends('layouts.admin')

@section('title', 'Detail Konsultasi')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Detail Konsultasi</h2>
            <p class="text-sm text-gray-500">Informasi lengkap pengajuan dari {{ $consultation->name }}</p>
        </div>
    </div>
    
    {{-- Aksi Cepat --}}
    <div class="flex items-center gap-2">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->whatsapp) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-[#25D366] hover:bg-[#20b858] text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
            <i class="fab fa-whatsapp text-base"></i>
            Chat Klien
        </a>
        <form action="{{ route('admin.consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Hapus data konsultasi ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-red-200 text-red-600 hover:bg-red-50 transition-colors shadow-sm" title="Hapus Data">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Kolom Kiri: Detail Proyek & Klien --}}
    <div class="lg:col-span-2 space-y-6">
        
        {{-- Data Klien --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-user text-gray-400"></i> Informasi Klien
                </h3>
            </div>
            <div class="p-6">
                <div class="grid sm:grid-cols-2 gap-y-4 gap-x-6">
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Nama Lengkap</p>
                        <p class="text-sm font-semibold text-gray-900">{{ $consultation->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Waktu Submit</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">WhatsApp</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->whatsapp }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->email ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Proyek --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-home text-gray-400"></i> Detail Proyek
                </h3>
            </div>
            <div class="p-6">
                <div class="grid sm:grid-cols-2 gap-y-5 gap-x-6">
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Lokasi Proyek</p>
                        <p class="text-sm font-medium text-gray-900"><i class="fas fa-map-marker-alt text-red-700 mr-1"></i> {{ $consultation->project_location }}</p>
                    </div>
                    
                    <div class="border-t border-gray-100 sm:col-span-2 my-1"></div>

                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jenis Proyek</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->project_type }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jenis Ruangan</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->room_type }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Luas Area</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->area_size }} m&sup2;</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Style Desain</p>
                        <p class="text-sm font-medium text-gray-900">{{ $consultation->design_style ?? 'Belum ditentukan' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Estimasi Budget</p>
                        <span class="inline-flex items-center px-2.5 py-1 rounded bg-green-50 text-green-700 text-sm font-medium border border-green-200">
                            {{ $consultation->estimated_budget ?? 'Belum ditentukan' }}
                        </span>
                    </div>

                    <div class="border-t border-gray-100 sm:col-span-2 my-1"></div>

                    <div class="sm:col-span-2">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Pesan Tambahan</p>
                        @if($consultation->message)
                            <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-700 leading-relaxed italic border border-gray-200">
                                "{!! nl2br(e($consultation->message)) !!}"
                            </div>
                        @else
                            <p class="text-sm text-gray-400 italic">Tidak ada pesan tambahan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Status & Dokumen --}}
    <div class="lg:col-span-1 space-y-6">
        
        {{-- Status Update --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-tasks text-gray-400"></i> Update Status
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.consultations.update-status', $consultation) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-4">
                        @foreach([
                            'pending'   => ['Baru Masuk', 'blue'],
                            'contacted' => ['Sudah Dihubungi', 'yellow'],
                            'scheduled' => ['Proses Meeting / Survey', 'purple'],
                            'finished'  => ['Deal (Project Berjalan)', 'green'],
                            'cancelled' => ['Batal / Hold', 'red'],
                        ] as $val => [$label, $color])
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer transition-colors {{ $consultation->status === $val ? 'bg-'.$color.'-50 border-'.$color.'-200 ring-1 ring-'.$color.'-500' : 'border-gray-200 hover:bg-gray-50' }}">
                            <input type="radio" name="status" value="{{ $val }}" class="text-{{$color}}-600 focus:ring-{{$color}}-500 h-4 w-4" {{ $consultation->status === $val ? 'checked' : '' }}>
                            <span class="ml-3 text-sm font-medium {{ $consultation->status === $val ? 'text-'.$color.'-900' : 'text-gray-700' }}">{{ $label }}</span>
                        </label>
                        @endforeach
                    </div>

                    <button type="submit" class="w-full mt-5 flex items-center justify-center gap-2 px-4 py-2.5 bg-gray-900 hover:bg-black text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <i class="fas fa-save"></i>
                        Simpan Status
                    </button>
                </form>
            </div>
        </div>

        {{-- Referensi Dokumen --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-paperclip text-gray-400"></i> File Referensi
                </h3>
            </div>
            <div class="p-6 text-center">
                @if($consultation->reference_file && Storage::disk('public')->exists($consultation->reference_file))
                    <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-file-download text-2xl text-blue-500"></i>
                    </div>
                    <p class="text-sm font-medium text-gray-900 mb-1">Klien melampirkan file referensi</p>
                    <p class="text-xs text-gray-500 mb-4">Anda dapat mengunduh dan melihat file ini.</p>
                    <a href="{{ Storage::url($consultation->reference_file) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm w-full justify-center">
                        <i class="fas fa-download"></i>
                        Download / Lihat File
                    </a>
                @else
                    <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-file-excel text-2xl text-gray-300"></i>
                    </div>
                    <p class="text-sm text-gray-500">Klien tidak melampirkan file referensi desain.</p>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
