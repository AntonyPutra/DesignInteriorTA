@extends('layouts.app')

@section('title', 'AI Smart Cost Estimator')
@section('meta_description', 'Kalkulasi estimasi anggaran desain interior otomatis menggunakan AI cerdas Pratama Design Studio.')

@section('content')

{{-- Subpage Hero with Database Image & Gradient Blend --}}
<x-subpage-hero
    title="AI Smart Cost Estimator"
    eyebrow="Kalkulator Cerdas Berbasis AI"
    description="Ceritakan bayangan dan kebutuhan ruangan Anda secara bebas. AI kami akan membedah item pekerjaan, menghitung estimasi volume, dan menyusun draf RAB otomatis."
    :breadcrumbs="['Cost Estimator' => route('estimator.index'), 'AI Smart Estimator' => '']"
    image-keyword="bedroom"
>
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
{{-- AI ESTIMATOR TOOL SECTION                                    --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-24" style="background-color: var(--paper); min-height: 600px;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Input Prompt Card --}}
        <div class="rounded-2xl overflow-hidden shadow-sm transition-all duration-300 border" style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
            <div class="px-7 py-5 flex items-center justify-between" style="background-color: var(--brown-deep);">
                <h2 class="text-white font-semibold text-base flex items-center gap-2.5">
                    <i class="fas fa-robot text-sm" style="color: var(--accent);"></i>
                    Ceritakan Rencana &amp; Kebutuhan Ruang Anda
                </h2>
                <span class="text-xs text-white/60 hidden sm:inline">Didukung AI Studio</span>
            </div>
            
            <div class="p-7">
                <form id="ai-estimator-form">
                    @csrf
                    <div class="mb-5">
                        <label for="prompt" class="block text-xs font-bold uppercase tracking-wider mb-2.5" style="color: var(--text-heading);">
                            Deskripsi Ruangan, Ukuran, &amp; Gaya Interior <span style="color: var(--accent);">*</span>
                        </label>
                        <textarea id="prompt" name="prompt" rows="5"
                                  class="w-full rounded-xl text-sm transition-all p-4 focus:outline-none focus:ring-2 leading-relaxed border"
                                  style="background-color: var(--paper); border-color: var(--line); color: var(--text-heading);"
                                  placeholder="Contoh: Saya memiliki master bedroom ukuran 4x5 meter di apartemen. Saya menyukai gaya Japandi Modern dengan sentuhan warm wood. Saya membutuhkan wardrobe custom full plafon dengan pintu cermin, bed frame 180x200 dengan headboard fabric, meja rias gantung, nakas kanan-kiri, dan panel kisi-kisi kayu di dinding utama..."></textarea>
                        <p class="text-[11px] mt-2" style="color: var(--muted);">
                            Tips: Semakin detail Anda menyebutkan luasan ruangan, perabot yang diinginkan, dan preferensi finishing, estimasi AI akan semakin presisi.
                        </p>
                    </div>
                    <button type="submit" id="btn-generate"
                            class="w-full py-4 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all hover:opacity-95 flex justify-center items-center gap-2 shadow-md"
                            style="background-color: var(--accent);">
                        <i class="fas fa-magic text-amber-300"></i> Buat Estimasi Rincian RAB dengan AI
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Loading State -->
        <div id="loading-state" class="hidden text-center mt-12 mb-12 animate-pulse">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 border" style="background-color: var(--card-bg); border-color: var(--line);">
                <i class="fas fa-spinner fa-spin text-2xl" style="color: var(--accent);"></i>
            </div>
            <h3 class="text-base font-bold mb-1" style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">AI sedang menganalisis spesifikasi ruangan...</h3>
            <p class="text-xs" style="color: var(--muted);">Menyusun item pekerjaan konstruksi, menghitung volume, dan mencocokkan standar harga material interior.</p>
        </div>

        <!-- Result Section -->
        <div id="result-section" class="hidden mt-12 rounded-2xl overflow-hidden shadow-lg border" style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
            <div class="px-7 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3" style="background-color: var(--accent);">
                <h2 class="text-white font-semibold text-base flex items-center gap-2">
                    <i class="fas fa-file-invoice-dollar text-sm"></i>
                    Draf Estimasi Rencana Anggaran Biaya (RAB)
                </h2>
                <button onclick="window.print()" class="text-white hover:text-white/80 text-xs font-semibold flex items-center gap-2 bg-white/20 px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-print"></i> Cetak / Simpan PDF
                </button>
            </div>
            
            <div class="p-7 overflow-x-auto print:p-0">
                <div class="mb-6 hidden print:block text-center">
                    <h1 class="text-2xl font-bold" style="color: var(--text-heading);">Rencana Anggaran Biaya (Estimasi AI)</h1>
                    <p class="text-xs" style="color: var(--muted);">Pratama Design Studio — Interior &amp; Exterior Design</p>
                </div>
                
                <table class="w-full text-xs sm:text-sm text-left mb-6 border" style="border-color: var(--line);">
                    <thead class="text-[11px] uppercase tracking-wider" style="background-color: var(--paper); color: var(--text-heading);">
                        <tr>
                            <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">No</th>
                            <th class="px-5 py-3.5 border-b" style="border-color: var(--line);">Nama Pekerjaan / Material</th>
                            <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Vol</th>
                            <th class="px-5 py-3.5 border-b text-center" style="border-color: var(--line);">Sat</th>
                            <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Harga Satuan</th>
                            <th class="px-5 py-3.5 border-b text-right" style="border-color: var(--line);">Total</th>
                        </tr>
                    </thead>
                    <tbody id="rab-table-body" class="divide-y text-xs" style="divide-color: var(--line);">
                        <!-- Items will be injected here -->
                    </tbody>
                    <tfoot>
                        <tr class="font-bold border-t" style="background-color: var(--paper); border-color: var(--line);">
                            <td colspan="5" class="px-5 py-4 text-right uppercase tracking-wider text-xs" style="color: var(--text-heading);">Grand Total Estimasi</td>
                            <td class="px-5 py-4 text-right font-display text-xl sm:text-2xl font-bold" style="color: var(--accent); font-family: var(--serif);" id="rab-grand-total">Rp 0</td>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="p-5 rounded-xl mb-4 border" style="background-color: var(--paper); border-color: var(--line);">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle mt-0.5 flex-shrink-0" style="color: var(--accent);"></i>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider mb-1" style="color: var(--text-heading);">Analisis AI:</h4>
                            <p class="text-xs leading-relaxed" style="color: var(--text-lead);" id="rab-catatan">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-[11px] text-center mt-6 leading-relaxed print:mt-12" style="color: var(--muted);">
                    *Dokumen ini merupakan estimasi awal yang disimulasikan oleh Artificial Intelligence berdasarkan cerita Anda.<br>
                    Untuk penawaran resmi, spesifikasi teknis akurat, dan kepastian biaya, jadwalkan konsultasi serta survei lokasi bersama tim Pratama Design Studio.
                </div>
                
                <div class="mt-8 text-center print:hidden flex flex-wrap justify-center gap-4">
                    <a href="{{ route('consultation.create') }}" class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white transition-all hover:opacity-95 shadow-md" style="background-color: var(--accent);">
                        <i class="fas fa-calendar-check"></i> Jadwalkan Survei &amp; Konsultasi Desain
                    </a>
                    <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider transition-all border" style="color: var(--text-heading); border-color: var(--line); background-color: var(--paper);">
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
        body * { visibility: hidden; }
        #result-section, #result-section * { visibility: visible; }
        #result-section { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; border: none; }
        .print\:hidden { display: none !important; }
        .print\:block { display: block !important; }
        .print\:p-0 { padding: 0 !important; }
    }
</style>

@endsection

@section('scripts')
<script>
    function formatRp(angka) {
        return 'Rp ' + parseInt(angka).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    document.getElementById('ai-estimator-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const prompt = document.getElementById('prompt').value;
        const btn = document.getElementById('btn-generate');
        const loading = document.getElementById('loading-state');
        const resultSection = document.getElementById('result-section');
        
        if (!prompt.trim()) {
            alert('Silakan ceritakan rencana ruangan Anda terlebih dahulu.');
            return;
        }

        // UI Changes
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Sedang Menganalisis...';
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
                body: JSON.stringify({ prompt: prompt })
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
