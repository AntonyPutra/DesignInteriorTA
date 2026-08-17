@extends('layouts.app')

@section('title', 'AI Smart Cost Estimator')
@section('meta_description', 'Kalkulasi anggaran desain interior Anda menggunakan AI canggih.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-16 lg:py-24" style="background-color: #2A2219;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex items-center justify-center gap-2 mb-4" style="color: rgba(255,255,255,0.4);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors text-sm">Home</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <span class="text-sm" style="color: #B85C4A;">AI Estimator</span>
        </div>
        <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Kalkulator Cerdas</p>
        <h1 class="font-display text-4xl lg:text-5xl font-semibold text-white"
            style="font-family: 'Cormorant Garamond', serif;">
            AI Smart Cost Estimator
        </h1>
        <p class="mt-4 text-sm max-w-lg mx-auto leading-relaxed" style="color: rgba(255,255,255,0.6);">
            Ceritakan bayangan ruangan Anda. AI kami akan menyusun rincian Rencana Anggaran Biaya (RAB) sementara secara otomatis berdasarkan cerita Anda.
        </p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- AI ESTIMATOR TOOL                                            --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: #F8F5EF; min-height: 600px;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm transition-all duration-300" style="border: 1px solid #E2DDD6;">
            <div class="px-7 py-5" style="background-color: #3E372C;">
                <h2 class="text-white font-semibold text-base flex items-center gap-2">
                    <i class="fas fa-robot text-sm" style="color: #B85C4A;"></i>
                    Ceritakan Rencana Anda
                </h2>
            </div>
            
            <div class="p-7">
                <form id="ai-estimator-form">
                    @csrf
                    <div class="mb-5">
                        <label for="prompt" class="block text-sm font-medium text-gray-700 mb-3 leading-relaxed">
                            Jelaskan ruangan yang ingin direnovasi, ukuran (misal 4x4m), gaya interior yang diinginkan, dan kebutuhan material secara spesifik. Semakin detail, estimasi semakin akurat.
                        </label>
                        <textarea id="prompt" name="prompt" rows="5" class="w-full form-input rounded-xl border-gray-300 shadow-sm focus:border-[#B85C4A] focus:ring focus:ring-[#B85C4A] focus:ring-opacity-20 p-4 text-sm" placeholder="Contoh: Saya punya kamar ukuran 4x4 meter. Saya ingin didesain dengan gaya Japandi. Saya butuh lemari pakaian custom full plafon, ranjang kayu solid 160x200, nakas, meja kerja lipat, dan lantai vinyl motif kayu..."></textarea>
                    </div>
                    <button type="submit" id="btn-generate" class="w-full py-3.5 rounded-xl text-sm font-bold text-white transition-all hover:opacity-90 flex justify-center items-center gap-2 shadow-md" style="background-color: #B85C4A;">
                        <i class="fas fa-magic"></i> Buat Estimasi dengan AI
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Loading State -->
        <div id="loading-state" class="hidden text-center mt-12 mb-12 animate-pulse">
            <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: #FEF6F4;">
                <i class="fas fa-spinner fa-spin text-2xl" style="color: #B85C4A;"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-1">AI sedang menganalisis...</h3>
            <p class="text-sm text-gray-500">Menyusun item pekerjaan, menghitung volume, dan mencari standar harga pasar.</p>
        </div>

        <!-- Result Section -->
        <div id="result-section" class="hidden mt-12 bg-white rounded-2xl overflow-hidden shadow-xl" style="border: 1px solid #E2DDD6;">
            <div class="px-7 py-5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3" style="background-color: #B85C4A;">
                <h2 class="text-white font-semibold text-base flex items-center gap-2">
                    <i class="fas fa-file-invoice-dollar text-sm"></i>
                    Estimasi Anggaran Biaya (RAB)
                </h2>
                <button onclick="window.print()" class="text-white hover:text-gray-200 text-sm flex items-center gap-2 bg-white/10 px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-print"></i> Cetak / Simpan PDF
                </button>
            </div>
            
            <div class="p-7 overflow-x-auto print:p-0">
                <div class="mb-6 hidden print:block text-center">
                    <h1 class="text-2xl font-bold text-gray-900">Rencana Anggaran Biaya (Estimasi AI)</h1>
                    <p class="text-sm text-gray-500">Pratama Design Studio</p>
                </div>
                
                <table class="w-full text-sm text-left mb-6" style="border: 1px solid #E2DDD6;">
                    <thead class="text-xs uppercase" style="background-color: #F8F5EF; color: #3E372C;">
                        <tr>
                            <th class="px-5 py-4 border-b">No</th>
                            <th class="px-5 py-4 border-b">Nama Pekerjaan/Material</th>
                            <th class="px-5 py-4 border-b text-center">Vol</th>
                            <th class="px-5 py-4 border-b text-center">Sat</th>
                            <th class="px-5 py-4 border-b text-right">Harga Satuan</th>
                            <th class="px-5 py-4 border-b text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody id="rab-table-body" class="divide-y" style="divide-color: #E2DDD6;">
                        <!-- Items will be injected here -->
                    </tbody>
                    <tfoot>
                        <tr class="font-bold bg-gray-50">
                            <td colspan="5" class="px-5 py-5 text-right uppercase tracking-wide text-xs" style="color: #3E372C;">Grand Total Estimasi</td>
                            <td class="px-5 py-5 text-right text-xl" style="color: #B85C4A;" id="rab-grand-total">Rp 0</td>
                        </tr>
                    </tfoot>
                </table>
                
                <div class="p-5 rounded-xl mb-4" style="background-color: #FEF6F4; border: 1px solid #FDDDD8;">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-info-circle mt-0.5 flex-shrink-0" style="color: #B85C4A;"></i>
                        <div>
                            <h4 class="text-sm font-semibold mb-1" style="color: #3E372C;">Catatan AI Estimator:</h4>
                            <p class="text-sm leading-relaxed" style="color: #8A4A3A;" id="rab-catatan">-</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-xs text-center text-gray-400 mt-6 print:mt-12">
                    *Dokumen ini adalah estimasi yang dihasilkan oleh Artificial Intelligence berdasarkan cerita Anda dan standar harga perkiraan.<br>
                    Untuk RAB resmi yang akurat, silakan jadwalkan konsultasi dan survei lokasi dengan tim Pratama Design Studio.
                </div>
                
                <div class="mt-8 text-center print:hidden">
                    <a href="{{ route('consultation.create') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-lg text-sm font-semibold text-white transition-opacity hover:opacity-90 shadow-md" style="background-color: #3E372C;">
                        <i class="fas fa-calendar-check"></i> Jadwalkan Survei Lokasi Sekarang
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
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
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
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-5 py-4 border-b text-gray-500">${i++}</td>
                            <td class="px-5 py-4 border-b font-medium text-gray-900">${item.nama_pekerjaan}</td>
                            <td class="px-5 py-4 border-b text-center text-gray-600">${item.volume}</td>
                            <td class="px-5 py-4 border-b text-center text-gray-500">${item.satuan}</td>
                            <td class="px-5 py-4 border-b text-right text-gray-600">${formatRp(item.harga_satuan)}</td>
                            <td class="px-5 py-4 border-b text-right font-semibold" style="color: #3E372C;">${formatRp(item.total)}</td>
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
            btn.innerHTML = '<i class="fas fa-magic"></i> Buat Estimasi dengan AI';
            btn.classList.remove('opacity-70');
            loading.classList.add('hidden');
        }
    });
</script>
@endsection
