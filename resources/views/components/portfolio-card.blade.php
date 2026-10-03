{{-- Portfolio Card Component --}}
{{-- Usage: <x-portfolio-card :portfolio="$portfolio" /> --}}

@props(['portfolio'])

@php
    // Fallback images from public/assets/images
    $fallbackImages = [
        1 => 'assets/images/p-landed-03.jpg',    // Kitchen Set
        2 => 'assets/images/p-landed-02.jpg',    // Master Bedroom
        3 => 'assets/images/p-landed-01.jpg',    // Full House
        4 => 'assets/images/p-apartment-01.jpg', // Apartment Studio
        5 => 'assets/images/p-fnb-01.jpg',       // F&B / Cafe
        6 => 'assets/images/p-office-01.jpg',    // Office
    ];
    $fallbackImage = $fallbackImages[$portfolio->id] ?? 'assets/images/p-apartment-02.jpg';

    $hasMainImage = $portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image);
    $imageUrl = $hasMainImage ? Storage::url($portfolio->main_image) : asset($fallbackImage);
@endphp

<div class="group relative rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 bg-white border border-[#E5E0D8]"
     style="box-shadow: 0 2px 10px rgba(46,42,35,0.06);"
     onmouseover="this.style.boxShadow='0 16px 36px rgba(46,42,35,0.14)';"
     onmouseout="this.style.boxShadow='0 2px 10px rgba(46,42,35,0.06)';">

    {{-- Image Container --}}
    <div class="relative overflow-hidden aspect-[4/3] bg-[#2E2A23]">
        <img src="{{ $imageUrl }}"
             alt="{{ $portfolio->title }}"
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

        {{-- Dark overlay on hover --}}
        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(to top, rgba(30,24,18,0.85) 0%, rgba(30,24,18,0.2) 60%, transparent 100%);"></div>

        {{-- Category Badge --}}
        <div class="absolute top-3 left-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded text-[11px] font-semibold tracking-wide text-white shadow-sm"
                  style="background-color: rgba(184,92,74,0.92); backdrop-filter: blur(4px);">
                {{ $portfolio->category->name ?? 'Interior' }}
            </span>
        </div>

        {{-- Year badge --}}
        @if($portfolio->year)
        <div class="absolute top-3 right-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded text-[11px] font-medium text-white shadow-sm"
                  style="background-color: rgba(0,0,0,0.5); backdrop-filter: blur(4px);">
                {{ $portfolio->year }}
            </span>
        </div>
        @endif

        {{-- View Detail Overlay Button --}}
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-semibold text-white transition-all duration-200 hover:scale-105 transform translate-y-2 group-hover:translate-y-0 shadow-lg"
               style="background-color: #B85C4A; backdrop-filter: blur(4px);">
                <i class="fas fa-eye text-xs"></i>
                Lihat Detail
            </a>
        </div>
    </div>

    {{-- Card Body --}}
    <div class="p-4 bg-white">
        <div class="flex items-start justify-between gap-2">
            <div class="flex-1 min-w-0">
                <h3 class="font-semibold text-base leading-snug truncate mb-1 transition-colors duration-200 group-hover:text-[#B85C4A]"
                    style="font-family: 'Cormorant Garamond', serif; font-size: 1.15rem; color: #2E2A23;">
                    {{ $portfolio->title }}
                </h3>
                <div class="flex items-center gap-3 text-xs" style="color: #8C7355;">
                    @if($portfolio->project_type)
                    <span class="flex items-center gap-1 font-medium">
                        <i class="fas fa-tag text-[0.6rem]"></i>
                        {{ $portfolio->project_type }}
                    </span>
                    @endif
                    @if($portfolio->location)
                    <span class="flex items-center gap-1">
                        <i class="fas fa-map-marker-alt text-[0.6rem]"></i>
                        {{ $portfolio->location }}
                    </span>
                    @endif
                </div>
            </div>
            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
               class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110"
               style="background-color: #F8F5EF;"
               title="Lihat Detail">
                <i class="fas fa-arrow-right text-xs" style="color: #8C7355;"></i>
            </a>
        </div>
    </div>
</div>
