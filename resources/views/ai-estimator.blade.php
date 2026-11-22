@extends('layouts.app')

@section('title', 'AI Smart Cost Estimator — Rencana Anggaran Biaya Interior')
@section('meta_description', 'Kalkulasi estimasi Rencana Anggaran Biaya (RAB) desain & bangun interior otomatis secara cerdas dan transparan bersama AI Pratama Design Studio.')

@section('content')

    {{-- Subpage Hero with Database Image & Gradient Blend --}}
    <x-subpage-hero title="AI Smart Cost Estimator" eyebrow="Kalkulator Cerdas Berbasis AI"
        description="Ceritakan impian, ukuran, dan kebutuhan ruangan Anda secara bebas. AI studio kami akan membedah item pekerjaan, menghitung estimasi volume, dan menyusun draf RAB transparan."
        :breadcrumbs="['Cost Estimator' => route('estimator.index'), 'AI Smart Estimator' => '']" image-keyword="bedroom">
        {{-- Estimator Mode Switcher Tabs --}}
        <div class="inline-flex p-1.5 rounded-2xl bg-black/50 backdrop-blur-md border border-white/15 shadow-lg">
            <a href="{{ route('estimator.index') }}"
                class="px-4 py-2 rounded-xl text-xs font-semibold text-white/70 hover:text-white transition-all flex items-center gap-2">
                <i class="fas fa-calculator text-xs"></i>
                <span>Kalkulator Standar</span>
            </a>
            <a href="{{ route('ai-estimator.index') }}"
                class="px-4 py-2 rounded-xl text-xs font-semibold tracking-wide text-white transition-all shadow-md flex items-center gap-2"
                style="background-color: var(--accent);">
                <i class="fas fa-magic text-amber-300 text-xs"></i>
                <span>AI Smart Estimator</span>
            </a>
        </div>
    </x-subpage-hero>

    {{-- ============================================================ --}}
    {{-- AI ESTIMATOR TOOL SECTION --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24" style="background-color: var(--paper); min-height: 700px;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Input Form Card --}}
            <div class="rounded-3xl overflow-hidden shadow-md transition-all duration-300 border"
                style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                
                {{-- Card Header --}}
                <div class="px-7 sm:px-8 py-5 flex items-center justify-between" style="background-color: var(--brown-deep);">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center text-white"
                             style="background-color: var(--accent);">
                            <i class="fas fa-robot text-sm"></i>
                        </div>
                        <div>
                            <h2 class="text-white font-display font-semibold text-lg sm:text-xl tracking-wide leading-tight">
                                Parameter &amp; Kebutuhan Ruang
                            </h2>
                            <p class="text-[11px] text-white/60">Didukung oleh Sistem Estimasi AI 9Router Pratama Studio</p>
                        </div>
                    </div>
                    <span class="text-xs px-3 py-1 rounded-full text-amber-300 border border-amber-400/30 bg-amber-400/10 font-medium hidden sm:inline">
                        Tarif Resmi Studio
                    </span>
                </div>

                <div class="p-6 sm:p-8">
                    {{-- Quick Presets / Templates --}}
                    <div class="mb-7 pb-6 border-b" style="border-color: var(--line);">
                        <div class="flex items-center justify-between mb-3.5">
                            <span class="text-xs font-bold uppercase tracking-wider flex items-center gap-1.5" style="color: var(--text-heading);">
                                <i class="fas fa-bolt text-amber-500"></i>
                                <span>Inspirasi Cepat / Quick Presets:</span>
                            </span>
                            <span class="text-[11px]" style="color: var(--muted);">(Klik untuk mengisi otomatis)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <button type="button"
                                class="preset-chip text-left p-3 rounded-xl border transition-all hover:scale-[1.01] hover:border-[#b55b48] group"
                                style="background-color: var(--paper); border-color: var(--line);"
                                data-room="Master Bedroom" data-size="20" data-style="Japandi Modern"
                                data-details="Master Bedroom ukuran 4x5 meter (20m²) di apartemen. Gaya Japandi Modern dengan sentuhan warm oak wood. Kebutuhan: wardrobe custom full plafon dengan sliding mirror door, bed frame ukuran 180x200 dengan headboard fabric linen, sepasang nakas gantung, meja rias minimalis, dan panel kisi-kisi kayu di dinding headboard.">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="font-semibold text-xs text-[var(--text-heading)] group-hover:text-[var(--accent)]">🛏️ Master Bedroom 20m²</span>
                                    <span class="text-[10px] text-[var(--muted)]">Japandi Modern</span>
                                </div>
                                <p class="text-[11px] line-clamp-1 text-[var(--text-lead)]">Wardrobe full plafon, bed frame 180x200, nakas, meja rias...</p>
                            </button>

                            <button type="button"
                                class="preset-chip text-left p-3 rounded-xl border transition-all hover:scale-[1.01] hover:border-[#b55b48] group"
                                style="background-color: var(--paper); border-color: var(--line);"
                                data-room="Kitchen Set & Pantry" data-size="9" data-style="Modern Minimalist"
                                data-details="Kitchen Set bentuk L ukuran 3x3 meter (9m²) untuk rumah tinggal. Gaya Modern Minimalis dominan warna warm grey dan counter top granit hitam Nero Assoluto. Kebutuhan: kabinet atas full plafon bahan plywood HPL, kabinet bawah, rak piring tarik stainless, sink undermount hitam, backsplash subway tile glossy, dan instalasi hidden LED strip warm white.">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="font-semibold text-xs text-[var(--text-heading)] group-hover:text-[var(--accent)]">🍳 Kitchen Set Minimalis L-Shape</span>
                                    <span class="text-[10px] text-[var(--muted)]">Modern Minimalist</span>
                                </div>
                                <p class="text-[11px] line-clamp-1 text-[var(--text-lead)]">Kabinet HPL anti-rayap, granit counter, rak piring stainless...</p>
                            </button>

                            <button type="button"
                                class="preset-chip text-left p-3 rounded-xl border transition-all hover:scale-[1.01] hover:border-[#b55b48] group"
                                style="background-color: var(--paper); border-color: var(--line);"
                                data-room="Apartemen Studio" data-size="24" data-style="Modern Compact Luxury"
                                data-details="Apartemen Studio 24m² full fit-out. Konsep Modern Compact Luxury untuk unit sewa premium. Kebutuhan: compact kitchen pantry, lemari pakaian 2 pintu menyatu dengan meja kerja, backdrop TV panel marmer sintetis dengan ambalan gantung, partisi kisi-kisi pemisah tempat tidur, dan queen bed frame dengan storage laci di bawah.">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="font-semibold text-xs text-[var(--text-heading)] group-hover:text-[var(--accent)]">🏢 Studio Apartment 24m²</span>
                                    <span class="text-[10px] text-[var(--muted)]">Compact Luxury</span>
                                </div>
                                <p class="text-[11px] line-clamp-1 text-[var(--text-lead)]">Full fit-out, kitchen pantry, TV backdrop, bed storage...</p>
                            </button>

                            <button type="button"
                                class="preset-chip text-left p-3 rounded-xl border transition-all hover:scale-[1.01] hover:border-[#b55b48] group"
                                style="background-color: var(--paper); border-color: var(--line);"
                                data-room="Living & Dining Room" data-size="25" data-style="Modern Luxury"
                                data-details="Living Room ukuran 5x5 meter (25m²). Gaya Modern Luxury mewah dan hangat. Kebutuhan: backdrop TV marmer gantung dengan ambient lighting, credenza bawah 3 meter finishing duco matte, partisi sekat ruangan minimalis kayu besi, dan penataan wall paneling aksen moulding halus.">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="font-semibold text-xs text-[var(--text-heading)] group-hover:text-[var(--accent)]">🛋️ Ruang Keluarga / Living 25m²</span>
                                    <span class="text-[10px] text-[var(--muted)]">Modern Luxury</span>
                                </div>
                                <p class="text-[11px] line-clamp-1 text-[var(--text-lead)]">Backdrop TV marmer, credenza gantung, kisi-kisi partisi...</p>
                            </button>
                        </div>
                    </div>

                    {{-- Structured Parameter Inputs --}}
                    <div class="mb-7 p-5 rounded-2xl border"
                        style="background-color: var(--paper); border-color: var(--line);">
                        <div class="text-xs font-bold uppercase tracking-wider mb-3.5 flex items-center justify-between"
                            style="color: var(--text-heading);">
                            <span class="flex items-center gap-1.5">
                                <i class="fas fa-sliders-h" style="color: var(--accent);"></i>
                                <span>Spesifikasi Ruangan:</span>
                            </span>
                            <span class="text-[11px] font-normal" style="color: var(--muted);">(Tersinkronisasi ke prompt)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" style="color: var(--text-heading);"
                                    for="param-room">Tipe Ruangan</label>
                                <select id="param-room"
                                    class="w-full text-xs rounded-xl p-3 border transition-colors focus:ring-2 focus:ring-[#b55b48]/30 focus:border-[#b55b48] focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <option value="">-- Pilih Tipe --</option>
                                    <option value="Master Bedroom">Kamar Tidur Utama</option>
                                    <option value="Kitchen Set & Pantry">Dapur / Kitchen Set</option>
                                    <option value="Living & Dining Room">Ruang Keluarga &amp; Makan</option>
                                    <option value="Apartemen Studio">Apartemen Studio</option>
                                    <option value="Kantor / Workspace">Ruang Kerja / Kantor</option>
                                    <option value="Cafe / F&B / Komersial">Cafe / Resto / F&amp;B</option>
                                    <option value="Booth Pameran">Booth Pameran</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" style="color: var(--text-heading);"
                                    for="param-area">Luas Area (m²)</label>
                                <div class="relative">
                                    <input type="number" id="param-area" min="1" step="0.5" placeholder="Contoh: 20"
                                        class="w-full text-xs rounded-xl p-3 pr-9 border transition-colors focus:ring-2 focus:ring-[#b55b48]/30 focus:border-[#b55b48] focus:outline-none"
                                        style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-bold text-[var(--muted)]">m²</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" style="color: var(--text-heading);"
                                    for="param-style">Gaya Desain</label>
                                <select id="param-style"
                                    class="w-full text-xs rounded-xl p-3 border transition-colors focus:ring-2 focus:ring-[#b55b48]/30 focus:border-[#b55b48] focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <option value="">-- Pilih Gaya --</option>
                                    <option value="Modern Minimalist">Modern Minimalist</option>
                                    <option value="Japandi Warm Wood">Japandi Warm Wood</option>
                                    <option value="Modern Luxury Studio">Modern Luxury Studio</option>
                                    <option value="Classic Contemporary">Classic Contemporary</option>
                                    <option value="Industrial Modern">Industrial Modern</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold uppercase tracking-wider mb-1.5" style="color: var(--text-heading);"
                                    for="param-budget">Finishing / Material</label>
                                <select id="param-budget"
                                    class="w-full text-xs rounded-xl p-3 border transition-colors focus:ring-2 focus:ring-[#b55b48]/30 focus:border-[#b55b48] focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <option value="Standar Plywood & HPL">Standar (Plywood &amp; HPL)</option>
                                    <option value="Premium Duco & Marmer">Premium (Duco, Kaca, Granit)</option>
                                    <option value="Luxury Custom High-End">Luxury (Solid Wood &amp; Marmer)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Form Submission --}}
                    <form id="ai-estimator-form">
                        @csrf
                        <div class="mb-6">
                            <label for="prompt" class="block text-xs font-bold uppercase tracking-wider mb-2"
                                style="color: var(--text-heading);">
                                Detail Kebutuhan &amp; Spesifikasi Perabot <span style="color: var(--accent);">*</span>
                            </label>
                            <textarea id="prompt" name="prompt" rows="5" required
                                class="w-full rounded-2xl text-sm transition-all p-4.5 focus:outline-none focus:ring-2 focus:ring-[#b55b48]/30 focus:border-[#b55b48] leading-relaxed border shadow-xs"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-heading);"
                                placeholder="Jelaskan kebutuhan interior Anda, misalnya: Saya ingin membuat master bedroom 4x5 meter bergaya Japandi. Membutuhkan wardrobe pintu geser kaca cermin, bed frame 180x200 dengan storage laci, nakas kanan kiri gantung, meja rias minimalis, dan panel kisi-kisi kayu di headboard..."></textarea>
                            <p class="text-[11px] mt-2 flex items-center gap-1.5" style="color: var(--muted);">
                                <i class="fas fa-lightbulb text-amber-500"></i>
                                <span>Tips: Sebutkan dimensi ruangan, jenis furniture, dan material yang diinginkan untuk estimasi yang semakin akurat.</span>
                            </p>
                        </div>

                        <button type="submit" id="btn-generate"
                            class="w-full py-4 rounded-2xl text-xs font-bold uppercase tracking-wider text-white transition-all hover:scale-[1.01] hover:opacity-95 flex justify-center items-center gap-2.5 shadow-lg shadow-[#b55b48]/25 cursor-pointer"
                            style="background-color: var(--accent);">
                            <i class="fas fa-magic text-amber-300"></i>
                            <span>Analisis &amp; Hitung RAB via AI</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Loading State with Step Animations -->
            <div id="loading-state" class="hidden text-center mt-12 mb-12 fade-up">
                <div class="w-20 h-20 rounded-3xl flex items-center justify-center mx-auto mb-5 border shadow-lg relative"
                    style="background-color: var(--card-bg); border-color: var(--line);">
                    <i class="fas fa-magic text-2xl text-amber-500 animate-spin"></i>
                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#b55b48] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-[#b55b48]"></span>
                    </span>
                </div>
                <h3 class="font-display font-semibold text-2xl mb-2" style="color: var(--text-heading);" id="loading-heading">
                    AI Studio Menganalisis Spesifikasi...
                </h3>
                <p class="text-xs max-w-md mx-auto leading-relaxed" style="color: var(--text-lead);" id="loading-desc">
                    Membedah volume pekerjaan sipil, merinci unit furniture custom workshop, dan mengaplikasikan acuan tarif resmi studio.
                </p>
            </div>

            <!-- Result Section: High-End RAB Quotation Breakdown -->
            <div id="result-section" class="hidden mt-12 rounded-3xl overflow-hidden shadow-xl border fade-up"
                style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                
                {{-- Quotation Header Banner --}}
                <div class="px-7 sm:px-8 py-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 text-white"
                    style="background-color: var(--accent);">
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-white/80 block mb-0.5">Draf Rencana Anggaran Biaya</span>
                        <h2 class="font-display font-semibold text-2xl text-white flex items-center gap-2">
                            <i class="fas fa-file-invoice-dollar text-lg"></i>
                            <span>Estimasi RAB Interior</span>
                        </h2>
                    </div>
                    <div class="flex items-center gap-2 print:hidden">
                        <button type="button" onclick="window.print()"
                            class="px-4 py-2 rounded-xl text-xs font-semibold bg-white/15 hover:bg-white/25 text-white border border-white/20 transition-all flex items-center gap-1.5 shadow-sm">
                            <i class="fas fa-print"></i>
                            <span>Cetak PDF</span>
                        </button>
                    </div>
                </div>

                <div class="p-6 sm:p-8 overflow-x-auto print:p-0">
                    {{-- Print Letterhead --}}
                    <div class="mb-6 hidden print:block text-center border-b pb-4">
                        <h1 class="text-2xl font-bold font-display" style="color: var(--text-heading);">Pratama Design Studio</h1>
                        <p class="text-xs" style="color: var(--muted);">PT Pratama Berkah Utama &bull; Interior &amp; Exterior Design and Build</p>
                        <p class="text-[11px] text-[#777166] mt-1">Draf Estimasi Otomatis Rencana Anggaran Biaya (RAB)</p>
                    </div>

                    {{-- Table of Work Items --}}
                    <div class="rounded-2xl overflow-hidden border mb-6" style="border-color: var(--line);">
                        <table class="w-full text-xs sm:text-sm text-left">
                            <thead class="text-[10px] sm:text-[11px] uppercase tracking-wider"
                                style="background-color: var(--paper); color: var(--text-heading);">
                                <tr>
                                    <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">No</th>
                                    <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">Rincian Pekerjaan / Material</th>
                                    <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Vol</th>
                                    <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Sat</th>
                                    <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Tarif Satuan</th>
                                    <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="rab-table-body" class="divide-y text-xs" style="divide-color: var(--line);">
                                <!-- Items injected via JS -->
                            </tbody>
                            <tfoot>
                                <tr class="font-bold border-t" style="background-color: var(--paper); border-color: var(--line);">
                                    <td colspan="5" class="px-5 py-4 text-right uppercase tracking-wider text-xs"
                                        style="color: var(--text-heading);">Grand Total Estimasi RAB:</td>
                                    <td class="px-5 py-4 text-right font-display text-2xl sm:text-3xl font-bold"
                                        style="color: var(--accent);" id="rab-grand-total">Rp 0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{-- AI Designer Notes Card --}}
                    <div class="p-5 rounded-2xl mb-6 border"
                        style="background-color: var(--paper); border-color: var(--line);">
                        <div class="flex items-start gap-3.5">
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 text-white"
                                 style="background-color: var(--accent);">
                                <i class="fas fa-comment-dots text-xs"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider mb-1"
                                    style="color: var(--text-heading);">Catatan &amp; Saran Arsitek AI:</h4>
                                <p class="text-xs leading-relaxed" style="color: var(--text-lead);" id="rab-catatan">-</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-[11px] text-center mb-8 leading-relaxed print:mt-12" style="color: var(--muted);">
                        *Perhitungan di atas disimulasikan secara cerdas berdasarkan parameter tarif resmi company profile Pratama Design Studio.<br>
                        Untuk gambar kerja arsitektur 2D/3D definitif, spesifikasi fisik HPL/Duco, dan kepastian jadwal, silakan konsultasikan gratis bersama tim kami.
                    </div>

                    {{-- Next Step Actions --}}
                    <div class="print:hidden flex flex-wrap justify-center items-center gap-3">
                        <a id="btn-wa-consult" href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-6 py-3.5 rounded-2xl text-xs font-semibold uppercase tracking-wider text-white transition-all hover:scale-105 shadow-md"
                            style="background-color: #25D366;">
                            <i class="fab fa-whatsapp text-base"></i>
                            <span>Konsultasikan RAB Ini ke WhatsApp</span>
                        </a>

                        <a href="{{ route('consultation.create') }}"
                            class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-6 py-3.5 rounded-2xl text-xs font-semibold uppercase tracking-wider text-white transition-all hover:scale-105 shadow-md"
                            style="background-color: var(--accent);">
                            <i class="fas fa-calendar-check text-xs"></i>
                            <span>Form Survei &amp; Pre-Layout Gratis</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Print Styles --}}
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #result-section,
            #result-section * {
                visibility: visible;
            }
            #result-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
                border: none;
            }
            .print\:hidden {
                display: none !important;
            }
            .print\:block {
                display: block !important;
            }
            .print\:p-0 {
                padding: 0 !important;
            }
        }
    </style>

@endsection

@section('scripts')
    <script>
        function formatRp(angka) {
            return 'Rp ' + parseInt(angka).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Quick Presets Handler
        document.querySelectorAll('.preset-chip').forEach(btn => {
            btn.addEventListener('click', function () {
                const promptEl = document.getElementById('prompt');
                promptEl.value = this.dataset.details;

                if (this.dataset.room) document.getElementById('param-room').value = this.dataset.room;
                if (this.dataset.size) document.getElementById('param-area').value = this.dataset.size;
                if (this.dataset.style) document.getElementById('param-style').value = this.dataset.style;

                promptEl.focus();
            });
        });

        // Helper parameters auto-update prompt if user selects
        function syncParamsToPrompt() {
            const room = document.getElementById('param-room').value;
            const area = document.getElementById('param-area').value;
            const style = document.getElementById('param-style').value;
            const promptEl = document.getElementById('prompt');

            if (room || area || style) {
                let composed = `Rencana desain/renovasi ${room || 'ruangan'}`;
                if (area) composed += ` dengan luasan ${area} m²`;
                if (style) composed += `, mengusung gaya desain ${style}.`;
                composed += ' Kebutuhan item pekerjaan dan perabot custom: ';

                if (!promptEl.value || promptEl.value.startsWith('Rencana desain/renovasi')) {
                    promptEl.value = composed;
                }
            }
        }

        document.getElementById('param-room')?.addEventListener('change', syncParamsToPrompt);
        document.getElementById('param-area')?.addEventListener('input', syncParamsToPrompt);
        document.getElementById('param-style')?.addEventListener('change', syncParamsToPrompt);
        document.getElementById('param-budget')?.addEventListener('change', syncParamsToPrompt);

        document.getElementById('ai-estimator-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const room = document.getElementById('param-room')?.value || '';
            const area = document.getElementById('param-area')?.value || '';
            const style = document.getElementById('param-style')?.value || '';
            const budget = document.getElementById('param-budget')?.value || '';
            let promptText = document.getElementById('prompt').value.trim();

            const btn = document.getElementById('btn-generate');
            const loading = document.getElementById('loading-state');
            const resultSection = document.getElementById('result-section');

            if (!promptText) {
                alert('Silakan ceritakan rencana atau kebutuhan ruangan Anda terlebih dahulu.');
                return;
            }

            // Synthesize structured fields
            let finalPrompt = promptText;
            let specs = [];
            if (room) specs.push('Ruangan: ' + room);
            if (area) specs.push('Luas: ' + area + ' m²');
            if (style) specs.push('Gaya: ' + style);
            if (budget) specs.push('Finishing: ' + budget);
            
            if (specs.length > 0 && !finalPrompt.includes('[Spesifikasi:')) {
                finalPrompt = `[Spesifikasi: ${specs.join(', ')}]\n` + finalPrompt;
            }

            // UI Changes
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Sedang Menganalisis RAB...';
            btn.classList.add('opacity-70');
            loading.classList.remove('hidden');
            resultSection.classList.add('hidden');

            try {
                const response = await fetch('{{ route('ai-estimator.generate') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ prompt: finalPrompt })
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || 'Terjadi kendala saat menghubungi AI Studio.');
                }

                // Populate Table
                const tbody = document.getElementById('rab-table-body');
                tbody.innerHTML = '';

                if (data.data && data.data.items) {
                    let i = 1;
                    data.data.items.forEach(item => {
                        tbody.innerHTML += `
                            <tr class="transition-colors hover:bg-black/5 dark:hover:bg-white/5">
                                <td class="px-5 py-3.5 border-b" style="border-color: var(--line); color: var(--muted);">${i++}</td>
                                <td class="px-5 py-3.5 border-b font-medium" style="border-color: var(--line); color: var(--text-heading);">${item.nama_pekerjaan}</td>
                                <td class="px-5 py-3.5 border-b text-center font-semibold" style="border-color: var(--line); color: var(--text-lead);">${item.volume}</td>
                                <td class="px-5 py-3.5 border-b text-center" style="border-color: var(--line); color: var(--muted);">${item.satuan}</td>
                                <td class="px-5 py-3.5 border-b text-right font-mono" style="border-color: var(--line); color: var(--text-lead);">${formatRp(item.harga_satuan)}</td>
                                <td class="px-5 py-3.5 border-b text-right font-mono font-semibold" style="border-color: var(--line); color: var(--text-heading);">${formatRp(item.total)}</td>
                            </tr>
                        `;
                    });

                    const grandTotalFormatted = formatRp(data.data.grand_total);
                    document.getElementById('rab-grand-total').textContent = grandTotalFormatted;
                    document.getElementById('rab-catatan').textContent = data.data.catatan || 'Tidak ada catatan tambahan.';

                    // Update prefilled WhatsApp consultation link
                    const waBtn = document.getElementById('btn-wa-consult');
                    if (waBtn) {
                        const roomLabel = room || 'Interior';
                        const waMsg = `Halo Pratama Design Studio, saya baru saja menyimulasikan estimasi AI untuk ${roomLabel} dengan draf total ${grandTotalFormatted}. Saya ingin mendiskusikan survei lokasi dan konsultasi konsep lebih lanjut.`;
                        waBtn.href = `https://wa.me/6282213641995?text=${encodeURIComponent(waMsg)}`;
                    }

                    // Show Result
                    resultSection.classList.remove('hidden');
                    resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    throw new Error('Format respon estimasi tidak dikenali.');
                }

            } catch (error) {
                alert(error.message);
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-magic text-amber-300"></i> Analisis &amp; Hitung RAB via AI';
                btn.classList.remove('opacity-70');
                loading.classList.add('hidden');
            }
        });
    </script>
@endsection
