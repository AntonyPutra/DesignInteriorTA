{{-- Page 19: Thank You / Outro (100% Matching PDF Page 19) --}}
<section class="relative w-full min-h-[400px] sm:min-h-[500px] lg:min-h-[600px] grid grid-cols-1 lg:grid-cols-2 bg-olive text-cream overflow-hidden">
    {{-- Left Half: Olive with Thankyou + Logo + Brand --}}
    <div class="relative flex flex-col justify-between p-8 sm:p-12 lg:p-16 xl:p-20 min-h-[360px] lg:min-h-[600px] bg-olive text-cream z-10">
        <div></div>

        <div class="my-auto py-10 flex flex-col items-start space-y-6">
            <h2 class="font-display text-5xl sm:text-6xl lg:text-7xl text-cream tracking-tight">
                Thankyou
            </h2>
            <div class="w-16 sm:w-20">
                <img src="{{ asset('assets/images/logo-mark.png') }}"
                     alt="Pratama geometric mark"
                     class="w-full h-auto drop-shadow-sm">
            </div>
            <div>
                <span class="font-display text-3xl sm:text-4xl text-cream block leading-tight">Pratama Design</span>
                <span class="font-sans font-light text-2xl sm:text-3xl text-cream block mt-1">Studio</span>
            </div>
        </div>

        <div class="w-full text-center">
            <span class="text-xs sm:text-sm tracking-[0.22em] text-cream/80 lowercase font-sans">
                pratamaid.
            </span>
        </div>
    </div>

    {{-- Right Half: Photo with Thankyou Overlay --}}
    <div class="relative w-full h-[360px] lg:h-full min-h-full overflow-hidden bg-olive">
        <img src="{{ asset('assets/images/hero-living.jpg') }}"
             alt="Contemporary luxury interior"
             class="absolute inset-0 w-full h-full object-cover object-center">
        <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
            <div class="text-center">
                <span class="block font-display text-4xl sm:text-5xl lg:text-6xl text-white drop-shadow-md">
                    Thankyou
                </span>
                <span class="block font-sans font-light text-3xl sm:text-4xl lg:text-5xl text-white/95 tracking-tight mt-2 drop-shadow-md">
                    Pratama Contractor
                </span>
            </div>
        </div>
    </div>
</section>
