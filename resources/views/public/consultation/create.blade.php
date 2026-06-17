@extends('layouts.app')

@section('title', 'Form Konsultasi')
@section('meta_description', 'Isi form konsultasi desain interior Pratama Design Studio. Gratis konsultasi awal dan pre-layout concept.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-16 lg:py-24" style="background-color: #2A2219;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Hubungi Kami</p>
        <h1 class="font-display text-4xl lg:text-5xl font-semibold text-white"
            style="font-family: 'Cormorant Garamond', serif;">
            Form Konsultasi
        </h1>
        <p class="mt-4 text-sm max-w-lg mx-auto leading-relaxed" style="color: rgba(255,255,255,0.6);">
            Ceritakan kebutuhan desain interior Anda. Tim kami akan menghubungi Anda dalam 1×24 jam untuk konsultasi lebih lanjut.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mt-5">
            @foreach(['✓ Gratis Pre-Layout Concept', '✓ Tanpa Biaya Konsultasi', '✓ Respon 1x24 Jam'] as $item)
            <span class="text-xs font-medium px-3 py-1.5 rounded-full"
                  style="background-color: rgba(184,92,74,0.2); color: #E8A898; border: 1px solid rgba(184,92,74,0.3);">
                {{ $item }}
            </span>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CONSULTATION FORM                                             --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: #F8F5EF;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Success Message --}}
        @if(session('success'))
        <div class="mb-8">
            <div class="rounded-2xl p-8 text-center" style="background-color: #ECFDF5; border: 1px solid #A7F3D0;">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                     style="background-color: #D1FAE5;">
                    <i class="fas fa-check text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-green-800 mb-2">Form Berhasil Terkirim!</h3>
                <p class="text-green-700 text-sm leading-relaxed mb-4">{{ session('success') }}</p>
                <p class="text-green-600 text-xs">
                    Sambil menunggu, Anda bisa menghubungi kami langsung via WhatsApp:
                </p>
                <a href="https://wa.me/6282213641995" target="_blank"
                   class="inline-flex items-center gap-2 mt-3 px-5 py-2.5 rounded-full text-sm font-semibold text-white"
                   style="background-color: #25D366;">
                    <i class="fab fa-whatsapp"></i>
                    Chat WhatsApp
                </a>
            </div>
        </div>
        @endif

        {{-- Form Card --}}
        <div class="bg-white rounded-2xl overflow-hidden" style="border: 1px solid #E2DDD6; box-shadow: 0 4px 24px rgba(62,55,44,0.08);">

            {{-- Form Header --}}
            <div class="px-8 py-5" style="background-color: #3E372C;">
                <h2 class="text-white font-semibold text-base">Data Konsultasi</h2>
                <p class="text-xs mt-0.5" style="color: rgba(255,255,255,0.5);">
                    Lengkapi formulir di bawah ini dengan informasi proyek Anda
                </p>
            </div>

            <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data" class="p-7 lg:p-8">
                @csrf

                {{-- Section: Data Diri --}}
                <div class="mb-8">
                    <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #3E372C;">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center text-xs text-white" style="background-color: #B85C4A; font-size: 0.6rem;">1</span>
                        Data Diri
                    </h3>
                    <div class="grid sm:grid-cols-2 gap-5">

                        {{-- Nama --}}
                        <div>
                            <label class="form-label" for="name">
                                Nama Lengkap <span style="color: #B85C4A;">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap Anda"
                                   class="form-input @error('name') border-red-400 @enderror">
                            @error('name')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- WhatsApp --}}
                        <div>
                            <label class="form-label" for="whatsapp">
                                Nomor WhatsApp <span style="color: #B85C4A;">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm font-medium" style="color: #8A6F55;">
                                    <i class="fab fa-whatsapp"></i>
                                </span>
                                <input type="tel" id="whatsapp" name="whatsapp"
                                       value="{{ old('whatsapp') }}"
                                       placeholder="08xx-xxxx-xxxx"
                                       class="form-input pl-9 @error('whatsapp') border-red-400 @enderror">
                            </div>
                            @error('whatsapp')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="sm:col-span-2">
                            <label class="form-label" for="email">
                                Email <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <input type="email" id="email" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="email@contoh.com"
                                   class="form-input @error('email') border-red-400 @enderror">
                            @error('email')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Section: Detail Proyek --}}
                <div class="mb-8">
                    <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #3E372C;">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center text-xs text-white" style="background-color: #B85C4A; font-size: 0.6rem;">2</span>
                        Detail Proyek
                    </h3>
                    <div class="grid sm:grid-cols-2 gap-5">

                        {{-- Lokasi Proyek --}}
                        <div class="sm:col-span-2">
                            <label class="form-label" for="project_location">
                                Lokasi Proyek <span style="color: #B85C4A;">*</span>
                            </label>
                            <input type="text" id="project_location" name="project_location"
                                   value="{{ old('project_location') }}"
                                   placeholder="Contoh: Cengkareng, Jakarta Barat"
                                   class="form-input @error('project_location') border-red-400 @enderror">
                            @error('project_location')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Jenis Proyek --}}
                        <div>
                            <label class="form-label" for="project_type">
                                Jenis Proyek <span style="color: #B85C4A;">*</span>
                            </label>
                            <select id="project_type" name="project_type"
                                    class="form-input @error('project_type') border-red-400 @enderror">
                                <option value="">-- Pilih Jenis Proyek --</option>
                                @foreach(['Rumah', 'Apartemen', 'Café/Restaurant', 'Booth', 'Office', 'Lainnya'] as $opt)
                                <option value="{{ $opt }}" {{ old('project_type') == $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                                @endforeach
                            </select>
                            @error('project_type')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Jenis Ruangan --}}
                        <div>
                            <label class="form-label" for="room_type">
                                Jenis Ruangan <span style="color: #B85C4A;">*</span>
                            </label>
                            <select id="room_type" name="room_type"
                                    class="form-input @error('room_type') border-red-400 @enderror">
                                <option value="">-- Pilih Jenis Ruangan --</option>
                                @foreach(['Full House', 'Living Room', 'Bedroom', 'Kitchen Set', 'Pantry', 'Office Room', 'Booth', 'F&B Space', 'Lainnya'] as $opt)
                                <option value="{{ $opt }}" {{ old('room_type') == $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                                @endforeach
                            </select>
                            @error('room_type')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Luas Area --}}
                        <div>
                            <label class="form-label" for="area_size">
                                Luas Area <span style="color: #B85C4A;">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" id="area_size" name="area_size"
                                       value="{{ old('area_size') }}"
                                       placeholder="0"
                                       min="1" step="0.5"
                                       class="form-input pr-12 @error('area_size') border-red-400 @enderror">
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm font-medium text-gray-400">m²</span>
                            </div>
                            @error('area_size')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>

                        {{-- Estimasi Budget --}}
                        <div>
                            <label class="form-label" for="estimated_budget">
                                Estimasi Budget <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <select id="estimated_budget" name="estimated_budget"
                                    class="form-input">
                                <option value="">-- Pilih Range Budget --</option>
                                @foreach([
                                    'Di bawah Rp 20 Juta',
                                    'Rp 20 - 50 Juta',
                                    'Rp 50 - 100 Juta',
                                    'Rp 100 - 200 Juta',
                                    'Rp 200 - 500 Juta',
                                    'Di atas Rp 500 Juta',
                                    'Belum ditentukan',
                                ] as $opt)
                                <option value="{{ $opt }}" {{ old('estimated_budget') == $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Design Style --}}
                        <div class="sm:col-span-2">
                            <label class="form-label" for="design_style">
                                Style Desain yang Disukai <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <select id="design_style" name="design_style"
                                    class="form-input">
                                <option value="">-- Pilih Style Desain --</option>
                                @foreach(['Modern Minimalist', 'Modern Contemporary', 'Modern Luxury', 'Japandi', 'Classic', 'Eclectic', 'Industrial', 'Lainnya'] as $opt)
                                <option value="{{ $opt }}" {{ old('design_style') == $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Section: Pesan & Referensi --}}
                <div class="mb-8">
                    <h3 class="text-sm font-semibold mb-4 flex items-center gap-2" style="color: #3E372C;">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center text-xs text-white" style="background-color: #B85C4A; font-size: 0.6rem;">3</span>
                        Pesan &amp; Referensi
                    </h3>
                    <div class="space-y-5">

                        {{-- Pesan --}}
                        <div>
                            <label class="form-label" for="message">
                                Kebutuhan / Pesan Tambahan <span class="text-xs font-normal text-gray-400">(opsional)</span>
                            </label>
                            <textarea id="message" name="message" rows="4"
                                      placeholder="Ceritakan lebih detail kebutuhan desain interior Anda, konsep yang diinginkan, atau pertanyaan lainnya..."
                                      class="form-input resize-none">{{ old('message') }}</textarea>
                        </div>

                        {{-- Upload Referensi --}}
                        <div>
                            <label class="form-label" for="reference_file">
                                Upload Referensi <span class="text-xs font-normal text-gray-400">(opsional — JPG, PNG, PDF · Maks. 5MB)</span>
                            </label>
                            <div class="relative">
                                <input type="file" id="reference_file" name="reference_file"
                                       accept=".jpg,.jpeg,.png,.pdf"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                       onchange="updateFileName(this)">
                                <div id="file-upload-area"
                                     class="border-2 border-dashed rounded-lg p-6 text-center transition-colors duration-200"
                                     style="border-color: #E2DDD6; background-color: #FAFAF9;">
                                    <i class="fas fa-cloud-upload-alt text-2xl mb-2" style="color: #C8BDB0;"></i>
                                    <p class="text-sm font-medium" style="color: #6B6B6B;">
                                        Drag & drop atau <span style="color: #B85C4A;">klik untuk pilih file</span>
                                    </p>
                                    <p id="file-name" class="text-xs mt-1 text-gray-400">Belum ada file dipilih</p>
                                </div>
                            </div>
                            @error('reference_file')
                            <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="pt-4" style="border-top: 1px solid #F0EDEA;">
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-10 py-4 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 hover:-translate-y-px"
                            style="background-color: #B85C4A;">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Form Konsultasi
                    </button>
                    <p class="text-xs text-gray-400 mt-3">
                        <i class="fas fa-shield-alt mr-1" style="color: #8A6F55;"></i>
                        Data Anda terlindungi dan tidak akan disebarkan kepada pihak ketiga.
                    </p>
                </div>
            </form>
        </div>

        {{-- Contact quick links --}}
        <div class="mt-8 grid sm:grid-cols-3 gap-4">
            @foreach([
                ['fab fa-whatsapp',  'WhatsApp',  '+62 822 1364 1995', 'https://wa.me/6282213641995', '#25D366'],
                ['fas fa-envelope',  'Email',     'pratamadsb@gmail.com','mailto:pratamadsb@gmail.com', '#8A6F55'],
                ['fab fa-instagram', 'Instagram', '@pratamaid.studio', 'https://instagram.com/pratamaid.studio', '#E1306C'],
            ] as [$icon, $label, $value, $href, $color])
            <a href="{{ $href }}" target="_blank"
               class="flex items-center gap-3 p-4 bg-white rounded-xl transition-all duration-200 hover:-translate-y-0.5"
               style="border: 1px solid #E2DDD6; box-shadow: 0 1px 4px rgba(0,0,0,0.04);">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                     style="background-color: {{ $color }}15;">
                    <i class="{{ $icon }}" style="color: {{ $color }};"></i>
                </div>
                <div>
                    <div class="text-xs font-medium text-gray-400">{{ $label }}</div>
                    <div class="text-sm font-semibold" style="color: #3E372C;">{{ $value }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function updateFileName(input) {
    const fileNameEl = document.getElementById('file-name');
    const uploadArea = document.getElementById('file-upload-area');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const sizeMB = (file.size / (1024*1024)).toFixed(2);
        fileNameEl.textContent = `${file.name} (${sizeMB} MB)`;
        fileNameEl.style.color = '#3E372C';
        uploadArea.style.borderColor = '#B85C4A';
        uploadArea.style.backgroundColor = '#FEF6F4';
    } else {
        fileNameEl.textContent = 'Belum ada file dipilih';
        fileNameEl.style.color = '';
        uploadArea.style.borderColor = '#E2DDD6';
        uploadArea.style.backgroundColor = '#FAFAF9';
    }
}
</script>
@endsection
