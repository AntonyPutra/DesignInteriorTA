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

<section class="relative bg-[#2A2219] overflow-hidden py-16 lg:py-24 border-b border-[#3E372C]/40">
    {{-- Geometric background pattern --}}
    <div class="absolute inset-0 opacity-[0.035] pointer-events-none"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    {{-- Right-side Blended Photo with Luxury Gradients --}}
    <div class="absolute inset-y-0 right-0 w-full md:w-3/5 lg:w-1/2 pointer-events-none select-none overflow-hidden">
        {{-- High quality photo from DB --}}
        <img src="{{ $heroImage }}"
             alt="{{ $title }}"
             class="w-full h-full object-cover object-center transform scale-105 motion-safe:transition-transform motion-safe:duration-1000 ease-out opacity-85">

        {{-- Horizontal gradient blend: solid dark #2A2219 on the left seamlessly fading to transparent --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#2A2219] via-[#2A2219]/80 to-transparent"></div>

        {{-- Mobile gradient (stronger coverage on small screens so text is crystal clear) --}}
        <div class="absolute inset-0 bg-gradient-to-b md:hidden from-[#2A2219]/95 via-[#2A2219]/85 to-[#2A2219]"></div>

        {{-- Top & bottom vertical gradient vignette to blend with container edges --}}
        <div class="absolute inset-0 bg-gradient-to-b from-[#2A2219] via-transparent to-[#2A2219]"></div>

        {{-- Warm tint overlay matching brand tones --}}
        <div class="absolute inset-0 bg-[#2A2219]/20 mix-blend-multiply"></div>
    </div>

    {{-- Content Area --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl lg:max-w-2xl">
            {{-- Breadcrumbs --}}
            @if(!empty($breadcrumbs))
            <nav class="flex items-center gap-2 text-xs uppercase tracking-wider mb-4" style="color: rgba(255,255,255,0.5);">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                @foreach($breadcrumbs as $label => $url)
                    <i class="fas fa-chevron-right text-[0.55rem] opacity-60"></i>
                    @if($url && !$loop->last)
                        <a href="{{ $url }}" class="hover:text-white transition-colors">{{ $label }}</a>
                    @else
                        <span style="color: #B85C4A;" class="font-semibold">{{ $label }}</span>
                    @endif
                @endforeach
            </nav>
            @endif

            {{-- Eyebrow --}}
            @if($eyebrow)
            <p class="text-xs font-semibold tracking-[0.2em] uppercase mb-3" style="color: #B85C4A;">
                {{ $eyebrow }}
            </p>
            @endif

            {{-- Title --}}
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-semibold text-white leading-tight tracking-tight"
                style="font-family: 'Cormorant Garamond', Georgia, serif;">
                {{ $title }}
            </h1>

            {{-- Description --}}
            @if($description)
            <p class="mt-4 text-sm sm:text-base leading-relaxed" style="color: rgba(255,255,255,0.72);">
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
