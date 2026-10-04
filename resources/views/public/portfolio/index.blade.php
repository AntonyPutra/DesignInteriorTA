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
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        <div class="flex flex-wrap gap-2 mb-10 fade-up">
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200"
               style="{{ $activeCategory === 'all' ? 'background-color: #3E372C; color: white;' : 'background-color: #F8F5EF; color: #6B6B6B; border: 1px solid #E2DDD6;' }}">
                <i class="fas fa-th-large mr-2 text-xs"></i>
                Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}"
               class="inline-flex items-center px-5 py-2 rounded-full text-sm font-medium transition-all duration-200"
               style="{{ $activeCategory === $category->slug ? 'background-color: #B85C4A; color: white;' : 'background-color: #F8F5EF; color: #6B6B6B; border: 1px solid #E2DDD6;' }}"
               onmouseover="{{ $activeCategory !== $category->slug ? 'this.style.backgroundColor=\'#EDE8DF\'; this.style.color=\'#3E372C\';' : '' }}"
               onmouseout="{{ $activeCategory !== $category->slug ? 'this.style.backgroundColor=\'#F8F5EF\'; this.style.color=\'#6B6B6B\';' : '' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>

        {{-- Portfolio Count --}}
        <div class="mb-6 fade-up">
            <p class="text-sm" style="color: #8A6F55;">
                Menampilkan <strong style="color: #3E372C;">{{ $portfolios->total() }}</strong> proyek
                @if($activeCategory !== 'all')
                dalam kategori <strong style="color: #B85C4A;">{{ $categories->firstWhere('slug', $activeCategory)?->name }}</strong>
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
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                 style="background-color: #F8F5EF;">
                <i class="fas fa-images text-2xl" style="color: #C8BDB0;"></i>
            </div>
            <h3 class="font-semibold text-lg mb-2" style="color: #3E372C;">Belum Ada Proyek</h3>
            <p class="text-sm text-gray-400 mb-6">Proyek dalam kategori ini belum tersedia.</p>
            <a href="{{ route('portfolio.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded text-sm font-medium text-white"
               style="background-color: #3E372C;">
                <i class="fas fa-arrow-left text-xs"></i>
                Lihat Semua Proyek
            </a>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-16" style="background-color: #F8F5EF; border-top: 1px solid #E2DDD6;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <h2 class="font-display text-3xl font-semibold mb-3" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
            Tertarik dengan Proyek Serupa?
        </h2>
        <p class="text-sm text-gray-500 mb-6 max-w-lg mx-auto">
            Konsultasikan kebutuhan desain interior Anda bersama kami. Gratis pre-layout concept sebelum agreement.
        </p>
        <a href="{{ route('consultation.create') }}"
           class="inline-flex items-center gap-2 px-7 py-3.5 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90"
           style="background-color: #B85C4A;">
            <i class="fas fa-comment-dots"></i>
            Konsultasi Proyek
        </a>
    </div>
</section>

@endsection
