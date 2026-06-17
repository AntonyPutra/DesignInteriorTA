@extends('layouts.admin')

@section('title', 'Galeri Portofolio: ' . $portfolio->title)

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.portfolio.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white border border-gray-200 text-gray-500 hover:text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-800">Galeri Proyek</h2>
            <p class="text-sm text-gray-500">{{ $portfolio->title }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Kolom Kiri: Form Tambah Gambar --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800">Tambah Gambar</h3>
            </div>
            
            <form action="{{ route('admin.portfolio.gallery.store', $portfolio) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                {{-- Multiple File Upload --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Pilih Gambar <span class="text-red-500">*</span>
                    </label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*" required
                           class="block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:text-sm file:font-medium
                                  file:bg-red-50 file:text-red-700
                                  hover:file:bg-red-100
                                  border border-gray-300 rounded-lg p-2
                                  @error('images.*') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Bisa memilih lebih dari 1 gambar sekaligus. (Maks 2MB/gambar)</p>
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">Beberapa file gagal diupload.</p>
                    @enderror
                </div>

                {{-- Caption --}}
                <div class="mb-5">
                    <label for="caption" class="block text-sm font-medium text-gray-700 mb-1">
                        Caption (Opsional)
                    </label>
                    <input type="text" id="caption" name="caption" value="{{ old('caption') }}" placeholder="Keterangan singkat..."
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    <p class="mt-1 text-xs text-gray-500">Caption akan diterapkan ke semua gambar yang diupload bersamaan.</p>
                </div>

                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-800 hover:bg-red-900 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-upload"></i>
                    Upload Gambar
                </button>
            </form>
        </div>
    </div>

    {{-- Kolom Kanan: Daftar Galeri --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                <h3 class="text-base font-semibold text-gray-800">Foto Tersimpan ({{ $portfolio->images->count() }})</h3>
            </div>

            <div class="p-6">
                @if($portfolio->images->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach($portfolio->images as $img)
                        <div class="group relative rounded-lg overflow-hidden border border-gray-200 bg-gray-50 aspect-square">
                            <img src="{{ Storage::url($img->image) }}" alt="{{ $img->caption }}" class="w-full h-full object-cover">
                            
                            {{-- Overlay & Actions --}}
                            <div class="absolute inset-0 bg-gray-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-between p-2">
                                <div class="text-right">
                                    <form action="{{ route('admin.portfolio.gallery.destroy', [$portfolio, $img->id]) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded bg-red-600 hover:bg-red-700 text-white flex items-center justify-center shadow-sm transition-colors" title="Hapus Gambar">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                                @if($img->caption)
                                <div class="bg-black/70 rounded p-1.5 backdrop-blur-sm">
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
                    <div class="text-center py-10">
                        <div class="w-16 h-16 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-3">
                            <i class="fas fa-images text-2xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 text-sm">Belum ada foto dalam galeri proyek ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
