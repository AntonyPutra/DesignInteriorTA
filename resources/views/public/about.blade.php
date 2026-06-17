@extends('layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Tentang Pratama Design Studio — PT Pratama Berkah Utama. Perusahaan desain interior & exterior design & build berdiri 2021 di Jakarta. Visi, misi, core values, dan keunggulan kami.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-20 lg:py-28 overflow-hidden" style="background-color: #2A2219;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm mb-4" style="color: rgba(255,255,255,0.45);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <span style="color: #B85C4A;">About</span>
        </div>
        <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Our Story</p>
        <h1 class="font-display text-4xl lg:text-6xl font-semibold text-white leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            About Us
        </h1>
        <p class="mt-4 text-base max-w-xl leading-relaxed" style="color: rgba(255,255,255,0.6);">
            Kami adalah perusahaan desain interior & exterior yang berpusat di Jakarta, berkomitmen menghadirkan ruang yang estetis dan fungsional bagi setiap klien.
        </p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- COMPANY PROFILE                                               --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- Text --}}
            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Profil Perusahaan</p>
                <h2 class="font-display text-4xl font-semibold mb-4 leading-tight"
                    style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                    PT Pratama Berkah Utama
                </h2>
                <div class="w-10 h-0.5 mb-6" style="background-color: #B85C4A;"></div>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        <strong class="font-semibold" style="color: #3E372C;">Pratama Design Studio</strong> adalah brand dari PT Pratama Berkah Utama, perusahaan yang bergerak di bidang <em>interior &amp; exterior design &amp; build</em>. Berdiri sejak tahun 2021 dan berkantor di Jakarta, Indonesia.
                    </p>
                    <p>
                        Kami menyediakan layanan lengkap mulai dari konsultasi fit-out, perencanaan proyek, manajemen anggaran, visualisasi 3D digital, proses produksi custom interior, hingga pelaksanaan fit-out dan renovasi secara end-to-end.
                    </p>
                    <p>
                        Dengan pengalaman menangani berbagai jenis proyek — landed house, apartment, F&amp;B, booth, dan office — kami hadir sebagai mitra terpercaya untuk mewujudkan ruang impian Anda dengan standar kualitas tinggi.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                    @foreach([
                        ['fas fa-calendar-check', 'Berdiri',   '2021'],
                        ['fas fa-map-marker-alt', 'Lokasi',    'Jakarta, Indonesia'],
                        ['fas fa-project-diagram','Portfolio', '20+ Proyek'],
                        ['fas fa-globe-asia',     'Jangkauan', 'Multi-Kota'],
                    ] as [$icon, $label, $value])
                    <div class="flex items-center gap-3 p-3 rounded-lg" style="background-color: #F8F5EF;">
                        <div class="w-8 h-8 rounded flex items-center justify-center flex-shrink-0"
                             style="background-color: white; border: 1px solid #E2DDD6;">
                            <i class="{{ $icon }} text-xs" style="color: #B85C4A;"></i>
                        </div>
                        <div>
                            <div class="text-[0.65rem] uppercase tracking-wider font-medium" style="color: #8A6F55;">{{ $label }}</div>
                            <div class="text-sm font-semibold" style="color: #3E372C;">{{ $value }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Visual --}}
            <div class="fade-up">
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden"
                         style="background: linear-gradient(135deg, #F8F5EF 0%, #EDE8DF 100%); border: 1px solid #E2DDD6;">
                        <div class="w-full h-full flex items-center justify-center p-12">
                            <div class="text-center">
                                <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5"
                                     style="background-color: #3E372C;">
                                    <span class="font-display text-4xl font-bold text-white" style="font-family: 'Cormorant Garamond', serif;">P</span>
                                </div>
                                <div class="font-display text-2xl font-semibold mb-1" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                                    Pratama Design Studio
                                </div>
                                <div class="text-xs tracking-[0.2em] uppercase font-medium" style="color: #8A6F55;">
                                    Interior · Exterior · Design & Build
                                </div>
                                <div class="mt-6 pt-6 grid grid-cols-3 gap-4 text-center" style="border-top: 1px solid #E2DDD6;">
                                    @foreach([['20+','Proyek'], ['4+','Tahun'], ['3+','Kota']] as [$n, $l])
                                    <div>
                                        <div class="font-display text-2xl font-semibold" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">{{ $n }}</div>
                                        <div class="text-[0.65rem] uppercase tracking-wider" style="color: #8A6F55;">{{ $l }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-2xl -z-10"
                         style="background-color: #B85C4A; opacity: 0.15;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- VISION & MISSION                                              --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Arah Perusahaan</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Visi &amp; Misi
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: #B85C4A;"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Vision --}}
            <div class="fade-up bg-white rounded-2xl p-8" style="border: 1px solid #E2DDD6;">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background-color: #FEF6F4;">
                    <i class="fas fa-eye text-lg" style="color: #B85C4A;"></i>
                </div>
                <h3 class="font-display text-2xl font-semibold mb-3" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">Visi</h3>
                <div class="w-8 h-0.5 mb-4" style="background-color: #B85C4A;"></div>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi perusahaan desain interior terpercaya yang tidak hanya mengutamakan estetika, tetapi juga fungsionalitas ruang bagi pemiliknya — menghadirkan karya yang bertahan lama, bermakna, dan mencerminkan kepribadian penghuninya.
                </p>
            </div>

            {{-- Mission --}}
            <div class="fade-up bg-white rounded-2xl p-8" style="border: 1px solid #E2DDD6;">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background-color: #FEF6F4;">
                    <i class="fas fa-bullseye text-lg" style="color: #B85C4A;"></i>
                </div>
                <h3 class="font-display text-2xl font-semibold mb-3" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">Misi</h3>
                <div class="w-8 h-0.5 mb-4" style="background-color: #B85C4A;"></div>
                <p class="text-gray-600 leading-relaxed">
                    Memahami kebutuhan klien secara mendalam dan menerjemahkannya menjadi desain yang menarik, praktis, fungsional, dan sesuai dengan anggaran yang tersedia — dengan komunikasi yang transparan sepanjang proses.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CORE VALUES                                                   --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Nilai Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Core Values
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: #B85C4A;"></div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['fas fa-user-tie',        'Professionalism',      'Kami bekerja dengan standar profesional tinggi dalam setiap aspek pekerjaan dan komunikasi.'],
                ['fas fa-handshake',       'Integrity',            'Kami menjunjung kejujuran dan transparansi dalam setiap proses, dari anggaran hingga timeline.'],
                ['fas fa-lightbulb',       'Innovation',           'Kami terus berkembang mengikuti tren desain dan teknologi untuk memberikan solusi terbaik.'],
                ['fas fa-search-plus',     'Attention to Detail',  'Setiap detail pekerjaan diperhatikan dengan seksama untuk memastikan kualitas hasil akhir.'],
            ] as [$icon, $title, $desc])
            <div class="fade-up text-center p-7 rounded-2xl transition-all duration-300 hover:-translate-y-1"
                 style="background-color: #F8F5EF; border: 1px solid #E2DDD6;"
                 onmouseover="this.style.boxShadow='0 12px 30px rgba(62,55,44,0.1)'; this.style.borderColor='#B85C4A40';"
                 onmouseout="this.style.boxShadow='none'; this.style.borderColor='#E2DDD6';">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4"
                     style="background-color: white; border: 1px solid #E2DDD6;">
                    <i class="{{ $icon }} text-xl" style="color: #B85C4A;"></i>
                </div>
                <h3 class="font-semibold text-base mb-2" style="color: #3E372C;">{{ $title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- KEUNGGULAN                                                    --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #2A2219;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Mengapa Kami</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold text-white leading-tight mb-4"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Keunggulan Pratama Design Studio
                </h2>
                <div class="w-10 h-0.5 mb-6" style="background-color: #B85C4A;"></div>
                <p class="leading-relaxed mb-8" style="color: rgba(255,255,255,0.6);">
                    Kami hadir sebagai mitra terpercaya yang memberikan layanan desain interior komprehensif dengan standar kualitas tinggi dan nilai yang transparan.
                </p>
                <a href="{{ route('consultation.create') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90"
                   style="background-color: #B85C4A;">
                    Mulai Konsultasi
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>

            <div class="space-y-4 fade-up">
                @foreach([
                    ['fas fa-infinity',         'One-Stop Solution',                     'Dari konsultasi hingga fit-out selesai, semua ditangani oleh satu tim.'],
                    ['fas fa-gift',             'Free Pre-Layout & Konsultasi',           'Klien mendapat konsep denah awal dan konsultasi fit-out gratis sebelum agreement.'],
                    ['fas fa-coins',            'Fleksibel dalam Budget',                 'Kami menyesuaikan desain dan material dengan anggaran yang dimiliki klien.'],
                    ['fas fa-industry',         'Workshop & Fasilitas Produksi Sendiri',  'Produksi furniture dan elemen interior custom dilakukan di workshop kami sendiri.'],
                    ['fas fa-award',            'Pengalaman Multi-Segmen',                'Berpengalaman menangani residential, F&B, retail, dan office project.'],
                    ['fas fa-map-marked-alt',   'Mampu Multi-Kota',                       'Kami dapat menangani proyek di berbagai kota di Indonesia.'],
                ] as [$icon, $title, $desc])
                <div class="flex items-start gap-4 p-5 rounded-xl transition-all duration-200 hover:bg-white/5"
                     style="border: 1px solid rgba(255,255,255,0.08);">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                         style="background-color: rgba(184,92,74,0.2);">
                        <i class="{{ $icon }} text-sm" style="color: #B85C4A;"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-0.5">{{ $title }}</h4>
                        <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.5);">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- MEET OUR PRINCIPAL                                            --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Tim Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Meet Our Principal
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: #B85C4A;"></div>
        </div>

        <div class="max-w-2xl mx-auto fade-up">
            <div class="bg-white rounded-2xl overflow-hidden" style="border: 1px solid #E2DDD6; box-shadow: 0 4px 20px rgba(62,55,44,0.08);">
                <div class="flex flex-col sm:flex-row">
                    {{-- Avatar --}}
                    <div class="sm:w-40 flex-shrink-0">
                        <div class="h-full min-h-[160px] flex items-center justify-center"
                             style="background: linear-gradient(135deg, #3E372C, #5A4A38);">
                            <div class="text-center p-6">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2"
                                     style="background-color: rgba(184,92,74,0.3);">
                                    <span class="font-display text-2xl font-bold text-white"
                                          style="font-family: 'Cormorant Garamond', serif;">K</span>
                                </div>
                                <span class="text-[0.6rem] tracking-wider uppercase font-medium" style="color: rgba(255,255,255,0.5);">Principal</span>
                            </div>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 p-7">
                        <div class="text-xs font-semibold tracking-wider uppercase mb-2" style="color: #B85C4A;">Founder & CEO</div>
                        <h3 class="font-display text-2xl font-semibold mb-1"
                            style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                            Kaleb Wahyu Pratama
                        </h3>
                        <div class="w-8 h-0.5 mb-3" style="background-color: #B85C4A;"></div>
                        <p class="text-sm leading-relaxed text-gray-600 mb-4">
                            Sebagai Founder dan CEO Pratama Design Studio, Kaleb memimpin setiap proyek dengan visi desain yang kuat dan komitmen terhadap kualitas. Beliau berpengalaman dalam menangani proyek interior &amp; exterior residential, F&amp;B, dan commercial di berbagai kota Indonesia.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['Interior Design', 'Project Management', 'Design & Build'] as $skill)
                            <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full"
                                  style="background-color: #FEF6F4; color: #B85C4A; border: 1px solid #FDDDD8;">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16" style="background-color: #3E372C;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <h2 class="font-display text-3xl font-semibold text-white mb-4"
            style="font-family: 'Cormorant Garamond', serif;">
            Tertarik Bekerja Sama?
        </h2>
        <p class="mb-6 text-sm" style="color: rgba(255,255,255,0.6);">Konsultasikan kebutuhan desain Anda bersama kami. Gratis dan tanpa kewajiban.</p>
        <a href="{{ route('consultation.create') }}"
           class="inline-flex items-center gap-2 px-8 py-3.5 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90"
           style="background-color: #B85C4A;">
            <i class="fas fa-comment-dots"></i>
            Konsultasi Sekarang
        </a>
    </div>
</section>

@endsection
