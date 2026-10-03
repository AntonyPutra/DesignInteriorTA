@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Pratama Design Studio — Interior & Exterior Design & Build. Kami membantu Anda mewujudkan ruang impian yang estetis, fungsional, dan berkarakter. Based in Jakarta.')

@section('content')

{{-- ============================================================ --}}
{{-- HERO SECTION                                                  --}}
{{-- ============================================================ --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden"
         style="background-color: #302c24;">

    {{-- Background Real Photo with luxury dark gradient overlay --}}
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/hero-living.jpg') }}'); filter: brightness(0.6);"></div>

    {{-- Luxury Dark & Terracotta Gradient Overlay --}}
    <div class="absolute inset-0"
         style="background: linear-gradient(135deg, rgba(36,33,29,0.95) 0%, rgba(48,44,36,0.88) 50%, rgba(74,68,54,0.72) 100%);"></div>

    {{-- Subtle decorative ambient glows --}}
    <div class="absolute -right-32 -top-32 w-96 h-96 rounded-full opacity-25 pointer-events-none"
         style="background: radial-gradient(circle, #b55b48 0%, transparent 70%);"></div>
    <div class="absolute -left-20 -bottom-20 w-72 h-72 rounded-full opacity-20 pointer-events-none"
         style="background: radial-gradient(circle, #d98d88 0%, transparent 70%);"></div>

    {{-- Hero Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="max-w-3xl fade-up">

            {{-- Label --}}
            <div class="inline-flex items-center gap-2 mb-6">
                <div class="w-8 h-px" style="background-color: #b55b48;"></div>
                <span class="text-xs font-semibold tracking-[0.25em] uppercase" style="color: #d98d88;">
                    Pratama Design Studio
                </span>
            </div>

            {{-- Headline --}}
            <h1 class="font-display text-white mb-6 leading-[1.08] tracking-tight"
                style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: clamp(2.8rem, 6vw, 5.2rem); font-weight: 600;">
                Transforming Ideas<br>
                <span style="color: #e59e98; font-style: italic;">into Living Spaces</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-base md:text-lg leading-relaxed mb-8 max-w-xl font-light"
               style="color: rgba(242, 240, 235, 0.85);">
                Kami membantu Anda menciptakan ruang yang estetis, fungsional, dan sesuai dengan kebutuhan — mulai dari desain konsep hingga proses fit-out selesai.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-4 mb-12">
                <a href="{{ route('consultation.create') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 rounded text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-95 hover:shadow-lg hover:-translate-y-0.5 shadow-md active:translate-y-0"
                   style="background-color: #b55b48;">
                    <i class="fas fa-comment-dots text-xs"></i>
                    Konsultasi Sekarang
                </a>
                <a href="{{ route('portfolio.index') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 rounded text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:bg-white/10"
                   style="border: 1.5px solid rgba(242, 240, 235, 0.45);">
                    <i class="fas fa-images text-xs"></i>
                    Lihat Portofolio
                </a>
            </div>

            {{-- Credentials --}}
            <div class="flex flex-wrap items-center gap-6 pt-5" style="border-top: 1px solid rgba(242, 240, 235, 0.12);">
                <div class="flex items-center gap-2">
                    <div class="flex -space-x-1.5">
                        @foreach(['#b55b48','#4a4436','#302c24'] as $c)
                        <div class="w-6 h-6 rounded-full border-2 border-[#24211d] flex items-center justify-center"
                             style="background-color: {{ $c }};">
                            <i class="fas fa-user text-[0.5rem] text-white"></i>
                        </div>
                        @endforeach
                    </div>
                    <span class="text-xs" style="color: rgba(242, 240, 235, 0.72);">Klien puas &amp; terpercaya</span>
                </div>
                <div class="flex items-center gap-1.5">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star text-xs" style="color: #F59E0B;"></i>
                    @endfor
                    <span class="text-xs ml-1 font-medium" style="color: rgba(242, 240, 235, 0.9);">5.0 Rating</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-60">
        <span class="text-[10px] tracking-[0.2em] uppercase text-white font-medium">Scroll</span>
        <div class="w-px h-10 bg-white/30 relative overflow-hidden">
            <div class="w-full h-1/2 bg-white animate-bounce"></div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- STATS BAR                                                     --}}
{{-- ============================================================ --}}
<section style="background-color: #f2f0eb; border-bottom: 1px solid #e4dfd7;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-9">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @foreach([
                ['20+',  'Proyek Selesai',    'fas fa-check-circle'],
                ['4+',   'Tahun Pengalaman',  'fas fa-calendar'],
                ['3+',   'Kota di Indonesia', 'fas fa-map-marker-alt'],
                ['100%', 'Klien Puas',        'fas fa-heart'],
            ] as [$num, $label, $icon])
            <div class="flex flex-col items-center gap-1.5 fade-up">
                <i class="{{ $icon }} text-sm mb-1" style="color: #b55b48;"></i>
                <div class="font-display text-3xl lg:text-4xl font-semibold leading-none" style="color: #24211d;">{{ $num }}</div>
                <div class="text-xs text-[#777166] font-medium tracking-wide mt-1">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- ABOUT SNIPPET                                                 --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- Left: Visual with real about.jpg photo --}}
            <div class="relative order-2 lg:order-1 fade-up">
                <div class="relative">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl relative border border-[#e4dfd7]">
                        <img src="{{ asset('assets/images/about.jpg') }}"
                             alt="Pratama Design Studio Team"
                             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>

                    {{-- Floating badge --}}
                    <div class="absolute -bottom-5 -right-5 bg-white rounded-xl p-4 shadow-xl border border-[#e4dfd7]">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center shadow-inner" style="background-color: #faf8f5;">
                                <i class="fas fa-award text-base" style="color: #b55b48;"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold" style="color: #24211d;">Est. 2021</div>
                                <div class="text-[11px] text-[#777166]">Jakarta, Indonesia</div>
                            </div>
                        </div>
                    </div>

                    {{-- Accent backdrop frame --}}
                    <div class="absolute -top-3 -left-3 w-28 h-28 rounded-xl -z-10"
                         style="background-color: #f2f0eb; border: 1px solid #e4dfd7;"></div>
                </div>
            </div>

            {{-- Right: Text --}}
            <div class="order-1 lg:order-2 fade-up">
                <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #b55b48;">About Us</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight mb-4"
                    style="font-family: 'Cormorant Garamond', Georgia, serif; color: #24211d;">
                    Desain yang Berbicara,<br>Ruang yang Bercerita
                </h2>
                <div class="w-12 h-0.5 mb-6" style="background-color: #b55b48;"></div>
                <p class="text-base leading-relaxed mb-5 text-[#564e42]">
                    <strong class="font-semibold text-[#24211d]">Pratama Design Studio</strong> adalah perusahaan desain interior dan eksterior yang berdiri sejak 2021 di Jakarta. Kami menghadirkan layanan <em>one-stop solution</em> mulai dari konsultasi, perencanaan, rendering 3D, hingga proses fit-out dan renovasi.
                </p>
                <p class="text-base leading-relaxed mb-7 text-[#564e42]">
                    Setiap proyek kami kerjakan dengan penuh perhatian terhadap detail, anggaran yang transparan, dan hasil yang melebihi ekspektasi klien.
                </p>
                <div class="flex flex-wrap gap-2.5 mb-8">
                    @foreach(['Free Pre-Layout Concept', 'Fleksibel Budget', 'Workshop Sendiri', 'Multi-Kota'] as $tag)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full"
                          style="background-color: #f2f0eb; color: #4a4436; border: 1px solid #e4dfd7;">
                        <i class="fas fa-check text-[0.6rem]" style="color: #b55b48;"></i>
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider transition-all duration-200 group"
                   style="color: #b55b48;">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right text-[10px] transition-transform duration-200 group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- SERVICES SECTION                                              --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-28" style="background-color: #f2f0eb;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="max-w-2xl mb-14 fade-up">
            <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #b55b48;">What We Do</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight mb-4"
                style="font-family: 'Cormorant Garamond', Georgia, serif; color: #24211d;">
                Layanan Kami
            </h2>
            <div class="w-12 h-0.5 mb-4" style="background-color: #b55b48;"></div>
            <p class="text-[#564e42] leading-relaxed text-sm md:text-base">
                Dari konsultasi awal hingga proyek selesai, kami menyediakan solusi lengkap untuk kebutuhan desain interior dan eksterior Anda.
            </p>
        </div>

        {{-- Services Grid --}}
        @if($services->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach($services as $service)
            <div class="fade-up">
                <x-service-card :service="$service" />
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center fade-up">
            <a href="{{ route('services.index') }}"
               class="inline-flex items-center gap-2 px-7 py-3 text-xs font-semibold uppercase tracking-wider rounded-md transition-all duration-200 hover:opacity-90 shadow-sm"
               style="background-color: #302c24; color: white;">
                <i class="fas fa-layer-group text-xs"></i>
                Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- PORTFOLIO SECTION                                             --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-14 fade-up">
            <div>
                <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #b55b48;">Project Portfolio</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                    style="font-family: 'Cormorant Garamond', Georgia, serif; color: #24211d;">
                    Karya Kami
                </h2>
                <div class="w-12 h-0.5 mt-3" style="background-color: #b55b48;"></div>
            </div>
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider transition-all duration-200 group flex-shrink-0"
               style="color: #b55b48;">
                Lihat Semua Proyek
                <i class="fas fa-arrow-right text-[10px] transition-transform duration-200 group-hover:translate-x-1"></i>
            </a>
        </div>

        {{-- Portfolio Grid with real photos fallback --}}
        @if($portfolios->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($portfolios as $portfolio)
            <div class="fade-up">
                <x-portfolio-card :portfolio="$portfolio" />
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-[#777166]">
            <i class="fas fa-images text-4xl mb-3 opacity-40"></i>
            <p class="text-sm">Belum ada portofolio tersedia.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ --}}
{{-- HOW WE WORK (PROCESS) SECTION                                 --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-28 relative overflow-hidden" style="background-color: #302c24;">

    {{-- Subtle process photo texture in background --}}
    <div class="absolute inset-0 bg-cover bg-center opacity-10 pointer-events-none"
         style="background-image: url('{{ asset('assets/images/process.jpg') }}');"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-16 fade-up">
            <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #d98d88;">Cara Kerja Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold text-white leading-tight"
                style="font-family: 'Cormorant Garamond', Georgia, serif;">
                How We Work
            </h2>
            <div class="w-12 h-0.5 mx-auto mt-4" style="background-color: #b55b48;"></div>
        </div>

        {{-- Steps --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['01', 'fas fa-comments',      'Konsultasi Awal',          'Diskusi kebutuhan, lokasi, budget, dan style desain yang Anda inginkan.'],
                ['02', 'fas fa-pencil-ruler',   'Perencanaan & Konsep',     'Kami menyusun rencana desain, denah, dan timeline proyek yang terstruktur.'],
                ['03', 'fas fa-display',        'Visualisasi 3D',           'Anda dapat melihat hasil desain secara nyata sebelum pengerjaan dimulai.'],
                ['04', 'fas fa-hammer',         'Produksi & Fit-Out',       'Eksekusi desain dengan standar kualitas tinggi hingga ruang siap digunakan.'],
            ] as [$num, $icon, $title, $desc])
            <div class="relative fade-up text-center lg:text-left bg-white/[0.04] p-6 rounded-xl border border-white/5">
                {{-- Step number --}}
                <div class="text-[3.8rem] font-bold leading-none mb-2 select-none"
                     style="font-family: 'Cormorant Garamond', Georgia, serif; color: rgba(242,240,235,0.08);">
                    {{ $num }}
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-4 mx-auto lg:mx-0 shadow-inner"
                     style="background-color: rgba(181,91,72,0.22);">
                    <i class="{{ $icon }} text-base" style="color: #d98d88;"></i>
                </div>
                <h3 class="font-semibold text-white mb-2 text-base">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: rgba(242,240,235,0.68);">{{ $desc }}</p>

                {{-- Arrow between steps (desktop only) --}}
                @if(!$loop->last)
                <div class="hidden lg:block absolute top-1/2 -right-4 -translate-y-1/2 z-20">
                    <i class="fas fa-chevron-right text-xs" style="color: rgba(181,91,72,0.45);"></i>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- STATEMENT BANNER (Real Statement Image)                      --}}
{{-- ============================================================ --}}
<section class="relative py-24 lg:py-32 overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/statement.jpg') }}');">
    <div class="absolute inset-0"
         style="background: linear-gradient(135deg, rgba(36,33,29,0.9) 0%, rgba(48,44,36,0.85) 100%);"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="inline-block text-xs uppercase tracking-[0.25em] font-semibold text-[#d98d88] mb-4">
            Design Philosophy
        </span>
        <blockquote class="font-display text-2xl sm:text-3xl lg:text-4xl text-white font-medium italic leading-relaxed mb-6"
                    style="font-family: 'Cormorant Garamond', Georgia, serif;">
            "Setiap sudut ruang memiliki cerita. Kami merancang harmoni antara keindahan estetika dan kenyamanan fungsi hunian Anda."
        </blockquote>
        <div class="w-10 h-0.5 mx-auto bg-[#b55b48]"></div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- TESTIMONIALS                                                  --}}
{{-- ============================================================ --}}
@if($testimonials->count())
<section class="py-20 lg:py-28" style="background-color: #f2f0eb;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-14 fade-up">
            <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #b55b48;">Testimoni</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: 'Cormorant Garamond', Georgia, serif; color: #24211d;">
                Kata Klien Kami
            </h2>
            <div class="w-12 h-0.5 mx-auto mt-4" style="background-color: #b55b48;"></div>
        </div>

        {{-- Testimonial Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials->take(3) as $testimonial)
            <div class="fade-up bg-white rounded-2xl p-7 transition-all duration-300 hover:-translate-y-1 border border-[#e4dfd7]"
                 style="box-shadow: 0 2px 8px rgba(36,33,29,0.04);"
                 onmouseover="this.style.boxShadow='0 12px 32px rgba(48,44,36,0.1)'"
                 onmouseout="this.style.boxShadow='0 2px 8px rgba(36,33,29,0.04)'">

                {{-- Stars --}}
                <div class="flex gap-0.5 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star text-sm {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-gray-200' }}"></i>
                    @endfor
                </div>

                {{-- Quote --}}
                <div class="mb-5">
                    <i class="fas fa-quote-left text-2xl mb-3" style="color: #e4dfd7;"></i>
                    <p class="text-sm leading-relaxed text-[#564e42] italic">
                        "{{ Str::limit($testimonial->message, 150) }}"
                    </p>
                </div>

                {{-- Client --}}
                <div class="flex items-center gap-3 pt-4 border-t border-[#ede8e1]">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0 text-sm font-bold text-white shadow-sm"
                         style="background-color: #302c24;">
                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="text-sm font-semibold" style="color: #24211d;">
                            {{ $testimonial->client_name }}
                        </div>
                        @if($testimonial->project_name)
                        <div class="text-xs" style="color: #777166;">{{ $testimonial->project_name }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================================================ --}}
{{-- WHATSAPP / CTA SECTION                                        --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 relative overflow-hidden" style="background-color: #302c24;">
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-5 shadow-lg"
             style="background-color: rgba(181,91,72,0.25);">
            <i class="fas fa-headset text-xl" style="color: #d98d88;"></i>
        </div>
        <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white mb-4 tracking-tight"
            style="font-family: 'Cormorant Garamond', Georgia, serif;">
            Siap Mewujudkan Ruang Impian Anda?
        </h2>
        <p class="text-base mb-8 max-w-lg mx-auto" style="color: rgba(242,240,235,0.78);">
            Konsultasikan kebutuhan desain interior Anda bersama tim kami. Gratis pre-layout concept dan estimasi awal.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20konsultasi%20desain%20interior."
               target="_blank"
               class="inline-flex items-center gap-3 px-7 py-4 rounded-lg text-white font-semibold text-xs uppercase tracking-wider transition-all duration-200 hover:opacity-95 hover:-translate-y-0.5 shadow-lg"
               style="background-color: #25D366;">
                <i class="fab fa-whatsapp text-lg"></i>
                Chat via WhatsApp
            </a>
            <a href="{{ route('consultation.create') }}"
               class="inline-flex items-center gap-2 px-7 py-4 rounded-lg text-white font-semibold text-xs uppercase tracking-wider transition-all duration-200 hover:bg-white hover:text-[#24211d] hover:-translate-y-0.5"
               style="border: 1.5px solid rgba(242,240,235,0.45);">
                <i class="fas fa-file-alt text-xs"></i>
                Isi Form Konsultasi
            </a>
        </div>

        {{-- Contact info pills --}}
        <div class="flex flex-wrap justify-center gap-4 mt-8">
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm" style="color: rgba(242,240,235,0.65);">
                <i class="fas fa-phone-alt text-xs"></i>
                +62 822 1364 1995
            </span>
            <span style="color: rgba(242,240,235,0.3);">·</span>
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm" style="color: rgba(242,240,235,0.65);">
                <i class="fas fa-envelope text-xs"></i>
                pratamadsb@gmail.com
            </span>
            <span style="color: rgba(242,240,235,0.3);">·</span>
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm" style="color: rgba(242,240,235,0.65);">
                <i class="fab fa-instagram text-xs"></i>
                @pratamaid.studio
            </span>
        </div>
    </div>
</section>

@endsection
