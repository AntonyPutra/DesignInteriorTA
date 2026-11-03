{{-- Portfolio Card Component (Minimalist, Elegant & Luxury Design) --}}
@props(['portfolio'])

<article class="project-card portfolio-item-card card-visible">
    <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="project-card-link" aria-label="{{ $portfolio->title }}">
        <div class="project-image">
            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" loading="lazy" />
            
            <div class="card-badges">
                @if($portfolio->category)
                    <span class="card-badge-cat">{{ $portfolio->category->name }}</span>
                @endif
                @if($portfolio->year)
                    <span class="card-badge-year">{{ $portfolio->year }}</span>
                @endif
            </div>

            <div class="card-overlay">
                <span class="card-overlay-label">
                    Lihat Detail
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                        <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>

        <div class="project-meta">
            <div class="project-meta-left">
                <h3 class="project-card-title">{{ $portfolio->title }}</h3>
                @if($portfolio->project_type || $portfolio->room_type)
                    <span class="project-meta-type">{{ $portfolio->project_type ?? $portfolio->room_type }}</span>
                @endif
            </div>
            @if($portfolio->location)
                <span class="project-meta-loc">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    {{ $portfolio->location }}
                </span>
            @endif
        </div>
    </a>
</article>
