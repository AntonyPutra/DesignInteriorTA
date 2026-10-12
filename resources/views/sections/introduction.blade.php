{{-- Page 2: Introduction (100% Faithful to Screenshot 2) --}}
<section id="introduction" class="relative w-full bg-olive text-cream overflow-hidden">
    {{-- Top Olive Band (Matching Screenshot 2 Top Half) --}}
    <div class="max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 pt-12 sm:pt-16 lg:pt-20 pb-14 sm:pb-20">
        {{-- Header Bar: pratamaid. (left) and 2026 (right) --}}
        <div class="flex items-center justify-between pb-12 sm:pb-16 text-xs sm:text-[13px] tracking-[0.22em] text-cream/80 font-sans">
            <span class="lowercase">pratamaid.</span>
            <span>2026</span>
        </div>

        {{-- Main Row: Introduction (Left) and Serif Narrative (Right) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
            <div class="lg:col-span-5">
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl xl:text-7xl text-cream tracking-tight">
                    Introduction
                </h2>
            </div>
            <div class="lg:col-span-7">
                <p class="font-display text-xl sm:text-2xl lg:text-[1.75rem] text-cream/90 font-normal leading-relaxed max-w-2xl">
                    pratamaid. is an interior &amp; exterior design &amp; build established in 2021 in Jakarta, Indonesia.
                </p>
            </div>
        </div>
    </div>

    {{-- Bottom Half: Wide Horizontal Photo with object-bottom to display the sofa, marble tables, and plant --}}
    <div class="relative w-full h-[380px] sm:h-[480px] lg:h-[620px] overflow-hidden bg-olive">
        <img src="{{ asset('assets/images/hero-living.jpg') }}" 
             alt="Warm contemporary living room interior with sectional sofa, bonsai, and circular wall relief" 
             class="w-full h-full object-cover object-bottom"
             loading="lazy">
    </div>
</section>
