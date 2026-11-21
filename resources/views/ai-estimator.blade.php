@extends('layouts.app')

@section('title', 'AI Smart Cost Estimator')
@section('meta_description', 'Kalkulasi estimasi anggaran desain interior otomatis menggunakan AI cerdas Pratama Design Studio.')

@section('content')

    {{-- Subpage Hero with Database Image & Gradient Blend --}}
    <x-subpage-hero title="AI Smart Cost Estimator" eyebrow="Kalkulator Cerdas Berbasis AI"
        description="Ceritakan bayangan dan kebutuhan ruangan Anda secara bebas. AI kami akan membedah item pekerjaan, menghitung estimasi volume, dan menyusun draf RAB otomatis."
        :breadcrumbs="['Cost Estimator' => route('estimator.index'), 'AI Smart Estimator' => '']" image-keyword="bedroom">
        {{-- Estimator Mode Switcher Tabs --}}
        <div class="inline-flex p-1 rounded-xl bg-black/40 backdrop-blur-md border border-white/15">
            <a href="{{ route('estimator.index') }}"
                class="px-4 py-2 rounded-lg text-xs font-medium text-gray-300 hover:text-white transition-all">
                <i class="fas fa-calculator mr-1.5"></i> Kalkulator Standar
            </a>
            <a href="{{ route('ai-estimator.index') }}"
                class="px-4 py-2 rounded-lg text-xs font-semibold tracking-wide text-white transition-all shadow-sm"
                style="background-color: var(--accent);">
                <i class="fas fa-magic mr-1.5 text-amber-300"></i> AI Smart Estimator
            </a>
        </div>
    </x-subpage-hero>

    {{-- ============================================================ --}}
    {{-- AI ESTIMATOR TOOL SECTION --}}
    {{-- ============================================================ --}}
    <section class="py-16 lg:py-24" style="background-color: var(--paper); min-height: 600px;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Input Prompt Card --}}
            <div class="rounded-2xl overflow-hidden shadow-sm transition-all duration-300 border"
                style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="px-7 py-5 flex items-center justify-between" style="background-color: var(--brown-deep);">
                    <h2 class="text-white font-semibold text-base flex items-center gap-2.5">
                        <i class="fas fa-robot text-sm" style="color: var(--accent);"></i>
                        Ceritakan Rencana &amp; Kebutuhan Ruang Anda
                    </h2>
                    <span class="text-xs text-white/60 hidden sm:inline">Didukung AI Studio</span>
                </div>

                <div class="p-7">
                    {{-- Quick Presets / Templates --}}
                    <div class="mb-6 pb-6 border-b" style="border-color: var(--line);">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold uppercase tracking-wider" style="color: var(--text-heading);">
                                <i class="fas fa-bolt text-amber-500 mr-1"></i> Template Cepat / Quick Presets:
                            </span>
                            <span class="text-[11px]" style="color: var(--muted);">Klik untuk mengisi otomatis</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button type="button"
                                class="preset-chip text-xs px-3.5 py-1.5 rounded-lg border transition-all text-left hover:scale-[1.02]"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-lead);"
                                data-room="Master Bedroom" data-size="20" data-style="Japandi Modern"
                                data-details="Master Bedroom ukuran 4x5 meter (20m²) di apartemen. Gaya Japandi Modern dengan sentuhan warm oak wood. Kebutuhan: wardrobe custom full plafon dengan sliding mirror door, bed frame ukuran 180x200 dengan headboard fabric linen, sepasang nakas gantung, meja rias minimalis, dan panel kisi-kisi kayu di dinding headboard.">
                                🛏️ Master Bedroom 20m²
                            </button>
                            <button type="button"
                                class="preset-chip text-xs px-3.5 py-1.5 rounded-lg border transition-all text-left hover:scale-[1.02]"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-lead);"
                                data-room="Kitchen Set" data-size="9" data-style="Modern Minimalist"
                                data-details="Kitchen Set bentuk L ukuran 3x3 meter (9m²) untuk rumah tinggal. Gaya Modern Minimalis dominan warna warm grey dan counter top granit hitam Nero Assoluto. Kebutuhan: kabinet atas full plafon bahan plywood HPL, kabinet bawah, rak piring tarik stainless, sink undermount hitam, backsplash subway tile glossy, dan instalasi hidden LED strip warm white.">
                                🍳 Kitchen Set Minimalis L-Shape
                            </button>
                            <button type="button"
                                class="preset-chip text-xs px-3.5 py-1.5 rounded-lg border transition-all text-left hover:scale-[1.02]"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-lead);"
                                data-room="Apartemen Studio" data-size="24" data-style="Modern Compact Luxury"
                                data-details="Apartemen Studio 24m² full fit-out. Konsep Modern Compact Luxury untuk unit sewa premium. Kebutuhan: compact kitchen pantry, lemari pakaian 2 pintu menyatu dengan meja kerja, backdrop TV panel marmer sintetis dengan ambalan gantung, partisi kisi-kisi pemisah tempat tidur, dan queen bed frame dengan storage laci di bawah.">
                                🏢 Studio Apartment 24m²
                            </button>
                            <button type="button"
                                class="preset-chip text-xs px-3.5 py-1.5 rounded-lg border transition-all text-left hover:scale-[1.02]"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-lead);"
                                data-room="Living Room" data-size="25" data-style="Modern Contemporary"
                                data-details="Living Room ukuran 5x5 meter (25m²). Gaya Modern Kontemporer mewah dan hangat. Kebutuhan: backdrop TV gantung dengan lighting ambient, credenza bawah 3 meter finishing duco matte, partisi sekat ruangan minimalis kayu besi, dan penataan wall paneling aksen moulding halus.">
                                🛋️ Ruang Keluarga / Living 25m²
                            </button>
                        </div>
                    </div>

                    {{-- Structured Field Helpers --}}
                    <div class="mb-6 p-4 rounded-xl border"
                        style="background-color: var(--paper); border-color: var(--line);">
                        <div class="text-xs font-bold uppercase tracking-wider mb-3 flex items-center justify-between"
                            style="color: var(--text-heading);">
                            <span><i class="fas fa-sliders-h mr-1.5" style="color: var(--accent);"></i> Parameter
                                Spesifikasi Ruangan:</span>
                            <span class="text-[11px] font-normal" style="color: var(--muted);">(Otomatis digabung ke prompt
                                AI)</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                            <div>
                                <label class="block text-[11px] font-semibold mb-1" style="color: var(--text-heading);"
                                    for="param-room">Tipe Ruangan</label>
                                <select id="param-room"
                                    class="w-full text-xs rounded-lg p-2.5 border focus:ring-2 focus:ring-accent focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <option value="">-- Pilih Tipe --</option>
                                    <option value="Master Bedroom">Kamar Tidur Utama</option>
                                    <option value="Kitchen Set & Pantry">Dapur / Kitchen Set</option>
                                    <option value="Living & Dining Room">Ruang Keluarga & Makan</option>
                                    <option value="Apartemen Studio">Apartemen Studio</option>
                                    <option value="Kantor / Workspace">Ruang Kerja / Kantor</option>
                                    <option value="Cafe / F&B / Komersial">Cafe / Resto / Komersial</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold mb-1" style="color: var(--text-heading);"
                                    for="param-area">Luas Area (m²)</label>
                                <input type="number" id="param-area" min="1" step="0.5" placeholder="Contoh: 20"
                                    class="w-full text-xs rounded-lg p-2.5 border focus:ring-2 focus:ring-accent focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold mb-1" style="color: var(--text-heading);"
                                    for="param-style">Gaya Desain</label>
                                <select id="param-style"
                                    class="w-full text-xs rounded-lg p-2.5 border focus:ring-2 focus:ring-accent focus:outline-none"
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
                                <label class="block text-[11px] font-semibold mb-1" style="color: var(--text-heading);"
                                    for="param-budget">Kisaran Budget</label>
                                <select id="param-budget"
                                    class="w-full text-xs rounded-lg p-2.5 border focus:ring-2 focus:ring-accent focus:outline-none"
                                    style="background-color: var(--card-bg); border-color: var(--line); color: var(--text-heading);">
                                    <option value="">-- Pilih Budget --</option>
                                    <option value="Di bawah Rp 25 Juta">&lt; Rp 25 Juta</option>
                                    <option value="Rp 25 - 50 Juta">Rp 25 - 50 Juta</option>
                                    <option value="Rp 50 - 100 Juta">Rp 50 - 100 Juta</option>
                                    <option value="Rp 100 - 250 Juta">Rp 100 - 250 Juta</option>
                                    <option value="Di atas Rp 250 Juta">&gt; Rp 250 Juta</option>
                                    <option value="Fleksibel / Sesuai Rekomendasi">Fleksibel / Standar RAB</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <form id="ai-estimator-form">
                        @csrf
                        <div class="mb-5">
                            <label for="prompt" class="block text-xs font-bold uppercase tracking-wider mb-2.5"
                                style="color: var(--text-heading);">
                                Deskripsi Rencana &amp; Kebutuhan Ruangan <span style="color: var(--accent);">*</span>
                            </label>
                            <textarea id="prompt" name="prompt" rows="5" required
                                class="w-full rounded-xl text-sm transition-all p-4 focus:outline-none focus:ring-2 focus:ring-accent leading-relaxed border"
                                style="background-color: var(--paper); border-color: var(--line); color: var(--text-heading);"
                                placeholder="Contoh: Saya memiliki master bedroom ukuran 4x5 meter di apartemen. Saya menyukai gaya Japandi Modern dengan sentuhan warm wood. Saya membutuhkan wardrobe custom full plafon dengan pintu cermin, bed frame 180x200 dengan headboard fabric, meja rias gantung, nakas kanan-kiri, dan panel kisi-kisi kayu di dinding utama..."></textarea>
                            <p class="text-[11px] mt-2" style="color: var(--muted);">
                                Tips: Semakin detail Anda menyebutkan luasan ruangan, perabot yang diinginkan, dan
                                preferensi finishing, estimasi AI akan semakin presisi.
                            </p>
                        </div>
                        <button type="submit" id="btn-generate"
                            class="w-full py-4 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all hover:opacity-95 flex justify-center items-center gap-2 shadow-md cursor-pointer"
                            style="background-color: var(--accent);">
                            <i class="fas fa-magic text-amber-300"></i> Buat Estimasi Rincian RAB dengan AI
                        </button>
                    </form>
                </div>
            </div>

            <!-- Loading State -->
            <div id="loading-state" class="hidden text-center mt-12 mb-12 animate-pulse">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 border"
                    style="background-color: var(--card-bg); border-color: var(--line);">
                    <i class="fas fa-spinner fa-spin text-2xl" style="color: var(--accent);"></i>
                </div>
                <h3 class="text-base font-bold mb-1"
                    style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">AI sedang
                    menganalisis spesifikasi ruangan...</h3>
                <p class="text-xs" style="color: var(--muted);">Menyusun item pekerjaan konstruksi, menghitung volume, dan
                    mencocokkan standar harga material interior.</p>
            </div>

            <!-- Result Section -->
            <div id="result-section" class="hidden mt-12 rounded-2xl overflow-hidden shadow-lg border"
                style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="px-7 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3"
                    style="background-color: var(--accent);">
                    <h2 class="text-white font-semibold text-base flex items-center gap-2">
                        <i class="fas fa-file-invoice-dollar text-sm"></i>
                        Draf Estimasi Rencana Anggaran Biaya (RAB)
                    </h2>
                    <button onclick="window.print()"
                        class="text-white hover:text-white/80 text-xs font-semibold flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-print"></i> Cetak / Simpan PDF
                    </button>
                </div>

                <div class="p-7 overflow-x-auto print:p-0">
                    <div class="mb-6 hidden print:block text-center">
                        <h1 class="text-2xl font-bold" style="color: var(--text-heading);">Rencana Anggaran Biaya (Estimasi
                            AI)</h1>
                        <p class="text-xs" style="color: var(--muted);">Pratama Design Studio — Interior &amp; Exterior
                            Design</p>
                    </div>

                    <table class="w-full text-xs sm:text-sm text-left mb-6 border" style="border-color: var(--line);">
                        <thead class="text-[11px] uppercase tracking-wider"
                            style="background-color: var(--paper); color: var(--text-heading);">
                            <tr>
                                <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">No</th>
                                <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">Nama Pekerjaan /
                                    Material</th>
                                <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Vol</th>
                                <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Sat</th>
                                <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Harga Satuan
                                </th>
                                <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Total</th>
                            </tr>
                        </thead>
                        <tbody id="rab-table-body" class="divide-y text-xs" style="divide-color: var(--line);">
                            <!-- Items will be injected here -->
                        </tbody>
                        <tfoot>
                            <tr class="font-bold border-t"
                                style="background-color: var(--paper); border-color: var(--line);">
                                <td colspan="5" class="px-5 py-4 text-right uppercase tracking-wider text-xs"
                                    style="color: var(--text-heading);">Grand Total Estimasi</td>
                                <td class="px-5 py-4 text-right font-display text-xl sm:text-2xl font-bold"
                                    style="color: var(--accent); font-family: var(--serif);" id="rab-grand-total">Rp 0</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="p-5 rounded-xl mb-4 border"
                        style="background-color: var(--paper); border-color: var(--line);">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-info-circle mt-0.5 flex-shrink-0" style="color: var(--accent);"></i>
                            <div>
                                <h4 class="text-xs font-bold uppercase tracking-wider mb-1"
                                    style="color: var(--text-heading);">Analisis AI:</h4>
                                <p class="text-xs leading-relaxed" style="color: var(--text-lead);" id="rab-catatan">-</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-[11px] text-center mt-6 leading-relaxed print:mt-12" style="color: var(--muted);">
                        *Dokumen ini merupakan estimasi awal yang disimulasikan oleh Artificial Intelligence berdasarkan
                        cerita Anda.<br>
                        Untuk penawaran resmi, spesifikasi teknis akurat, dan kepastian biaya, jadwalkan konsultasi serta
                        survei lokasi bersama tim Pratama Design Studio.
                    </div>

                    <div class="mt-8 text-center print:hidden flex flex-wrap justify-center gap-4">
                        <a href="{{ route('consultation.create') }}"
                            class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all hover:opacity-95 shadow-md"
                            style="background-color: var(--accent);">
                            <i class="fas fa-calendar-check"></i> Jadwalkan Survei &amp; Konsultasi Desain
                        </a>
                        <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all border"
                            style="color: var(--text-heading); border-color: var(--line); background-color: var(--paper);">
                            <i class="fab fa-whatsapp text-emerald-600 text-sm"></i> Chat dengan Tim Desainer
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

        // Helper parameters auto-update prompt if user types/selects
        function syncParamsToPrompt() {
            const room = document.getElementById('param-room').value;
            const area = document.getElementById('param-area').value;
            const style = document.getElementById('param-style').value;
            const promptEl = document.getElementById('prompt');

            if (room || area || style) {
                let composed = `Rencana renovasi ${room || 'ruangan'}`;
                if (area) composed += ` dengan luasan ${area} m²`;
                if (style) composed += `, mengusung gaya desain ${style}.`;
                composed += ' Kebutuhan item pekerjaan dan perabot custom: ';

                if (!promptEl.value || promptEl.value.startsWith('Rencana renovasi')) {
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
                alert('Silakan ceritakan rencana ruangan Anda terlebih dahulu.');
                return;
            }

            // Automatically synthesize structured fields with prompt
            let finalPrompt = promptText;
            if (room || area || style || budget) {
                let specs = [];
                if (room) specs.push('Ruangan: ' + room);
                if (area) specs.push('Luas: ' + area + ' m²');
                if (style) specs.push('Gaya: ' + style);
                if (budget) specs.push('Budget: ' + budget);
                const prefix = `[Spesifikasi Klien: ${specs.join(', ')}]\n`;
                if (!finalPrompt.includes('[Spesifikasi Klien:')) {
                    finalPrompt = prefix + finalPrompt;
                }
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
                    throw new Error(data.error || 'Terjadi kesalahan sistem.');
                }

                // Populate Table
                const tbody = document.getElementById('rab-table-body');
                tbody.innerHTML = '';

                if (data.data && data.data.items) {
                    let i = 1;
                    data.data.items.forEach(item => {
                        tbody.innerHTML += `
                            <tr class="transition-colors hover:bg-black/5">
                                <td class="px-5 py-3.5 border-b" style="border-color: var(--line); color: var(--muted);">${i++}</td>
                                <td class="px-5 py-3.5 border-b font-medium" style="border-color: var(--line); color: var(--text-heading);">${item.nama_pekerjaan}</td>
                                <td class="px-5 py-3.5 border-b text-center" style="border-color: var(--line); color: var(--text-lead);">${item.volume}</td>
                                <td class="px-5 py-3.5 border-b text-center" style="border-color: var(--line); color: var(--muted);">${item.satuan}</td>
                                <td class="px-5 py-3.5 border-b text-right" style="border-color: var(--line); color: var(--text-lead);">${formatRp(item.harga_satuan)}</td>
                                <td class="px-5 py-3.5 border-b text-right font-semibold" style="border-color: var(--line); color: var(--text-heading);">${formatRp(item.total)}</td>
                            </tr>
                        `;
                    });

                    document.getElementById('rab-grand-total').textContent = formatRp(data.data.grand_total);
                    document.getElementById('rab-catatan').textContent = data.data.catatan || 'Tidak ada catatan tambahan dari AI.';

                    // Show Result
                    resultSection.classList.remove('hidden');

                    // Scroll to result
                    resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } else {
                    throw new Error('Format data tidak valid dari AI.');
                }

            } catch (error) {
                alert(error.message);
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-magic text-amber-300"></i> Buat Estimasi Rincian RAB dengan AI';
                btn.classList.remove('opacity-70');
                loading.classList.add('hidden');
            }
        });
    </script>
@endsection