@extends('layouts.app')

@section('title', 'Cost Estimator')
@section('meta_description', 'Estimasi biaya desain interior & fit-out dengan kalkulator online Pratama Design Studio. Hitung estimasi awal biaya proyek Anda secara transparan.')

@section('content')

{{-- Subpage Hero with Database Image & Gradient Blend --}}
<x-subpage-hero
    title="Cost Estimator"
    eyebrow="Kalkulator Biaya Proyek"
    description="Hitung estimasi awal biaya desain interior & fit-out secara instan dan transparan sesuai kebutuhan ruangan Anda."
    :breadcrumbs="['Cost Estimator' => '']"
    image-keyword="living"
>
    {{-- Estimator Mode Switcher Tabs --}}
    <div class="inline-flex p-1 rounded-xl bg-black/40 backdrop-blur-md border border-white/15">
        <a href="{{ route('estimator.index') }}"
           class="px-4 py-2 rounded-lg text-xs font-semibold tracking-wide text-white transition-all shadow-sm"
           style="background-color: #B85C4A;">
            <i class="fas fa-calculator mr-1.5"></i> Kalkulator Standar
        </a>
        <a href="{{ route('ai-estimator.index') }}"
           class="px-4 py-2 rounded-lg text-xs font-medium text-gray-300 hover:text-white transition-all">
            <i class="fas fa-magic mr-1.5 text-amber-300"></i> AI Smart Estimator
        </a>
    </div>
</x-subpage-hero>

{{-- ============================================================ --}}
{{-- ESTIMATOR TOOL SECTION                                        --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-8 items-start">

            {{-- Left Column: Calculator Form (7 cols) --}}
            <div class="lg:col-span-7 bg-white rounded-2xl overflow-hidden shadow-sm" style="border: 1px solid #E2DDD6;">
                <div class="px-7 py-5 flex items-center justify-between" style="background-color: #3E372C;">
                    <h2 class="text-white font-semibold text-base flex items-center gap-2.5">
                        <i class="fas fa-sliders-h text-sm" style="color: #B85C4A;"></i>
                        Parameter Ruangan &amp; Proyek
                    </h2>
                    <span class="text-xs text-white/60 hidden sm:inline">Langkah 1 dari 2</span>
                </div>

                <div class="p-7 space-y-6">

                    {{-- Jenis Layanan --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color: #3E372C;" for="est_service_type">
                            Jenis Layanan / Ruangan <span style="color: #B85C4A;">*</span>
                        </label>
                        <div class="relative">
                            <select id="est_service_type" onchange="calculate()"
                                    class="w-full rounded-xl text-sm transition-colors py-3 px-4 appearance-none focus:outline-none focus:ring-2"
                                    style="background-color: #FAF8F5; border: 1px solid #E2DDD6; color: #3E372C;">
                                <option value="">-- Pilih Jenis Layanan Interior --</option>
                                <optgroup label="Interior Residential">
                                    <option value="full_house"       data-min="2500000" data-max="5000000">Full Interior (Rumah / Apartemen)</option>
                                    <option value="kitchen_set"      data-min="3000000" data-max="6000000">Kitchen Set Custom</option>
                                    <option value="bedroom"          data-min="2000000" data-max="4000000">Master Bedroom / Bedroom Set</option>
                                    <option value="living_room"      data-min="1500000" data-max="3500000">Living Room &amp; Entertainment</option>
                                </optgroup>
                                <optgroup label="Commercial &amp; Retail">
                                    <option value="fnb"              data-min="4000000" data-max="8000000">F&amp;B / Café / Restoran</option>
                                    <option value="office"           data-min="3000000" data-max="6000000">Office Interior &amp; Co-Working</option>
                                    <option value="booth"            data-min="5000000" data-max="9000000">Booth Exhibition &amp; Pop-up Store</option>
                                </optgroup>
                                <optgroup label="Exterior &amp; Fasad">
                                    <option value="exterior_house"   data-min="1500000" data-max="3000000">Fasad &amp; Exterior Desain</option>
                                </optgroup>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4" style="color: #8A6F55;">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                        <p class="text-[11px] mt-1.5" style="color: #8A6F55;">Biaya per m² disesuaikan dengan tingkat kerumitan pengerjaan.</p>
                    </div>

                    {{-- Luas Area --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color: #3E372C;" for="est_area">
                            Perkiraan Luas Area (m²) <span style="color: #B85C4A;">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" id="est_area" min="1" step="0.5"
                                   placeholder="Contoh: 36"
                                   oninput="calculate()"
                                   class="w-full rounded-xl text-sm transition-colors py-3 px-4 pr-12 focus:outline-none focus:ring-2"
                                   style="background-color: #FAF8F5; border: 1px solid #E2DDD6; color: #3E372C;">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold" style="color: #8A6F55;">m²</span>
                        </div>
                        <p class="text-[11px] mt-1.5" style="color: #8A6F55;">Masukkan luas lantai atau luas area yang direncanakan.</p>
                    </div>

                    {{-- Kualitas Material (Cards) --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color: #3E372C;">
                            Grade Kualitas Material &amp; Finishing
                        </label>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach([
                                ['economy',   'Economy',   'Efisien & Fungsional', '×0.80'],
                                ['standard',  'Standard',  'Paling Populer',       '×1.00'],
                                ['premium',   'Premium',   'Luxury & Custom High', '×1.40'],
                            ] as [$val, $label, $desc, $mult])
                            <label class="relative cursor-pointer">
                                <input type="radio" name="est_quality" value="{{ $val }}"
                                       onchange="calculate()"
                                       {{ $val === 'standard' ? 'checked' : '' }}
                                       class="sr-only">
                                <div class="quality-card flex flex-col items-center p-3.5 rounded-xl text-center transition-all duration-200"
                                     style="{{ $val === 'standard' ? 'border: 2px solid #B85C4A; background-color: #FEF6F4;' : 'border: 2px solid #E2DDD6; background-color: #FAF8F5;' }}"
                                     data-value="{{ $val }}">
                                    <span class="text-xs font-bold mb-1"
                                          style="{{ $val === 'standard' ? 'color: #B85C4A;' : 'color: #3E372C;' }}">
                                        {{ $label }}
                                    </span>
                                    <span class="text-[10px] leading-tight mb-1" style="color: #8A6F55;">{{ $desc }}</span>
                                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full"
                                          style="{{ $val === 'standard' ? 'background-color: rgba(184,92,74,0.15); color: #B85C4A;' : 'background-color: #EDE8DF; color: #8A6F55;' }}">
                                        {{ $mult }}
                                    </span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tambahan: Fee Desain --}}
                    <div class="pt-2 border-t" style="border-color: #E2DDD6;">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" id="incl_design_fee" onchange="calculate()" checked
                                       class="sr-only peer">
                                <div class="w-11 h-6 rounded-full transition-colors duration-200 peer-checked:bg-[#B85C4A] bg-gray-300"></div>
                                <div class="absolute left-1 top-1 w-4 h-4 rounded-full bg-white shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                            </div>
                            <div>
                                <span class="text-xs font-semibold block" style="color: #3E372C;">
                                    Sertakan Biaya Jasa Desain &amp; Supervisi Proyek
                                </span>
                                <span class="text-[11px]" style="color: #8A6F55;">
                                    Termasuk 3D rendering, gambar kerja detail (DED), dan pengawasan berkala (est. 12.5%).
                                </span>
                            </div>
                        </label>
                    </div>

                </div>
            </div>

            {{-- Right Column: Result Panel & Breakdown (5 cols) --}}
            <div class="lg:col-span-5 space-y-6">

                {{-- Result Card --}}
                <div id="result-card" class="bg-white rounded-2xl overflow-hidden shadow-sm transition-all duration-300"
                     style="border: 1px solid #E2DDD6;">
                    <div class="px-7 py-5 flex items-center justify-between" style="background-color: #B85C4A;">
                        <h2 class="text-white font-semibold text-base flex items-center gap-2">
                            <i class="fas fa-file-invoice-dollar text-sm"></i>
                            Hasil Estimasi Anggaran
                        </h2>
                        <span class="text-xs text-white/80 font-medium">Estimasi Awal</span>
                    </div>

                    {{-- Empty State (Placeholder) --}}
                    <div id="result-placeholder" class="p-8 text-center py-16">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                             style="background-color: #F8F5EF; border: 1px solid #E2DDD6;">
                            <i class="fas fa-calculator text-2xl" style="color: #8A6F55;"></i>
                        </div>
                        <h3 class="text-sm font-semibold mb-1" style="color: #3E372C;">Siap Menghitung</h3>
                        <p class="text-xs max-w-xs mx-auto leading-relaxed" style="color: #8A6F55;">
                            Pilih jenis layanan dan tentukan luas ruangan Anda di form sebelah kiri untuk memunculkan estimasi biaya.
                        </p>
                    </div>

                    {{-- Active Result Content --}}
                    <div id="result-content" class="p-7 space-y-6" style="display: none;">

                        {{-- Parameter Summary Pill --}}
                        <div class="p-4 rounded-xl text-xs space-y-2" style="background-color: #FAF8F5; border: 1px solid #E2DDD6;">
                            <div class="flex justify-between items-center">
                                <span style="color: #8A6F55;">Layanan:</span>
                                <span class="font-semibold text-right" style="color: #3E372C;" id="summary-service">-</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span style="color: #8A6F55;">Luas Area:</span>
                                <span class="font-semibold" style="color: #3E372C;" id="summary-area">-</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span style="color: #8A6F55;">Material Grade:</span>
                                <span class="font-semibold" style="color: #3E372C;" id="summary-quality">-</span>
                            </div>
                        </div>

                        {{-- Total Range Box --}}
                        <div class="text-center py-2">
                            <div class="text-[11px] font-bold uppercase tracking-wider mb-2" style="color: #8A6F55;">
                                Estimasi Rentang Biaya
                            </div>
                            <div class="font-display text-3xl sm:text-4xl font-bold leading-tight"
                                 style="font-family: 'Cormorant Garamond', Georgia, serif; color: #3E372C;">
                                <div class="text-[#B85C4A]" id="est-min">Rp 0</div>
                                <div class="text-xs font-normal text-gray-400 my-1">sampai dengan</div>
                                <div class="text-[#B85C4A]" id="est-max">Rp 0</div>
                            </div>
                        </div>

                        {{-- Unit Cost Breakdown --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3.5 rounded-xl text-center" style="background-color: #FAF8F5; border: 1px solid #E2DDD6;">
                                <div class="text-[10px] uppercase font-bold tracking-wider mb-1" style="color: #8A6F55;">Min / m²</div>
                                <div class="text-xs sm:text-sm font-bold" style="color: #3E372C;" id="est-per-min">-</div>
                            </div>
                            <div class="p-3.5 rounded-xl text-center" style="background-color: #FAF8F5; border: 1px solid #E2DDD6;">
                                <div class="text-[10px] uppercase font-bold tracking-wider mb-1" style="color: #8A6F55;">Maks / m²</div>
                                <div class="text-xs sm:text-sm font-bold" style="color: #3E372C;" id="est-per-max">-</div>
                            </div>
                        </div>

                        {{-- Action Button --}}
                        <div class="space-y-2 pt-2">
                            <a href="{{ route('consultation.create') }}"
                               class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-95 shadow-md"
                               style="background-color: #B85C4A;">
                                <i class="fas fa-calendar-check"></i>
                                Konsultasikan Anggaran Resmi
                            </a>
                            <a href="https://wa.me/6282213641995" target="_blank"
                               class="flex items-center justify-center gap-2 w-full py-3 rounded-xl text-xs font-semibold text-[#3E372C] hover:bg-[#F8F5EF] transition-all"
                               style="border: 1px solid #E2DDD6;">
                                <i class="fab fa-whatsapp text-emerald-600 text-sm"></i>
                                Diskusi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Important Notice Card --}}
                <div class="rounded-2xl p-6 shadow-sm" style="background-color: white; border: 1px solid #E2DDD6;">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0"
                             style="background-color: #FEF6F4; color: #B85C4A;">
                            <i class="fas fa-info text-xs"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider mb-2" style="color: #3E372C;">Catatan Estimasi</h4>
                            <ul class="text-xs space-y-1.5 leading-relaxed" style="color: #6B6B6B;">
                                <li>• Hasil kalkulasi ini adalah <strong>perkiraan awal</strong> berdasarkan standar luasan.</li>
                                <li>• Anggaran resmi dan akurat ditentukan setelah <strong>survei lokasi</strong> dan penyusunan <strong>Bill of Quantity (BQ)</strong> detail.</li>
                                <li>• Pemilihan material spesifik, aksesoris hardware, dan modifikasi sipil akan memengaruhi total biaya akhir.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Reference Price Guide --}}
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm" style="border: 1px solid #E2DDD6;">
                    <div class="px-5 py-3.5 border-b" style="background-color: #F8F5EF; border-color: #E2DDD6;">
                        <h4 class="text-xs font-bold uppercase tracking-wider" style="color: #3E372C;">
                            Standar Kisaran Biaya per m²
                        </h4>
                    </div>
                    <div class="divide-y text-xs" style="divide-color: #E2DDD6;">
                        @foreach([
                            ['Full Interior (Rumah / Apt)', 'Rp 2.5 — 5.0 Juta'],
                            ['Kitchen Set Custom',           'Rp 3.0 — 6.0 Juta'],
                            ['Master Bedroom Set',          'Rp 2.0 — 4.0 Juta'],
                            ['F&B / Café / Restoran',        'Rp 4.0 — 8.0 Juta'],
                            ['Office Interior',              'Rp 3.0 — 6.0 Juta'],
                            ['Booth Exhibition',             'Rp 5.0 — 9.0 Juta'],
                        ] as [$label, $range])
                        <div class="flex items-center justify-between px-5 py-3 hover:bg-[#FAF8F5] transition-colors">
                            <span style="color: #3E372C;">{{ $label }}</span>
                            <span class="font-bold" style="color: #B85C4A;">{{ $range }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- BOTTOM CALL TO ACTION                                         --}}
{{-- ============================================================ --}}
<section class="py-20" style="background-color: #302c24;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl sm:text-4xl font-semibold text-white mb-3"
            style="font-family: 'Cormorant Garamond', Georgia, serif;">
            Ingin Rincian Anggaran yang Presisi?
        </h2>
        <p class="text-sm mb-8 max-w-xl mx-auto leading-relaxed" style="color: rgba(255,255,255,0.7);">
            Konsultasikan visi ruang Anda langsung dengan desainer Pratama Design Studio. Kami bantu survei lapangan, pre-layout concept, dan rincian BQ transparan.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('consultation.create') }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-95 shadow-lg"
               style="background-color: #B85C4A;">
                <i class="fas fa-file-alt"></i>
                Isi Form Konsultasi Gratis
            </a>
            <a href="https://wa.me/6282213641995" target="_blank"
               class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white hover:bg-white/10 transition-colors"
               style="border: 1.5px solid rgba(255,255,255,0.3);">
                <i class="fab fa-whatsapp text-emerald-400"></i>
                Hubungi via WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    const qualityMultipliers = { economy: 0.80, standard: 1.00, premium: 1.40 };
    const qualityLabels     = { economy: 'Economy (×0.80)', standard: 'Standard (×1.00)', premium: 'Premium (×1.40)' };
    const designFeeRate     = 0.125; // 12.5%

    function formatRp(value) {
        if (value >= 1_000_000_000) {
            return 'Rp ' + (value / 1_000_000_000).toFixed(2) + ' Miliar';
        } else if (value >= 1_000_000) {
            return 'Rp ' + (value / 1_000_000).toFixed(1) + ' Juta';
        }
        return 'Rp ' + value.toLocaleString('id-ID');
    }

    function calculate() {
        const serviceEl  = document.getElementById('est_service_type');
        const areaEl     = document.getElementById('est_area');
        const qualityEl  = document.querySelector('input[name="est_quality"]:checked');
        const inclFeeEl  = document.getElementById('incl_design_fee');

        const selectedOption = serviceEl.options[serviceEl.selectedIndex];
        const area           = parseFloat(areaEl.value) || 0;
        const quality        = qualityEl ? qualityEl.value : 'standard';
        const inclFee        = inclFeeEl.checked;

        const minPerM2 = parseInt(selectedOption.dataset.min) || 0;
        const maxPerM2 = parseInt(selectedOption.dataset.max) || 0;
        const qMult    = qualityMultipliers[quality] || 1;
        const feeRate  = inclFee ? (1 + designFeeRate) : 1;

        const totalMin = minPerM2 * area * qMult * feeRate;
        const totalMax = maxPerM2 * area * qMult * feeRate;

        const placeholder = document.getElementById('result-placeholder');
        const content     = document.getElementById('result-content');

        if (!minPerM2 || !area || area <= 0) {
            placeholder.style.display = '';
            content.style.display     = 'none';
            return;
        }

        // Fill results
        document.getElementById('summary-service').textContent  = selectedOption.text || '-';
        document.getElementById('summary-area').textContent     = area + ' m²';
        document.getElementById('summary-quality').textContent  = qualityLabels[quality];
        document.getElementById('est-min').textContent          = formatRp(Math.round(totalMin));
        document.getElementById('est-max').textContent          = formatRp(Math.round(totalMax));
        document.getElementById('est-per-min').textContent      = formatRp(Math.round(minPerM2 * qMult));
        document.getElementById('est-per-max').textContent      = formatRp(Math.round(maxPerM2 * qMult));

        placeholder.style.display = 'none';
        content.style.display     = '';
    }

    // Quality radio card styling
    document.querySelectorAll('input[name="est_quality"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.quality-card').forEach(card => {
                const isSelected = card.dataset.value === radio.value;
                card.style.borderColor     = isSelected ? '#B85C4A' : '#E2DDD6';
                card.style.backgroundColor = isSelected ? '#FEF6F4' : '#FAF8F5';
                const label = card.querySelector('span:first-child');
                if (label) {
                    label.style.color = isSelected ? '#B85C4A' : '#3E372C';
                }
            });
        });
    });
</script>
@endsection
