@props([
    'title',
    'eyebrow' => null,
    'description' => null,
    'breadcrumbs' => [],
    'image' => null,
    'imageKeyword' => null,
])

@php
    $heroImage = $image ?: \App\Models\Portfolio::getHeaderImage($imageKeyword);
@endphp

<section class="subpage-hero-banner relative overflow-hidden py-16 md:py-20 lg:py-24 border-b"
         style="background-color: #161310; border-color: rgba(255, 255, 255, 0.08);">

    {{-- Full-Width Background Photo with Fit, Optical Blur, & Cinematic Studio Overlays --}}
    <div class="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden">
        {{-- Full background photo scaled and gently blurred to fit the entire header area --}}
        <img src="{{ $heroImage }}"
             alt="{{ $title }}"
             class="w-full h-full object-cover object-center transform scale-105 motion-safe:transition-transform motion-safe:duration-1000 ease-out"
             style="filter: blur(4px) brightness(0.62); transform: scale(1.08);">

        {{-- 1. Horizontal gradient: Deep warm studio dark on the text side, smoothly opening up across the banner --}}
        <div class="absolute inset-0"
             style="background: linear-gradient(90deg, rgba(16, 13, 10, 0.96) 0%, rgba(22, 18, 14, 0.85) 45%, rgba(28, 22, 17, 0.68) 100%);"></div>

        {{-- 2. Vertical top & bottom vignette: seamless blend into sticky header and content section --}}
        <div class="absolute inset-0"
             style="background: linear-gradient(180deg, rgba(14, 11, 8, 0.75) 0%, transparent 40%, rgba(14, 11, 8, 0.9) 100%);"></div>

        {{-- 3. Subtle ambient studio terracotta radial glow --}}
        <div class="absolute inset-0"
             style="background: radial-gradient(circle at 85% 25%, rgba(181, 91, 72, 0.22) 0%, transparent 65%);"></div>

        {{-- 4. Architectural grid line accent pattern --}}
        <div class="absolute inset-0 opacity-[0.03]"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        {{-- 5. Backdrop blur layer --}}
        <div class="absolute inset-0 backdrop-blur-[2px]"></div>
    </div>

    {{-- Content Area --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl lg:max-w-3xl">
            {{-- Breadcrumbs --}}
            @if(!empty($breadcrumbs))
            <nav class="flex items-center gap-2 text-xs uppercase tracking-wider mb-4" style="color: rgba(255,255,255,0.65);">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                @foreach($breadcrumbs as $label => $url)
                    <i class="fas fa-chevron-right text-[0.55rem] opacity-60"></i>
                    @if($url && !$loop->last)
                        <a href="{{ $url }}" class="hover:text-white transition-colors">{{ $label }}</a>
                    @else
                        <span style="color: #f7a696;" class="font-semibold">{{ $label }}</span>
                    @endif
                @endforeach
            </nav>
            @endif

            {{-- Eyebrow --}}
            @if($eyebrow)
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold tracking-[0.2em] uppercase mb-3.5 border shadow-sm"
                 style="background-color: rgba(181, 91, 72, 0.22); color: #f7a696; border-color: rgba(181, 91, 72, 0.38);">
                <span class="w-1.5 h-1.5 rounded-full" style="background-color: var(--accent);"></span>
                {{ $eyebrow }}
            </div>
            @endif

            {{-- Title --}}
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-semibold text-white leading-tight tracking-tight drop-shadow-sm"
                style="font-family: var(--serif);">
                {{ $title }}
            </h1>

            {{-- Description --}}
            @if($description)
            <p class="mt-4 text-sm sm:text-base leading-relaxed" style="color: rgba(255,255,255,0.85); text-shadow: 0 1px 3px rgba(0,0,0,0.4);">
                {{ $description }}
            </p>
            @endif

            {{-- Optional extra slot (e.g. pills, badges, tabs) --}}
            @if(isset($slot) && $slot->isNotEmpty())
            <div class="mt-6">
                {{ $slot }}
            </div>
            @endif
        </div>
    </div>
</section>
