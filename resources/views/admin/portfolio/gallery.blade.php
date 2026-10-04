@extends('layouts.admin')

@section('title', 'Galeri Portofolio: ' . $portfolio->title)

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#e8e4dc] text-[#564e42] hover:text-[#24211d] hover:bg-[#f2f0eb] transition-all shadow-xs">
            <i class="fas fa-arrow-left text-xs"></i>
        </a>
        <div>
            <h2 class="font-display text-2xl font-bold text-[#24211d]">Galeri Proyek: {{ $portfolio->title }}</h2>
            <p class="text-xs text-[#777166]">Kelola kumpulan foto dokumentasi ruangan, detail material, dan sudut estetika proyek ini.</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Kolom Kiri: Form Tambah Gambar --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d]">Unggah Foto Baru</h3>
                <p class="text-[11px] text-[#777166]">Tambahkan satu atau beberapa foto galeri sekaligus.</p>
            </div>
            
            <form action="{{ route('admin.portfolio.gallery.store', $portfolio) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                {{-- Multiple File Upload --}}
                <div class="mb-5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Pilih Berkas Foto <span class="text-[#b55b48]">*</span>
                    </label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*" required
                           class="block w-full text-xs text-[#564e42]
                                  file:mr-3 file:py-2 file:px-3
                                  file:rounded-xl file:border-0
                                  file:text-xs file:font-semibold
                                  file:bg-[#f5ecea] file:text-[#b55b48]
                                  hover:file:bg-[#eed0cb]
                                  border border-[#d8d2c6] rounded-xl p-2
                                  @error('images.*') border-[#b55b48] @enderror">
                    <p class="mt-1.5 text-[11px] text-[#8c8477]">Dapat memilih beberapa file foto sekaligus. Maks 2MB per foto.</p>
                    @error('images.*')
                        <p class="mt-1 text-xs text-[#b55b48]">Beberapa berkas gagal diunggah.</p>
                    @enderror
                </div>

                {{-- Caption --}}
                <div class="mb-6">
                    <label for="caption" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                        Keterangan Foto / Sudut Ruang (Opsional)
                    </label>
                    <input type="text" id="caption" name="caption" value="{{ old('caption') }}" placeholder="Contoh: Detail Lemari Built-in Kayu Jati"
                           class="w-full rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d]">
                    <p class="mt-1.5 text-[11px] text-[#8c8477]">Keterangan ini akan disematkan ke seluruh foto yang diunggah bersamaan.</p>
                </div>

                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-[#b55b48]/25">
                    <i class="fas fa-upload text-[11px]"></i>
                    Unggah ke Galeri
                </button>
            </form>
        </div>
    </div>

    {{-- Kolom Kanan: Daftar Galeri --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl shadow-sm border border-[#e8e4dc] overflow-hidden">
            <div class="px-6 py-4 border-b border-[#e8e4dc] flex justify-between items-center bg-[#faf8f5]">
                <h3 class="font-display text-lg font-bold text-[#24211d]">Foto Tersimpan</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#f2f0eb] text-[#24211d] border border-[#d8d2c6]">
                    {{ $portfolio->images->count() }} Foto
                </span>
            </div>

            <div class="p-6">
                @if($portfolio->images->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($portfolio->images as $img)
                        <div class="group relative rounded-2xl overflow-hidden border border-[#e8e4dc] bg-[#faf8f5] aspect-square shadow-2xs">
                            <img src="{{ Storage::url($img->image) }}" alt="{{ $img->caption }}" class="w-full h-full object-cover">
                            
                            {{-- Overlay & Actions --}}
                            <div class="absolute inset-0 bg-[#24211d]/70 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-between p-2.5 backdrop-blur-[2px]">
                                <div class="text-right">
                                    <form action="{{ route('admin.portfolio.gallery.destroy', [$portfolio, $img->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-7 h-7 rounded-lg bg-[#b55b48] hover:bg-[#9c4c3b] text-white flex items-center justify-center shadow-sm transition-all" title="Hapus Foto">
                                            <i class="fas fa-trash-alt text-[10px]"></i>
                                        </button>
                                    </form>
                                </div>
                                @if($img->caption)
                                <div class="bg-black/60 rounded-lg p-1.5 backdrop-blur-sm">
                                    <p class="text-[10px] text-white text-center leading-tight line-clamp-2" title="{{ $img->caption }}">
                                        {{ $img->caption }}
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <i class="fas fa-images text-3xl text-[#d4cebe] mb-2 block"></i>
                        <p class="text-sm font-semibold text-[#24211d] mb-1">Belum Ada Foto di Galeri</p>
                        <p class="text-xs text-[#777166]">Gunakan formulir di sebelah kiri untuk mengunggah foto-foto dokumentasi proyek ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
