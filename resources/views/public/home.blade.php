@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Pratama Design Studio — Interior & Exterior Design & Build. Kami membantu Anda mewujudkan ruang impian yang estetis, fungsional, dan berkarakter. Based in Jakarta.')

@section('content')

{{-- ============================================================ --}}
{{-- HERO SECTION                                                  --}}
{{-- ============================================================ --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden"
         style="background-color: #1E1812;">

    {{-- Background pattern overlay --}}
    <div class="absolute inset-0 opacity-[0.03]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    {{-- Gradient overlay layers --}}
    <div class="absolute inset-0"
         style="background: linear-gradient(135deg, rgba(30,24,18,0.98) 0%, rgba(62,55,44,0.85) 50%, rgba(92,72,55,0.7) 100%);"></div>

    {{-- Decorative circle element --}}
    <div class="absolute -right-32 -top-32 w-96 h-96 rounded-full opacity-5"
         style="background: radial-gradient(circle, #B85C4A 0%, transparent 70%);"></div>
    <div class="absolute -left-20 -bottom-20 w-72 h-72 rounded-full opacity-5"
         style="background: radial-gradient(circle, #8A6F55 0%, transparent 70%);"></div>

    {{-- Hero Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="max-w-3xl">

            {{-- Label --}}
            <div class="inline-flex items-center gap-2 mb-6">
                <div class="w-8 h-px" style="background-color: #B85C4A;"></div>
                <span class="text-xs font-semibold tracking-[0.2em] uppercase" style="color: #B85C4A;">
                    Pratama Design Studio
                </span>
            </div>

            {{-- Headline --}}
            <h1 class="font-display text-white mb-6 leading-[1.05]"
                style="font-family: 'Cormorant Garamond', serif; font-size: clamp(2.8rem, 6vw, 5rem); font-weight: 600;">
                Transforming Ideas<br>
                <span style="color: #C8956A; font-style: italic;">into Living Spaces</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-base md:text-lg leading-relaxed mb-8 max-w-xl"
               style="color: rgba(255,255,255,0.72);">
                Kami membantu Anda menciptakan ruang yang estetis, fungsional, dan sesuai dengan kebutuhan — mulai dari desain konsep hingga proses fit-out selesai.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap items-center gap-4 mb-12">
                <a href="{{ route('consultation.create') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 hover:-translate-y-px"
                   style="background-color: #B85C4A; letter-spacing: 0.04em;">
                    <i class="fas fa-comment-dots"></i>
                    Konsultasi Sekarang
                </a>
                <a href="{{ route('portfolio.index') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 rounded text-sm font-semibold text-white transition-all duration-200 hover:bg-white/10"
                   style="border: 1.5px solid rgba(255,255,255,0.45); letter-spacing: 0.04em;">
                    <i class="fas fa-images"></i>
                    Lihat Portofolio
                </a>
            </div>

            {{-- Credentials --}}
            <div class="flex flex-wrap items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="flex -space-x-1.5">
                        @foreach(['#B85C4A','#8A6F55','#3E372C'] as $c)
                        <div class="w-6 h-6 rounded-full border-2 border-[#1E1812] flex items-center justify-center"
                             style="background-color: {{ $c }};">
                            <i class="fas fa-user text-[0.5rem] text-white"></i>
                        </div>
                        @endforeach
                    </div>
                    <span class="text-xs" style="color: rgba(255,255,255,0.55);">Klien puas &amp; terpercaya</span>
                </div>
                <div class="flex items-center gap-1.5">
                    @for($i = 0; $i < 5; $i++)
                    <i class="fas fa-star text-xs" style="color: #F59E0B;"></i>
                    @endfor
                    <span class="text-xs ml-1" style="color: rgba(255,255,255,0.55);">5.0 Rating</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
        <span class="text-[10px] tracking-[0.2em] uppercase text-white">Scroll</span>
        <div class="w-px h-10 bg-white/30 relative overflow-hidden">
            <div class="w-full h-1/2 bg-white animate-bounce"></div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- STATS BAR                                                     --}}
{{-- ============================================================ --}}
<section style="background-color: #F8F5EF; border-bottom: 1px solid #E2DDD6;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @foreach([
                ['20+',  'Proyek Selesai',    'fas fa-check-circle'],
                ['4+',   'Tahun Pengalaman',  'fas fa-calendar'],
                ['3+',   'Kota di Indonesia', 'fas fa-map-marker-alt'],
                ['100%', 'Klien Puas',        'fas fa-heart'],
            ] as [$num, $label, $icon])
            <div class="flex flex-col items-center gap-1.5">
                <i class="{{ $icon }} text-sm mb-1" style="color: #B85C4A;"></i>
                <div class="font-display text-3xl font-semibold leading-none" style="color: #3E372C;">{{ $num }}</div>
                <div class="text-xs text-gray-500 font-medium tracking-wide">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- ABOUT SNIPPET                                                 --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            {{-- Left: Visual --}}
            <div class="relative order-2 lg:order-1 fade-up">
                {{-- Main decorative block --}}
                <div class="relative">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden"
                         style="background: linear-gradient(135deg, #3E372C 0%, #5A4A38 40%, #8A6F55 100%);">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="text-center p-8">
                                <i class="fas fa-drafting-compass text-5xl mb-4 opacity-30 text-white"></i>
                                <p class="font-display text-2xl italic text-white opacity-40">Design & Build</p>
                            </div>
                        </div>
                    </div>
                    {{-- Floating card --}}
                    <div class="absolute -bottom-5 -right-5 bg-white rounded-xl p-4 shadow-xl"
                         style="border: 1px solid #E2DDD6;">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: #FEF6F4;">
                                <i class="fas fa-award" style="color: #B85C4A;"></i>
                            </div>
                            <div>
                                <div class="text-xs font-semibold" style="color: #3E372C;">Est. 2021</div>
                                <div class="text-xs text-gray-500">Jakarta, Indonesia</div>
                            </div>
                        </div>
                    </div>
                    {{-- Accent border --}}
                    <div class="absolute -top-3 -left-3 w-24 h-24 rounded-lg -z-10"
                         style="background-color: #F8F5EF; border: 1px solid #E2DDD6;"></div>
                </div>
            </div>

            {{-- Right: Text --}}
            <div class="order-1 lg:order-2 fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">About Us</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight mb-4"
                    style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                    Desain yang Berbicara,<br>Ruang yang Bercerita
                </h2>
                <div class="w-10 h-0.5 mb-5" style="background-color: #B85C4A;"></div>
                <p class="text-base leading-relaxed mb-5 text-gray-600">
                    <strong class="font-semibold" style="color: #3E372C;">Pratama Design Studio</strong> adalah perusahaan desain interior dan eksterior yang berdiri sejak 2021 di Jakarta. Kami menghadirkan layanan <em>one-stop solution</em> mulai dari konsultasi, perencanaan, rendering 3D, hingga proses fit-out dan renovasi.
                </p>
                <p class="text-base leading-relaxed mb-7 text-gray-600">
                    Setiap proyek kami kerjakan dengan penuh perhatian terhadap detail, anggaran yang transparan, dan hasil yang melebihi ekspektasi klien.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    @foreach(['Free Pre-Layout Concept', 'Fleksibel Budget', 'Workshop Sendiri', 'Multi-Kota'] as $tag)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full"
                          style="background-color: #F8F5EF; color: #3E372C; border: 1px solid #E2DDD6;">
                        <i class="fas fa-check text-[0.55rem]" style="color: #B85C4A;"></i>
                        {{ $tag }}
                    </span>
                    @endforeach
                </div>
                <a href="{{ route('about') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold transition-all duration-200 group"
                   style="color: #B85C4A;">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover:translate-x-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- SERVICES SECTION                                              --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="max-w-2xl mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">What We Do</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight mb-4"
                style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Layanan Kami
            </h2>
            <div class="w-10 h-0.5 mb-4" style="background-color: #B85C4A;"></div>
            <p class="text-gray-600 leading-relaxed">
                Dari konsultasi awal hingga proyek selesai, kami menyediakan solusi lengkap untuk kebutuhan desain interior dan eksterior Anda.
            </p>
        </div>

        {{-- Services Grid --}}
        @if($services->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($services as $service)
            <div class="fade-up">
                <x-service-card :service="$service" />
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center fade-up">
            <a href="{{ route('services.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold rounded transition-all duration-200 hover:opacity-90"
               style="background-color: #3E372C; color: white;">
                <i class="fas fa-layer-group"></i>
                Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- PORTFOLIO SECTION                                             --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-12 fade-up">
            <div>
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Project Portfolio</p>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                    style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                    Karya Kami
                </h2>
                <div class="w-10 h-0.5 mt-3" style="background-color: #B85C4A;"></div>
            </div>
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold transition-all duration-200 group flex-shrink-0"
               style="color: #B85C4A;">
                Lihat Semua Proyek
                <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover:translate-x-1"></i>
            </a>
        </div>

        {{-- Portfolio Grid --}}
        @if($portfolios->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($portfolios as $portfolio)
            <div class="fade-up">
                <x-portfolio-card :portfolio="$portfolio" />
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-images text-4xl mb-3 opacity-40"></i>
            <p class="text-sm">Belum ada portofolio tersedia.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ --}}
{{-- HOW WE WORK                                                   --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #2A2219;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-14 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Cara Kerja Kami</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold text-white leading-tight"
                style="font-family: 'Cormorant Garamond', serif;">
                How We Work
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-4" style="background-color: #B85C4A;"></div>
        </div>

        {{-- Steps --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['01', 'fas fa-comments',      'Konsultasi Awal',          'Diskusi kebutuhan, lokasi, budget, dan style desain yang Anda inginkan.'],
                ['02', 'fas fa-pencil-ruler',   'Perencanaan & Konsep',     'Kami menyusun rencana desain, denah, dan timeline proyek yang terstruktur.'],
                ['03', 'fas fa-display',        'Visualisasi 3D',           'Anda dapat melihat hasil desain secara nyata sebelum pengerjaan dimulai.'],
                ['04', 'fas fa-hammer',         'Produksi & Fit-Out',       'Eksekusi desain dengan standar kualitas tinggi hingga ruang siap digunakan.'],
            ] as [$num, $icon, $title, $desc])
            <div class="relative fade-up text-center lg:text-left">
                {{-- Step number --}}
                <div class="text-[4.5rem] font-bold leading-none mb-3 select-none"
                     style="font-family: 'Cormorant Garamond', serif; color: rgba(255,255,255,0.06);">
                    {{ $num }}
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center mb-4 mx-auto lg:mx-0"
                     style="background-color: rgba(184,92,74,0.2);">
                    <i class="{{ $icon }}" style="color: #B85C4A;"></i>
                </div>
                <h3 class="font-semibold text-white mb-2 text-base">{{ $title }}</h3>
                <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.55);">{{ $desc }}</p>

                {{-- Arrow between steps (desktop only) --}}
                @if(!$loop->last)
                <div class="hidden lg:block absolute top-16 -right-4 text-gray-600">
                    <i class="fas fa-chevron-right text-sm" style="color: rgba(184,92,74,0.35);"></i>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- TESTIMONIALS                                                  --}}
{{-- ============================================================ --}}
@if($testimonials->count())
<section class="py-20 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Testimoni</p>
            <h2 class="font-display text-4xl lg:text-5xl font-semibold leading-tight"
                style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Kata Klien Kami
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-4" style="background-color: #B85C4A;"></div>
        </div>

        {{-- Testimonial Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials->take(3) as $testimonial)
            <div class="fade-up bg-white rounded-2xl p-7 transition-all duration-300 hover:-translate-y-1"
                 style="border: 1px solid #E2DDD6; box-shadow: 0 2px 8px rgba(0,0,0,0.04);"
                 onmouseover="this.style.boxShadow='0 12px 32px rgba(62,55,44,0.1)'"
                 onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'">

                {{-- Stars --}}
                <div class="flex gap-0.5 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star text-sm {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-gray-200' }}"></i>
                    @endfor
                </div>

                {{-- Quote --}}
                <div class="mb-5">
                    <i class="fas fa-quote-left text-2xl mb-3" style="color: #E2DDD6;"></i>
                    <p class="text-sm leading-relaxed text-gray-600 italic">
                        "{{ Str::limit($testimonial->message, 150) }}"
                    </p>
                </div>

                {{-- Client --}}
                <div class="flex items-center gap-3 pt-4" style="border-top: 1px solid #F0EDEA;">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0 text-sm font-bold text-white"
                         style="background-color: #3E372C;">
                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="text-sm font-semibold" style="color: #3E372C;">
                            {{ $testimonial->client_name }}
                        </div>
                        @if($testimonial->project_name)
                        <div class="text-xs" style="color: #8A6F55;">{{ $testimonial->project_name }}</div>
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
<section class="py-16 lg:py-20 relative overflow-hidden" style="background-color: #3E372C;">
    {{-- Background pattern --}}
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'1\'/%3E%3Ccircle cx=\'13\' cy=\'13\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-5"
             style="background-color: rgba(184,92,74,0.2);">
            <i class="fas fa-headset text-xl" style="color: #B85C4A;"></i>
        </div>
        <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white mb-4"
            style="font-family: 'Cormorant Garamond', serif;">
            Siap Mewujudkan Ruang Impian Anda?
        </h2>
        <p class="text-base mb-8 max-w-lg mx-auto" style="color: rgba(255,255,255,0.65);">
            Konsultasikan kebutuhan desain interior Anda bersama tim kami. Gratis pre-layout concept dan estimasi awal.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20konsultasi%20desain%20interior."
               target="_blank"
               class="inline-flex items-center gap-3 px-7 py-4 rounded-lg text-white font-semibold text-sm transition-all duration-200 hover:opacity-90 hover:-translate-y-px"
               style="background-color: #25D366; box-shadow: 0 4px 16px rgba(37,211,102,0.3);">
                <i class="fab fa-whatsapp text-xl"></i>
                Chat via WhatsApp
            </a>
            <a href="{{ route('consultation.create') }}"
               class="inline-flex items-center gap-2 px-7 py-4 rounded-lg text-white font-semibold text-sm transition-all duration-200 hover:bg-white hover:text-gray-900 hover:-translate-y-px"
               style="border: 1.5px solid rgba(255,255,255,0.4);">
                <i class="fas fa-file-alt"></i>
                Isi Form Konsultasi
            </a>
        </div>

        {{-- Contact info pills --}}
        <div class="flex flex-wrap justify-center gap-4 mt-8">
            <span class="inline-flex items-center gap-2 text-sm" style="color: rgba(255,255,255,0.5);">
                <i class="fas fa-phone-alt text-xs"></i>
                +62 822 1364 1995
            </span>
            <span style="color: rgba(255,255,255,0.25);">·</span>
            <span class="inline-flex items-center gap-2 text-sm" style="color: rgba(255,255,255,0.5);">
                <i class="fas fa-envelope text-xs"></i>
                pratamadsb@gmail.com
            </span>
            <span style="color: rgba(255,255,255,0.25);">·</span>
            <span class="inline-flex items-center gap-2 text-sm" style="color: rgba(255,255,255,0.5);">
                <i class="fab fa-instagram text-xs"></i>
                @pratamaid.studio
            </span>
        </div>
    </div>
</section>

@endsection
