@extends('layouts.app')

@section('title', 'Cari Portfolio AI')
@section('meta_description', 'Portfolio proyek Pratama Design Studio: Landed House, Apartment, F&B, Booth, Office. Cari inspirasi interior dengan asisten AI.')

@section('content')

<x-subpage-hero
    title="Karya Kami"
    eyebrow="Project Portfolio &amp; AI Assistant"
    description="Jelajahi portofolio desain interior kami atau temukan inspirasi spesifik menggunakan asisten pencarian cerdas berbasis AI."
    :breadcrumbs="['Portfolio' => '']"
    image-keyword="apartment"
/>

{{-- ============================================================ --}}
{{-- FILTER + PORTFOLIO GRID                                       --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- AI Smart Search --}}
        <div id="ai-search" class="mb-12 fade-up relative z-20" style="scroll-margin-top: 100px;">
            <form action="{{ route('ai-portfolio.index') }}" method="GET" class="relative max-w-4xl mx-auto">
                <div class="flex flex-col sm:flex-row items-center sm:rounded-full rounded-2xl shadow-md transition-all duration-300 border p-1.5"
                     style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                    <i class="fas fa-magic hidden sm:block ml-5 mr-2 text-lg" style="color: var(--accent);"></i>
                    <input type="text" name="ai_search" value="{{ $aiPrompt ?? '' }}" 
                           placeholder="Ceritakan ruangan impian Anda (misal: dapur kayu ala Japandi)..." 
                           class="w-full bg-transparent border-none focus:ring-0 text-sm py-4 sm:py-3 px-4 sm:px-2 outline-none"
                           style="color: var(--text-heading);">
                    <button type="submit" class="w-full sm:w-auto mt-2 sm:mt-0 px-8 py-3.5 sm:py-3 rounded-xl sm:rounded-full text-white text-sm font-semibold transition-all duration-200 hover:opacity-90 flex-shrink-0 flex items-center justify-center gap-2 shadow-sm"
                            style="background-color: var(--accent);">
                        <i class="fas fa-search sm:hidden"></i> Cari Inspirasi
                    </button>
                </div>
                @if(!empty($aiPrompt))
                <div class="mt-4 text-center text-sm font-medium">
                    <span style="color: var(--text-heading);">Menampilkan hasil AI untuk:</span> <span class="italic" style="color: var(--accent);">"{{ $aiPrompt }}"</span>
                    <span class="mx-2" style="color: var(--line);">|</span>
                    <a href="{{ route('ai-portfolio.index') }}" class="underline" style="color: var(--accent);">Reset Pencarian</a>
                </div>
                @endif
            </form>
        </div>

        {{-- Category Filter --}}
        <div class="flex flex-wrap justify-center gap-2.5 mb-10 fade-up">
            <a href="{{ route('ai-portfolio.index') }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200 border"
               style="{{ $activeCategory === 'all' ? 'background-color: var(--accent); color: white; border-color: var(--accent);' : 'background-color: var(--card-bg); color: var(--text-lead); border-color: var(--card-border);' }}">
                <i class="fas fa-th-large mr-2 text-xs"></i>
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('ai-portfolio.index', ['category' => $category->slug]) }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200 border"
               style="{{ $activeCategory === $category->slug ? 'background-color: var(--accent); color: white; border-color: var(--accent);' : 'background-color: var(--card-bg); color: var(--text-lead); border-color: var(--card-border);' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>

        {{-- Portfolio Count --}}
        <div class="mb-6 fade-up">
            <p class="text-sm" style="color: var(--muted);">
                Menampilkan <strong style="color: var(--text-heading);">{{ $portfolios->total() }}</strong> proyek
                @if($activeCategory !== 'all')
                dalam kategori <strong style="color: var(--accent);">{{ $categories->firstWhere('slug', $activeCategory)?->name }}</strong>
                @endif
            </p>
        </div>

        {{-- Portfolio Grid --}}
        @if($portfolios->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($portfolios as $portfolio)
            <div class="fade-up">
                <x-portfolio-card :portfolio="$portfolio" />
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($portfolios->hasPages())
        <div class="mt-12 fade-up">
            {{ $portfolios->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 border"
                 style="background-color: var(--card-bg); border-color: var(--card-border);">
                <i class="fas fa-images text-2xl" style="color: var(--muted);"></i>
            </div>
            <h3 class="font-semibold text-lg mb-2" style="font-family: var(--serif); font-size: 1.3rem; color: var(--text-heading);">Belum Ada Proyek</h3>
            <p class="text-sm mb-6" style="color: var(--text-lead);">Proyek dalam kategori ini belum tersedia.</p>
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-medium text-white shadow-sm"
               style="background-color: var(--accent);">
                <i class="fas fa-arrow-left text-xs"></i>
                Lihat Semua Proyek
            </a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-16 border-t" style="background-color: var(--card-bg); border-color: var(--card-border);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <h2 class="font-display text-3xl font-semibold mb-3" style="font-family: var(--serif); color: var(--text-heading);">
            Tertarik dengan Proyek Serupa?
        </h2>
        <p class="text-sm mb-6 max-w-lg mx-auto" style="color: var(--text-lead);">
            Konsultasikan kebutuhan desain interior Anda bersama kami. Gratis pre-layout concept sebelum agreement.
        </p>
        <a href="{{ route('consultation.create') }}"
           class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-7 py-3.5 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 shadow-md"
           style="background-color: var(--accent);">
            <i class="fas fa-comment-dots"></i>
            Konsultasi Proyek
        </a>
    </div>
</section>

@endsection
