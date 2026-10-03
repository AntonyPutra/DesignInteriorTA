@extends('layouts.app')

@section('title', 'Cost Estimator')
@section('meta_description', 'Estimasi biaya desain interior & fit-out dengan kalkulator online Pratama Design Studio. Hitung estimasi awal biaya proyek Anda.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-16 lg:py-24" style="background-color: #302c24;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <div class="flex items-center justify-center gap-2 mb-4" style="color: rgba(242,240,235,0.5);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors text-xs uppercase tracking-wider">Home</a>
            <i class="fas fa-chevron-right text-[0.55rem]"></i>
            <span class="text-xs uppercase tracking-wider font-semibold" style="color: #d98d88;">Cost Estimator</span>
        </div>
        <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #d98d88;">Kalkulator Biaya</p>
        <h1 class="font-display text-4xl lg:text-5xl font-semibold text-white tracking-tight"
            style="font-family: 'Cormorant Garamond', Georgia, serif;">
            Cost Estimator
        </h1>
        <p class="mt-4 text-sm max-w-lg mx-auto leading-relaxed" style="color: rgba(242,240,235,0.72);">
            Hitung estimasi awal biaya desain interior &amp; fit-out Anda. Hasil kalkulasi bersifat perkiraan — anggaran final ditentukan melalui survei dan BQ (Bill of Quantity).
        </p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- ESTIMATOR TOOL                                                --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-24" style="background-color: #f2f0eb;">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 items-start">

            {{-- Calculator Form --}}
            <div class="bg-white rounded-2xl overflow-hidden border border-[#e4dfd7]" style="box-shadow: 0 4px 24px rgba(36,33,29,0.06);">
                <div class="px-7 py-5" style="background-color: #302c24;">
                    <h2 class="text-white font-semibold text-base flex items-center gap-2.5">
                        <i class="fas fa-calculator text-sm" style="color: #d98d88;"></i>
                        Input Data Proyek
                    </h2>
                </div>

                <div class="p-7 space-y-6">

                    {{-- Jenis Layanan --}}
                    <div>
                        <label class="form-label" for="est_service_type">Jenis Layanan</label>
                        <select id="est_service_type" onchange="calculate()"
                                class="form-input">
                            <option value="">-- Pilih Jenis Layanan --</option>
                            <optgroup label="Interior Residential">
                                <option value="full_house"       data-min="2500000" data-max="5000000">Full Interior (Rumah/Apartemen)</option>
                                <option value="kitchen_set"      data-min="3000000" data-max="6000000">Kitchen Set</option>
                                <option value="bedroom"          data-min="2000000" data-max="4000000">Bedroom Set</option>
                                <option value="living_room"      data-min="1500000" data-max="3500000">Living Room</option>
                            </optgroup>
                            <optgroup label="Commercial">
                                <option value="fnb"              data-min="4000000" data-max="8000000">F&B / Café / Restaurant</option>
                                <option value="office"           data-min="3000000" data-max="6000000">Office Interior</option>
                                <option value="booth"            data-min="5000000" data-max="9000000">Booth / Exhibition</option>
                            </optgroup>
                            <optgroup label="Exterior">
                                <option value="exterior_house"   data-min="1500000" data-max="3000000">Fasad / Exterior Rumah</option>
                            </optgroup>
                        </select>
                        <p class="text-[11px] text-[#777166] mt-1.5">Harga per m² berdasarkan jenis layanan</p>
                    </div>

                    {{-- Luas Area --}}
                    <div>
                        <label class="form-label" for="est_area">Luas Area (m²)</label>
                        <div class="relative">
                            <input type="number" id="est_area" min="1" step="0.5"
                                   placeholder="0"
                                   oninput="calculate()"
                                   class="form-input pr-12">
                            <span class="absolute right-3.5 top-1/2 -translate-y-1/2 text-sm font-medium text-[#777166]">m²</span>
                        </div>
                    </div>

                    {{-- Kualitas Material --}}
                    <div>
                        <label class="form-label">Kualitas Material</label>
                        <div class="grid grid-cols-3 gap-2">
                            @foreach([
                                ['economy',   'Economy',   'Material standard, efisien.'],
                                ['standard',  'Standard',  'Estetika & fungsi seimbang. (Default)'],
                                ['premium',   'Premium',   'Detail tinggi & hasil terbaik.'],
                            ] as [$val, $label, $desc])
                            <label class="relative cursor-pointer">
                                <input type="radio" name="est_quality" value="{{ $val }}"
                                       onchange="calculate()"
                                       {{ $val === 'standard' ? 'checked' : '' }}
                                       class="absolute opacity-0 w-0 h-0">
                                <div class="quality-card flex flex-col items-center p-3 rounded-xl text-center transition-all duration-200 border-2"
                                     style="{{ $val === 'standard' ? 'border-color: #b55b48; background-color: #faf8f5;' : 'border-color: #e4dfd7; background-color: #f2f0eb;' }}"
                                     data-value="{{ $val }}">
                                    <span class="text-xs font-bold mb-0.5"
                                          style="{{ $val === 'standard' ? 'color: #b55b48;' : 'color: #24211d;' }}">
                                        {{ $label }}
                                    </span>
                                    @if($val === 'economy') <span class="text-[0.65rem] text-[#777166]">×0.80</span>
                                    @elseif($val === 'standard') <span class="text-[0.65rem]" style="color: #b55b48;">×1.00</span>
                                    @else <span class="text-[0.65rem] text-[#777166]">×1.40</span>
                                    @endif
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tambahan: Fee Desain --}}
                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" id="incl_design_fee" onchange="calculate()" checked
                                       class="sr-only peer">
                                <div class="w-10 h-5 rounded-full transition-colors duration-200 peer-checked:bg-[#b55b48] bg-gray-300"></div>
                                <div class="absolute left-0.5 top-0.5 w-4 h-4 rounded-full bg-white shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                            </div>
                            <span class="text-sm font-medium text-[#564e42]">Sertakan fee desain &amp; pengawasan (est. 10-15%)</span>
                        </label>
                    </div>

                </div>
            </div>

            {{-- Result Panel --}}
            <div class="space-y-5">

                {{-- Result Card --}}
                <div id="result-card" class="bg-white rounded-2xl overflow-hidden border border-[#e4dfd7] transition-all duration-300"
                     style="box-shadow: 0 4px 24px rgba(36,33,29,0.06);">
                    <div class="px-7 py-5" style="background-color: #b55b48;">
                        <h2 class="text-white font-semibold text-base flex items-center gap-2.5">
                            <i class="fas fa-chart-bar text-sm"></i>
                            Estimasi Biaya
                        </h2>
                    </div>

                    {{-- Placeholder state --}}
                    <div id="result-placeholder" class="p-7 text-center py-14">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                             style="background-color: #f2f0eb;">
                            <i class="fas fa-calculator text-2xl" style="color: #777166;"></i>
                        </div>
                        <p class="text-sm text-[#777166]">Lengkapi form di sebelah kiri untuk melihat estimasi biaya</p>
                    </div>

                    {{-- Result state (hidden by default) --}}
                    <div id="result-content" class="p-7" style="display: none;">

                        {{-- Input summary --}}
                        <div class="mb-5 p-4 rounded-xl text-xs space-y-1.5 border border-[#e4dfd7]" style="background-color: #f2f0eb;">
                            <div class="flex justify-between">
                                <span class="text-[#777166]">Jenis Layanan:</span>
                                <span class="font-semibold text-[#24211d]" id="summary-service">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#777166]">Luas Area:</span>
                                <span class="font-semibold text-[#24211d]" id="summary-area">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#777166]">Kualitas:</span>
                                <span class="font-semibold text-[#24211d]" id="summary-quality">-</span>
                            </div>
                        </div>

                        {{-- Range --}}
                        <div class="text-center mb-6">
                            <div class="text-xs font-semibold uppercase tracking-wider mb-2 text-[#777166]">Estimasi Biaya Total</div>
                            <div class="font-display text-3xl font-bold leading-tight" style="font-family: 'Cormorant Garamond', Georgia, serif; color: #24211d;">
                                <span id="est-min" style="color: #b55b48;">Rp 0</span>
                                <span class="text-xl text-gray-400 mx-2">—</span>
                                <span id="est-max" style="color: #b55b48;">Rp 0</span>
                            </div>
                        </div>

                        {{-- Per m² breakdown --}}
                        <div class="grid grid-cols-2 gap-3 mb-6">
                            <div class="p-3.5 rounded-xl text-center border border-[#e4dfd7]" style="background-color: #f2f0eb;">
                                <div class="text-[11px] text-[#777166] mb-1 font-medium">Min / m²</div>
                                <div class="text-sm font-bold text-[#24211d]" id="est-per-min">-</div>
                            </div>
                            <div class="p-3.5 rounded-xl text-center border border-[#e4dfd7]" style="background-color: #f2f0eb;">
                                <div class="text-[11px] text-[#777166] mb-1 font-medium">Maks / m²</div>
                                <div class="text-sm font-bold text-[#24211d]" id="est-per-max">-</div>
                            </div>
                        </div>

                        <a href="{{ route('consultation.create') }}"
                           class="flex items-center justify-center gap-2 w-full py-3.5 rounded-lg text-xs font-semibold uppercase tracking-wider text-white transition-opacity hover:opacity-95 shadow-md"
                           style="background-color: #b55b48;">
                            <i class="fas fa-comment-dots"></i>
                            Konsultasi untuk Anggaran Akurat
                        </a>
                    </div>
                </div>

                {{-- Disclaimer Box --}}
                <div class="rounded-2xl p-5 border border-[#e4dfd7]" style="background-color: #faf8f5;">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle mt-0.5 flex-shrink-0" style="color: #b55b48;"></i>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider mb-2 text-[#24211d]">Catatan Penting</h4>
                            <ul class="text-xs space-y-1.5 leading-relaxed text-[#564e42]">
                                <li>• Hasil kalkulasi adalah <strong>perkiraan awal</strong> — bukan penawaran resmi.</li>
                                <li>• Harga final ditentukan setelah <strong>survei lokasi dan penyusunan BQ (Bill of Quantity)</strong>.</li>
                                <li>• Biaya dipengaruhi oleh spesifikasi material, kondisi lokasi, dan scope pekerjaan.</li>
                                <li>• Untuk estimasi akurat, lakukan konsultasi dan survei bersama tim kami.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Price guide --}}
                <div class="bg-white rounded-2xl overflow-hidden border border-[#e4dfd7]">
                    <div class="px-5 py-3.5 border-b border-[#e4dfd7]" style="background-color: #f2f0eb;">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#24211d]">Range Harga per m² (Referensi)</h4>
                    </div>
                    <div class="divide-y divide-[#ede8e1]">
                        @foreach([
                            ['Full Interior (Rumah)',  'Rp 2.5 — 5 Juta'],
                            ['Kitchen Set',            'Rp 3 — 6 Juta'],
                            ['F&B / Café',             'Rp 4 — 8 Juta'],
                            ['Office Interior',        'Rp 3 — 6 Juta'],
                            ['Booth / Exhibition',     'Rp 5 — 9 Juta'],
                        ] as [$label, $range])
                        <div class="flex items-center justify-between px-5 py-2.5">
                            <span class="text-xs text-[#564e42]">{{ $label }}</span>
                            <span class="text-xs font-bold" style="color: #b55b48;">{{ $range }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Bottom CTA Section --}}
<section class="py-16" style="background-color: #302c24;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <h2 class="font-display text-3xl font-semibold text-white mb-3"
            style="font-family: 'Cormorant Garamond', Georgia, serif;">
            Butuh Anggaran yang Lebih Akurat?
        </h2>
        <p class="text-sm mb-6 max-w-lg mx-auto" style="color: rgba(242,240,235,0.72);">
            Konsultasikan rencana ruang Anda langsung dengan desainer Pratama Design Studio. Dapatkan pre-layout concept gratis!
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('consultation.create') }}"
               class="inline-flex items-center gap-2 px-7 py-3 rounded-lg text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-95 shadow-md"
               style="background-color: #b55b48;">
                <i class="fas fa-file-alt"></i>
                Isi Form Konsultasi
            </a>
            <a href="https://wa.me/6282213641995" target="_blank"
               class="inline-flex items-center gap-2 px-7 py-3 rounded-lg text-xs font-semibold uppercase tracking-wider text-white hover:bg-white/10 transition-colors"
               style="border: 1.5px solid rgba(242,240,235,0.45);">
                <i class="fab fa-whatsapp"></i>
                Chat WhatsApp
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
            return 'Rp ' + (value / 1_000_000_000).toFixed(2) + ' M';
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

    // Quality radio toggle styling
    document.querySelectorAll('input[name="est_quality"]').forEach(radio => {
        radio.addEventListener('change', () => {
            document.querySelectorAll('.quality-card').forEach(card => {
                const isSelected = card.dataset.value === radio.value;
                card.style.borderColor       = isSelected ? '#b55b48' : '#e4dfd7';
                card.style.backgroundColor   = isSelected ? '#faf8f5' : '#f2f0eb';
                card.querySelector('span:first-child').style.color = isSelected ? '#b55b48' : '#24211d';
            });
        });
    });
</script>
@endsection
