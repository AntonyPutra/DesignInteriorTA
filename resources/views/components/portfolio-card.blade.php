{{-- Portfolio Card Component --}}
{{-- Usage: <x-portfolio-card :portfolio="$portfolio" /> --}}

@props(['portfolio'])

<div class="group relative rounded-xl overflow-hidden transition-all duration-400 hover:-translate-y-1"
     style="box-shadow: 0 2px 8px rgba(0,0,0,0.08);"
     onmouseover="this.style.boxShadow='0 16px 40px rgba(62,55,44,0.18)';"
     onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">

    {{-- Image Container --}}
    <div class="relative overflow-hidden aspect-[4/3]">
        @if($portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image))
            <img src="{{ Storage::url($portfolio->main_image) }}"
                 alt="{{ $portfolio->title }}"
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        @else
            {{-- Placeholder gradient --}}
            <div class="w-full h-full flex items-center justify-center transition-transform duration-500 group-hover:scale-110"
                 style="background: linear-gradient(135deg, #3E372C 0%, #8A6F55 60%, #B85C4A 100%);">
                <div class="text-center">
                    <i class="fas fa-couch text-3xl mb-2" style="color: rgba(255,255,255,0.4);"></i>
                    <p class="text-xs font-medium tracking-wider uppercase" style="color: rgba(255,255,255,0.5);">
                        {{ $portfolio->project_type }}
                    </p>
                </div>
            </div>
        @endif

        {{-- Dark overlay on hover --}}
        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 group-hover:opacity-100"
             style="background: linear-gradient(to top, rgba(30,24,18,0.85) 0%, rgba(30,24,18,0.2) 60%, transparent 100%);"></div>

        {{-- Category Badge --}}
        <div class="absolute top-3 left-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded text-xs font-semibold tracking-wide text-white"
                  style="background-color: rgba(184,92,74,0.9); backdrop-filter: blur(4px);">
                {{ $portfolio->category->name ?? 'Uncategorized' }}
            </span>
        </div>

        {{-- Year badge --}}
        @if($portfolio->year)
        <div class="absolute top-3 right-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded text-xs font-medium text-white"
                  style="background-color: rgba(0,0,0,0.45); backdrop-filter: blur(4px);">
                {{ $portfolio->year }}
            </span>
        </div>
        @endif

        {{-- View Detail Overlay Button --}}
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
            <a href="{{ route('portfolio.show', $portfolio->slug) }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold text-white transition-all duration-200 hover:scale-105 transform translate-y-2 group-hover:translate-y-0"
               style="background-color: #B85C4A; backdrop-filter: blur(4px);">
                <i class="fas fa-eye text-xs"></i>
                Lihat Detail
            </a>
        </div>
    </div>

    {{-- Card Body --}}
    <div class="bg-white p-4">
        <div class="flex items-start justify-between gap-2">
            <div class="flex-1 min-w-0">
                <h3 class="font-semibold text-sm leading-snug truncate mb-1 transition-colors duration-200 group-hover:text-[#B85C4A]"
                    style="font-family: 'Cormorant Garamond', serif; font-size: 1rem; color: #3E372C;">
                    {{ $portfolio->title }}
                </h3>
                <div class="flex items-center gap-3 text-xs" style="color: #8A6F55;">
                    @if($portfolio->project_type)
                    <span class="flex items-center gap-1">
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
                <i class="fas fa-arrow-right text-xs" style="color: #8A6F55;"></i>
            </a>
        </div>
    </div>
</div>
