@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Portfolio proyek Pratama Design Studio: Landed House, Apartment, F&B, Booth, Office. Lihat karya desain interior dan exterior terbaik kami.')

@section('content')

<x-subpage-hero
    title="Karya Kami"
    eyebrow="Project Portfolio"
    description="Setiap proyek adalah cerminan dari kolaborasi kami dengan klien — menciptakan ruang yang fungsional, estetis, dan penuh makna."
    :breadcrumbs="['Portfolio' => '']"
    image-keyword="landed"
/>

{{-- ============================================================ --}}
{{-- FILTER + PORTFOLIO GRID                                       --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        <div class="flex flex-wrap gap-2.5 mb-10 fade-up">
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200"
               style="{{ $activeCategory === 'all' ? 'background-color: var(--accent); color: white;' : 'background-color: var(--card-bg); color: var(--text-lead); border: 1px solid var(--card-border);' }}">
                <i class="fas fa-th-large mr-2 text-xs"></i>
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200"
               style="{{ $activeCategory === $category->slug ? 'background-color: var(--accent); color: white;' : 'background-color: var(--card-bg); color: var(--text-lead); border: 1px solid var(--card-border);' }}">
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
