@extends('layouts.admin')

@section('title', 'Detail Konsultasi')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.consultations.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Detail Konsultasi</h2>
            <p class="text-xs text-[#777166]">Informasi lengkap pengajuan dari calon klien: {{ $consultation->name }}</p>
        </div>
    </div>
    
    {{-- Aksi Cepat --}}
    <div class="flex items-center gap-2">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->whatsapp) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#25D366] hover:bg-[#20b858] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-emerald-600/20">
            <i class="fab fa-whatsapp text-sm"></i>
            <span>Chat Klien via WhatsApp</span>
        </a>
        <form action="{{ route('admin.consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data konsultasi ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#f3cec7] text-[#9c3623] hover:bg-[#fbf0ee] transition-all shadow-xs" title="Hapus Data">
                <i class="fas fa-trash-alt text-xs"></i>
            </button>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Kolom Kiri: Detail Proyek & Klien --}}
    <div class="lg:col-span-2 space-y-6">
        
        {{-- Data Klien --}}
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d] flex items-center gap-2">
                    <i class="fas fa-user-circle text-[#b55b48]"></i> Informasi Calon Klien
                </h3>
            </div>
            <div class="p-6">
                <div class="grid sm:grid-cols-2 gap-y-4 gap-x-6">
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Nama Lengkap</p>
                        <p class="text-sm font-semibold text-[#24211d]">{{ $consultation->name }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Waktu Pengajuan</p>
                        <p class="text-sm font-medium text-[#24211d]">{{ $consultation->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Nomor WhatsApp</p>
                        <p class="text-sm font-medium text-[#2e6930] flex items-center gap-1.5">
                            <i class="fab fa-whatsapp"></i> {{ $consultation->whatsapp }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Alamat Email</p>
                        <p class="text-sm font-medium text-[#24211d]">{{ $consultation->email ?? 'Tidak dicantumkan' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Proyek --}}
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d] flex items-center gap-2">
                    <i class="fas fa-house-chimney text-[#b55b48]"></i> Rincian Proyek & Kebutuhan
                </h3>
            </div>
            <div class="p-6">
                <div class="grid sm:grid-cols-2 gap-y-5 gap-x-6">
                    <div class="sm:col-span-2">
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Lokasi Proyek</p>
                        <p class="text-sm font-medium text-[#24211d] flex items-center gap-1.5">
                            <i class="fas fa-map-marker-alt text-[#b55b48]"></i> 
                            <span>{{ $consultation->project_location }}</span>
                        </p>
                    </div>
                    
                    <div class="border-t border-[#f0ece4] sm:col-span-2 my-0.5"></div>

                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Jenis Proyek</p>
                        <p class="text-sm font-semibold text-[#24211d]">{{ $consultation->project_type }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Ruangan yang Dikerjakan</p>
                        <p class="text-sm font-semibold text-[#24211d]">{{ $consultation->room_type }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Perkiraan Luas Area</p>
                        <p class="text-sm font-semibold text-[#24211d]">{{ $consultation->area_size }} m&sup2;</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1">Gaya / Konsep Desain</p>
                        <p class="text-sm font-semibold text-[#24211d]">{{ $consultation->design_style ?? 'Belum ditentukan' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-1.5">Alokasi Anggaran (Budget)</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-[#fcf5e8] text-[#9c6a1e] text-xs font-semibold border border-[#f0debe]">
                            {{ $consultation->estimated_budget ?? 'Belum ditentukan' }}
                        </span>
                    </div>

                    <div class="border-t border-[#f0ece4] sm:col-span-2 my-0.5"></div>

                    <div class="sm:col-span-2">
                        <p class="text-[11px] font-semibold text-[#8c8477] uppercase tracking-wider mb-2">Pesan & Catatan Tambahan Klien</p>
                        @if($consultation->message)
                            <div class="p-4 bg-[#faf8f5] rounded-2xl text-xs text-[#564e42] leading-relaxed italic border border-[#e8e4dc]">
                                "{!! nl2br(e($consultation->message)) !!}"
                            </div>
                        @else
                            <p class="text-xs text-[#8c8477] italic">Tidak ada catatan pesan tambahan dari klien.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Status & Dokumen --}}
    <div class="lg:col-span-1 space-y-6">
        
        {{-- Status Update --}}
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d] flex items-center gap-2">
                    <i class="fas fa-tasks text-[#b55b48]"></i> Perbarui Status
                </h3>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.consultations.update-status', $consultation) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-3">
                        @foreach([
                            'pending'   => ['Baru Masuk', 'bg-[#f5ecea] border-[#eed0cb] text-[#b55b48]'],
                            'contacted' => ['Sudah Dihubungi', 'bg-[#fcf5e8] border-[#f0debe] text-[#9c6a1e]'],
                            'scheduled' => ['Meeting / Survey Lokasi', 'bg-[#f3f0f7] border-[#e0d6eb] text-[#6b4c8a]'],
                            'finished'  => ['Deal (Proyek Berjalan)', 'bg-[#eef4ee] border-[#cbe3cc] text-[#2e6930]'],
                            'cancelled' => ['Batal / Ditunda', 'bg-[#f4f2ef] border-[#dcd7cb] text-[#736c60]'],
                        ] as $val => [$label, $classes])
                        <label class="flex items-center p-3 border rounded-xl cursor-pointer transition-all {{ $consultation->status === $val ? $classes . ' font-semibold shadow-xs' : 'border-[#e8e4dc] hover:bg-[#faf8f5] text-[#564e42]' }}">
                            <input type="radio" name="status" value="{{ $val }}" class="text-[#b55b48] focus:ring-[#b55b48] h-4 w-4" {{ $consultation->status === $val ? 'checked' : '' }}>
                            <span class="ml-3 text-xs tracking-tight">{{ $label }}</span>
                        </label>
                        @endforeach
                    </div>

                    <button type="submit" class="w-full mt-6 flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
                        <i class="fas fa-save text-[11px]"></i>
                        Simpan Status
                    </button>
                </form>
            </div>
        </div>

        {{-- Referensi Dokumen --}}
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d] flex items-center gap-2">
                    <i class="fas fa-paperclip text-[#b55b48]"></i> Berkas Referensi
                </h3>
            </div>
            <div class="p-6 text-center">
                @if($consultation->reference_file && Storage::disk('public')->exists($consultation->reference_file))
                    <div class="w-14 h-14 rounded-2xl bg-[#f5ecea] border border-[#eed0cb] flex items-center justify-center mx-auto mb-3 text-[#b55b48]">
                        <i class="fas fa-file-download text-xl"></i>
                    </div>
                    <p class="text-sm font-semibold text-[#24211d] mb-1">Klien Melampirkan File</p>
                    <p class="text-xs text-[#777166] mb-4">Denah, foto eksisting, atau moodboard referensi.</p>
                    <a href="{{ Storage::url($consultation->reference_file) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#f2f0eb] hover:bg-[#e8e4dc] border border-[#d8d2c6] rounded-xl text-xs font-semibold uppercase tracking-wider text-[#24211d] transition-all shadow-2xs w-full justify-center">
                        <i class="fas fa-download text-[11px]"></i>
                        Unduh / Buka Berkas
                    </a>
                @else
                    <div class="w-14 h-14 rounded-2xl bg-[#faf8f5] border border-[#e8e4dc] flex items-center justify-center mx-auto mb-3 text-[#b0a99c]">
                        <i class="fas fa-file-slash text-xl"></i>
                    </div>
                    <p class="text-xs text-[#777166]">Klien tidak mengunggah berkas lampiran referensi.</p>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
