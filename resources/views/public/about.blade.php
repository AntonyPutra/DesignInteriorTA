@extends('layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Tentang Pratama Design Studio — PT Pratama Berkah Utama. Perusahaan desain interior & exterior design & build berdiri 2021 di Jakarta. Visi, misi, core values, dan keunggulan kami.')

@section('content')

<x-subpage-hero
    title="About Us"
    eyebrow="Our Story"
    description="Kami adalah perusahaan desain interior & exterior yang berpusat di Jakarta, berkomitmen menghadirkan ruang yang estetis dan fungsional bagi setiap klien."
    :breadcrumbs="['About' => '']"
    image-keyword="office"
/>

{{-- ============================================================ --}}
{{-- COMPANY PROFILE                                               --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- Text --}}
            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Profil Perusahaan</p>
                <h2 class="font-display text-4xl font-semibold mb-4 leading-tight"
                    style="font-family: var(--serif); color: var(--text-heading);">
                    PT Pratama Berkah Utama
                </h2>
                <div class="w-10 h-0.5 mb-6" style="background-color: var(--accent);"></div>
                <div class="space-y-4 leading-relaxed" style="color: var(--text-lead);">
                    <p>
                        <strong class="font-semibold" style="color: var(--text-heading);">Pratama Design Studio</strong> adalah brand dari PT Pratama Berkah Utama, perusahaan yang bergerak di bidang <em>interior &amp; exterior design &amp; build</em>. Berdiri sejak tahun 2021 dan berkantor di Jakarta, Indonesia.
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
                    <div class="flex items-center gap-3 p-3.5 rounded-xl border" style="background-color: var(--card-bg); border-color: var(--card-border);">
                        <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                             style="background-color: var(--paper); border: 1px solid var(--line);">
                            <i class="{{ $icon }} text-xs" style="color: var(--accent);"></i>
                        </div>
                        <div>
                            <div class="text-[0.65rem] uppercase tracking-wider font-medium" style="color: var(--muted);">{{ $label }}</div>
                            <div class="text-sm font-semibold" style="color: var(--text-heading);">{{ $value }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Visual --}}
            <div class="fade-up">
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden border"
                         style="background: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                        <div class="w-full h-full flex items-center justify-center p-12">
                            <div class="text-center">
                                <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-md"
                                     style="background-color: var(--brown-deep);">
                                    <span class="font-display text-4xl font-bold text-white" style="font-family: var(--serif);">P</span>
                                </div>
                                <div class="font-display text-2xl font-semibold mb-1" style="font-family: var(--serif); color: var(--text-heading);">
                                    Pratama Design Studio
                                </div>
                                <div class="text-xs tracking-[0.2em] uppercase font-medium" style="color: var(--muted);">
                                    Interior · Exterior · Design & Build
                                </div>
                                <div class="mt-6 pt-6 grid grid-cols-3 gap-4 text-center" style="border-top: 1px solid var(--card-border);">
                                    @foreach([['20+','Proyek'], ['4+','Tahun'], ['3+','Kota']] as [$n, $l])
                                    <div>
                                        <div class="font-display text-2xl font-semibold" style="font-family: var(--serif); color: var(--text-heading);">{{ $n }}</div>
                                        <div class="text-[0.65rem] uppercase tracking-wider" style="color: var(--muted);">{{ $l }}</div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-2xl -z-10"
                         style="background-color: var(--accent); opacity: 0.15;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- VISION & MISSION                                              --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: var(--card-bg); border-top: 1px solid var(--card-border); border-bottom: 1px solid var(--card-border);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Arah Perusahaan</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: var(--serif); color: var(--text-heading);">
                Visi &amp; Misi
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: var(--accent);"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Vision --}}
            <div class="fade-up rounded-2xl p-8 border" style="background-color: var(--paper); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background-color: var(--card-bg); border: 1px solid var(--line);">
                    <i class="fas fa-eye text-lg" style="color: var(--accent);"></i>
                </div>
                <h3 class="font-display text-2xl font-semibold mb-3" style="font-family: var(--serif); color: var(--text-heading);">Visi</h3>
                <div class="w-8 h-0.5 mb-4" style="background-color: var(--accent);"></div>
                <p class="leading-relaxed" style="color: var(--text-lead);">
                    Menjadi perusahaan desain interior terpercaya yang tidak hanya mengutamakan estetika, tetapi juga fungsionalitas ruang bagi pemiliknya — menghadirkan karya yang bertahan lama, bermakna, dan mencerminkan kepribadian penghuninya.
                </p>
            </div>

            {{-- Mission --}}
            <div class="fade-up rounded-2xl p-8 border" style="background-color: var(--paper); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-5"
                     style="background-color: var(--card-bg); border: 1px solid var(--line);">
                    <i class="fas fa-bullseye text-lg" style="color: var(--accent);"></i>
                </div>
                <h3 class="font-display text-2xl font-semibold mb-3" style="font-family: var(--serif); color: var(--text-heading);">Misi</h3>
                <div class="w-8 h-0.5 mb-4" style="background-color: var(--accent);"></div>
                <p class="leading-relaxed" style="color: var(--text-lead);">
                    Memahami kebutuhan klien secara mendalam dan menerjemahkannya menjadi desain yang menarik, praktis, fungsional, dan sesuai dengan anggaran yang tersedia — dengan komunikasi yang transparan sepanjang proses.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CORE VALUES                                                   --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Nilai Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: var(--serif); color: var(--text-heading);">
                Core Values
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: var(--accent);"></div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['fas fa-user-tie',        'Professionalism',      'Kami bekerja dengan standar profesional tinggi dalam setiap aspek pekerjaan dan komunikasi.'],
                ['fas fa-handshake',       'Integrity',            'Kami menjunjung kejujuran dan transparansi dalam setiap proses, dari anggaran hingga timeline.'],
                ['fas fa-lightbulb',       'Innovation',           'Kami terus berkembang mengikuti tren desain dan teknologi untuk memberikan solusi terbaik.'],
                ['fas fa-search-plus',     'Attention to Detail',  'Setiap detail pekerjaan diperhatikan dengan seksama untuk memastikan kualitas hasil akhir.'],
            ] as [$icon, $title, $desc])
            <div class="fade-up text-center p-7 rounded-2xl transition-all duration-300 hover:-translate-y-1 border"
                 style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4"
                     style="background-color: var(--paper); border: 1px solid var(--line);">
                    <i class="{{ $icon }} text-xl" style="color: var(--accent);"></i>
                </div>
                <h3 class="font-semibold text-base mb-2" style="font-family: var(--serif); font-size: 1.15rem; color: var(--text-heading);">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: var(--text-lead);">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- KEUNGGULAN                                                    --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: var(--brown-deep); color: #fbfaf7;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Mengapa Kami</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold text-white leading-tight mb-4"
                    style="font-family: var(--serif);">
                    Keunggulan Pratama Design Studio
                </h2>
                <div class="w-10 h-0.5 mb-6" style="background-color: var(--accent);"></div>
                <p class="leading-relaxed mb-8" style="color: rgba(255,255,255,0.7);">
                    Kami hadir sebagai mitra terpercaya yang memberikan layanan desain interior komprehensif dengan standar kualitas tinggi dan nilai yang transparan.
                </p>
                <a href="{{ route('consultation.create') }}"
                   class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-6 py-3 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 shadow-md"
                   style="background-color: var(--accent);">
                    <i class="fas fa-comment-dots text-xs"></i>
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
                     style="border: 1px solid rgba(255,255,255,0.1); background-color: rgba(255,255,255,0.02);">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                         style="background-color: rgba(181,91,72,0.25);">
                        <i class="{{ $icon }} text-sm" style="color: #f7a696;"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-white mb-0.5">{{ $title }}</h4>
                        <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.65);">{{ $desc }}</p>
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
<section class="py-20 lg:py-24" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Tim Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: var(--serif); color: var(--text-heading);">
                Meet Our Principal
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: var(--accent);"></div>
        </div>

        <div class="max-w-2xl mx-auto fade-up">
            <div class="rounded-2xl overflow-hidden border" style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="flex flex-col sm:flex-row">
                    {{-- Avatar --}}
                    <div class="sm:w-44 flex-shrink-0">
                        <div class="h-full min-h-[160px] flex items-center justify-center"
                             style="background: var(--brown-deep);">
                            <div class="text-center p-6">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-2"
                                     style="background-color: rgba(181,91,72,0.35);">
                                    <span class="font-display text-2xl font-bold text-white"
                                          style="font-family: var(--serif);">K</span>
                                </div>
                                <span class="text-[0.6rem] tracking-wider uppercase font-medium" style="color: rgba(255,255,255,0.6);">Principal</span>
                            </div>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 p-7">
                        <div class="text-xs font-semibold tracking-wider uppercase mb-2" style="color: var(--accent);">Founder & CEO</div>
                        <h3 class="font-display text-2xl font-semibold mb-1"
                            style="font-family: var(--serif); color: var(--text-heading);">
                            Kaleb Wahyu Pratama
                        </h3>
                        <div class="w-8 h-0.5 mb-3" style="background-color: var(--accent);"></div>
                        <p class="text-sm leading-relaxed mb-4" style="color: var(--text-lead);">
                            Sebagai Founder dan CEO Pratama Design Studio, Kaleb memimpin setiap proyek dengan visi desain yang kuat dan komitmen terhadap kualitas. Beliau berpengalaman dalam menangani proyek interior &amp; exterior residential, F&amp;B, dan commercial di berbagai kota Indonesia.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['Interior Design', 'Project Management', 'Design & Build'] as $skill)
                            <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full"
                                  style="background-color: var(--paper); color: var(--accent); border: 1px solid var(--line);">
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
<section class="py-16" style="background-color: var(--brown-deep); border-top: 1px solid var(--card-border);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <h2 class="font-display text-3xl font-semibold text-white mb-4"
            style="font-family: var(--serif);">
            Tertarik Bekerja Sama?
        </h2>
        <p class="mb-6 text-sm" style="color: rgba(255,255,255,0.7);">Konsultasikan kebutuhan desain Anda bersama kami. Gratis dan tanpa kewajiban.</p>
        <a href="{{ route('consultation.create') }}"
           class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-8 py-3.5 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 shadow-md"
           style="background-color: var(--accent);">
            <i class="fas fa-comment-dots"></i>
            Konsultasi Sekarang
        </a>
    </div>
</section>

@endsection
