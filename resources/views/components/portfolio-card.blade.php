{{-- Portfolio Card Component (Warm Luxury Edition) --}}
{{-- Usage: <x-portfolio-card :portfolio="$portfolio" /> --}}

@props(['portfolio'])

@php
    $imageUrl = $portfolio->image_url;
    $categoryName = $portfolio->category->name ?? 'Interior';
    $projectType = $portfolio->project_type ?? 'Desain & Build';
    $location = $portfolio->location ?? 'Jakarta';
    $year = $portfolio->year ?? '2023';
@endphp

<div class="group relative rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1.5 border flex flex-col h-full"
    style="background: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">

    {{-- Image Container (Consistent 4:3 Aspect Ratio) --}}
    <div class="relative overflow-hidden aspect-[4/3] bg-[#24211d] shrink-0">
        <img src="{{ $imageUrl }}" alt="{{ $portfolio->title }} - {{ $projectType }}"
            loading="lazy"
            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

        {{-- Dark Gradient Overlay on Hover --}}
        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 group-hover:opacity-100"
            style="background: linear-gradient(to top, rgba(26, 24, 22, 0.92) 0%, rgba(26, 24, 22, 0.3) 55%, transparent 100%);">
        </div>

        {{-- Category Badge (Top Left) --}}
        <div class="absolute top-3.5 left-3.5 z-10">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold tracking-wider uppercase text-white shadow-md"
                style="background-color: rgba(181, 91, 72, 0.92); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.15);">
                {{ $categoryName }}
            </span>
        </div>

        {{-- Year Badge (Top Right) --}}
        @if($year)
            <div class="absolute top-3.5 right-3.5 z-10">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-medium text-white/90 shadow-md"
                    style="background-color: rgba(0, 0, 0, 0.55); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.1);">
                    {{ $year }}
                </span>
            </div>
        @endif

        {{-- Interactive Hover Overlay Action Buttons --}}
        <div class="absolute inset-0 z-20 flex items-center justify-center gap-2.5 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 px-4">
            {{-- Quick Lightbox Preview Trigger --}}
            <button type="button"
                onclick="if(window.openPortfolioLightbox) { window.openPortfolioLightbox({
                    title: '{{ addslashes($portfolio->title) }}',
                    category: '{{ addslashes($categoryName) }}',
                    image: '{{ $imageUrl }}',
                    location: '{{ addslashes($location) }}',
                    year: '{{ $year }}',
                    project_type: '{{ addslashes($projectType) }}',
                    room_type: '{{ addslashes($portfolio->room_type ?? '') }}',
                    design_style: '{{ addslashes($portfolio->design_style ?? '') }}',
                    url: '{{ route('portfolio.show', $portfolio->slug) }}'
                }); } else { window.location.href = '{{ route('portfolio.show', $portfolio->slug) }}'; }"
                class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-semibold text-white transition-all duration-200 hover:scale-105 shadow-lg"
                style="background-color: rgba(43, 38, 34, 0.9); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(8px);">
                <i class="fas fa-search-plus text-[11px]"></i>
                <span>Preview</span>
            </button>

            {{-- Detail Page Link --}}
            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-white transition-all duration-200 hover:scale-105 shadow-lg"
                style="background-color: var(--accent); backdrop-filter: blur(8px);">
                <span>Detail</span>
                <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
        </div>
    </div>

    {{-- Card Body --}}
    <div class="p-5 flex flex-col justify-between flex-1" style="background: var(--card-bg);">
        <div>
            {{-- Title --}}
            <h3 class="font-display font-semibold text-lg leading-snug line-clamp-1 mb-2 transition-colors duration-200 group-hover:text-[var(--accent)]"
                style="color: var(--text-heading);" title="{{ $portfolio->title }}">
                <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                    {{ $portfolio->title }}
                </a>
            </h3>

            {{-- Meta Tags --}}
            <div class="flex flex-wrap items-center gap-2 text-xs mb-3" style="color: var(--muted);">
                @if($projectType)
                    <span class="inline-flex items-center gap-1 font-medium">
                        <i class="fas fa-layer-group text-[10px]" style="color: var(--accent);"></i>
                        {{ $projectType }}
                    </span>
                @endif

                @if($portfolio->room_type)
                    <span class="opacity-40">•</span>
                    <span class="inline-flex items-center gap-1">
                        <i class="fas fa-door-open text-[10px]" style="color: var(--muted);"></i>
                        {{ $portfolio->room_type }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Card Footer: Location & Style Pills --}}
        <div class="pt-3 border-t flex items-center justify-between gap-2 text-[11px]" style="border-color: var(--line);">
            <span class="truncate flex items-center gap-1.5" style="color: var(--text-lead);">
                <i class="fas fa-map-marker-alt text-[10px]" style="color: var(--accent);"></i>
                <span class="truncate">{{ $location }}</span>
            </span>

            @if($portfolio->design_style)
                <span class="px-2 py-0.5 rounded-md font-medium text-[10px] shrink-0"
                    style="background-color: var(--paper); color: var(--text-lead); border: 1px solid var(--line);">
                    {{ $portfolio->design_style }}
                </span>
            @endif
        </div>
    </div>
</div>
