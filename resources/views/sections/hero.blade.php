{{-- Page 1: Cover / Hero (100% Faithful to Screenshot 1) --}}
<section id="hero" class="relative w-full h-screen min-h-[640px] max-h-[1080px] lg:max-h-none overflow-hidden bg-olive text-cream select-none">
    
    {{-- Global Top Header: "PT Pratama Berkah Utama" (Centered at Top) --}}
    <div class="absolute top-6 sm:top-8 inset-x-0 z-30 text-center pointer-events-none">
        <span class="text-xs sm:text-[13px] font-sans tracking-[0.22em] text-cream/90 font-normal">
            PT Pratama Berkah Utama
        </span>
    </div>

    {{-- Main 2-Column Split Layout --}}
    <div class="w-full h-full grid grid-cols-1 lg:grid-cols-2">
        
        {{-- Left Half (Olive Surface): Company Profile + Logo + Pratama Design Studio --}}
        <div class="h-full bg-olive flex flex-col justify-center px-8 sm:px-12 md:px-16 lg:px-16 xl:px-24 relative z-20">
            <div class="w-full flex flex-col sm:flex-row items-start sm:items-center justify-between gap-8 lg:gap-10 xl:gap-14">
                
                {{-- Left Sub-Column: Company Profile & Stylized Logo Mark --}}
                <div class="flex flex-col items-start space-y-5 sm:space-y-6 shrink-0">
                    <span class="text-xs sm:text-sm font-sans tracking-wide text-cream/80 font-normal">
                        Company Profile
                    </span>
                    <div class="w-16 sm:w-20 lg:w-22 xl:w-24">
                        <img src="{{ asset('assets/images/logo-mark.png') }}" 
                             alt="Pratama geometric logo mark" 
                             class="w-full h-auto drop-shadow-sm">
                    </div>
                </div>

                {{-- Right Sub-Column: Pratama Design Studio Headline --}}
                <div class="flex-1">
                    <h1 class="font-display text-5xl sm:text-6xl md:text-7xl lg:text-7.5xl xl:text-8xl font-normal leading-[0.92] text-cream tracking-tight">
                        Pratama Design
                        <span class="block font-sans font-light text-4xl sm:text-5xl md:text-6xl lg:text-6.5xl xl:text-7xl text-cream mt-1 tracking-tight">
                            Studio
                        </span>
                    </h1>
                </div>
            </div>
        </div>

        {{-- Right Half: Pratama Contractor Overlaid on High-End Interior Photo --}}
        <div class="h-full relative overflow-hidden bg-olive">
            {{-- Room Background Photo (cover-armchair.jpg) --}}
            <img src="{{ asset('assets/images/cover-armchair.jpg') }}" 
                 alt="Luxury contemporary living room interior with terracotta velvet armchair and wood wall panel" 
                 class="absolute inset-0 w-full h-full object-cover object-center scale-100">

            {{-- Floating Overlay matching Screenshot 1 --}}
            <div class="absolute inset-0 flex items-center justify-start lg:justify-center px-8 sm:px-12 lg:px-12 xl:px-16 z-20">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 lg:gap-10">
                    
                    {{-- Company Profile label (Over Photo) --}}
                    <span class="text-xs sm:text-sm font-sans tracking-wide text-white/90 font-normal shrink-0 drop-shadow-sm">
                        Company Profile
                    </span>

                    {{-- Pratama Contractor with Cyan Accent Circle --}}
                    <div class="relative">
                        {{-- Cyan Accent Circle positioned near "P" and circular wall art --}}
                        <span class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-5 w-4 h-4 rounded-full bg-[#00C4CC] shadow-[0_0_12px_rgba(0,196,204,0.6)]" 
                              title="Pratama Contractor Indicator"
                              aria-hidden="true"></span>
                        
                        <h2 class="leading-[0.92]">
                            <span class="block font-display text-5xl sm:text-6xl md:text-7xl lg:text-7.5xl xl:text-8xl font-normal text-white drop-shadow-sm">
                                Pratama
                            </span>
                            <span class="block font-sans font-light text-4xl sm:text-5xl md:text-6xl lg:text-6.5xl xl:text-7xl text-white tracking-tight mt-1 drop-shadow-sm">
                                Contractor
                            </span>
                        </h2>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- Global Bottom Footer: "pratamaid." (Centered at Bottom) --}}
    <div class="absolute bottom-6 sm:bottom-8 inset-x-0 z-30 text-center pointer-events-none">
        <span class="text-xs sm:text-[13px] tracking-[0.22em] text-cream/85 lowercase font-sans font-normal">
            pratamaid.
        </span>
    </div>

</section>
