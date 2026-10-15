{{-- Page 5: 02 What We Do (100% Matching PDF Page 5) --}}
<section id="services" class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400">
    <div class="max-w-[1440px] mx-auto">
        {{-- Header Bar: pratamaid (left) and 2026 (right) --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Top 3-Column Layout (Matching PDF Page 5) --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-start pb-12 sm:pb-16">
            {{-- Col 1: Title (md:col-span-4) --}}
            <div class="md:col-span-4">
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                    02 What We Do
                </h2>
            </div>

            {{-- Col 2: 6 Services in Serif Display (md:col-span-4) --}}
            <div class="md:col-span-4 space-y-6 sm:space-y-8 font-display text-xl sm:text-2xl text-ink/90">
                <div>Fit-Out Consultation</div>
                <div>Project Plan and Schedule</div>
                <div>Project Budgeting</div>
                <div>Digital Project Rendering</div>
                <div>Production</div>
                <div>Fit-out and Renovation</div>
            </div>

            {{-- Col 3: Descriptions in Sans (md:col-span-4) --}}
            <div class="md:col-span-4 space-y-6 sm:space-y-8 font-sans text-xs sm:text-[13px] text-ink/75 leading-relaxed">
                <div>Fit-out consultation helps clients plan their space based on needs, budget, and on-site measurements before execution.</div>
                <div>We provide specialist expertise, including design concepts, specifications, and technical drawings.</div>
                <div>Project budgeting manages and controls costs to achieve the best quality within budget.</div>
                <div>Digital project rendering provides a 3D visualization of the design before construction starts.</div>
                <div>Process of manufacturing custom interior elements in the workshop.</div>
                <div>Fit out and renovation execute the approved design to transform the space into a functional environment.</div>
            </div>
        </div>

        {{-- Bottom Photo Strip (Matching PDF Page 5 3-Photo Collage) --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 pt-2">
            <div class="h-56 sm:h-64 lg:h-72 overflow-hidden">
                <img src="{{ asset('assets/images/service-01.jpg') }}" alt="Master bedroom interior" class="w-full h-full object-cover object-center" loading="lazy">
            </div>
            <div class="h-56 sm:h-64 lg:h-72 overflow-hidden">
                <img src="{{ asset('assets/images/service-02.jpg') }}" alt="Contemporary living interior" class="w-full h-full object-cover object-center" loading="lazy">
            </div>
            <div class="h-56 sm:h-64 lg:h-72 overflow-hidden">
                <img src="{{ asset('assets/images/service-03.jpg') }}" alt="Bright apartment bedroom" class="w-full h-full object-cover object-center" loading="lazy">
            </div>
        </div>
    </div>
</section>
