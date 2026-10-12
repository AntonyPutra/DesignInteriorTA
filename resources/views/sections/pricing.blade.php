{{-- Page 16: 10 Price List (100% Matching PDF Page 16) --}}
<section id="pricing" class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400 overflow-hidden">
    <div class="max-w-[1440px] mx-auto relative z-10">
        {{-- Header Bar --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Main Layout: Left Decorative (Clay Polygon + Logo) + Right Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start pb-12 sm:pb-16">
            {{-- Left Column: Clay/Salmon Geometric Shape + Logo Mark (Matching PDF Page 16) --}}
            <div class="lg:col-span-4 flex items-center justify-center relative min-h-[260px] sm:min-h-[320px]">
                {{-- Clay Polygon Background --}}
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-52 h-52 sm:w-64 sm:h-64 bg-clay/25 rotate-45 rounded-md"></div>
                </div>
                {{-- Logo Mark on top --}}
                <div class="relative z-10 w-24 sm:w-32">
                    <img src="{{ asset('assets/images/logo-mark.png') }}"
                         alt="Pratama geometric mark"
                         class="w-full h-auto drop-shadow-sm">
                </div>
            </div>

            {{-- Right Column: Section Title + 2-Column Pricing Text --}}
            <div class="lg:col-span-8 flex flex-col space-y-8">
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                    10 Price list
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-[12.5px] sm:text-[13.5px] leading-[1.7] text-ink/85 font-sans">
                    {{-- Column 1: Design & Consulting --}}
                    <div class="space-y-4">
                        <h3 class="font-display text-xl sm:text-2xl text-ink">Design &amp; Consulting</h3>
                        <p>
                            Interior design fee: <strong>IDR 150,000 – 250,000 / sqm</strong>
                        </p>
                        <p>
                            Interior + exterior design package: <strong>IDR 350,000 – 400,000 / sqm</strong>
                        </p>
                        <p class="text-ink/70 text-xs">
                            Pricing is flexible and subject to project scope, specifications, and other relevant factors.
                        </p>
                    </div>

                    {{-- Column 2: Renovation Cost --}}
                    <div class="space-y-4">
                        <h3 class="font-display text-xl sm:text-2xl text-ink">Renovation Cost</h3>
                        <p>
                            Custom production has no fixed standard price. Cost is determined by project area, specifications, and material grade.
                        </p>
                        <p>
                            A detailed <strong>Bill of Quantity (BOQ)</strong> is prepared before project agreement.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Photo Strip (Matching PDF Page 16 bottom image) --}}
        <div class="w-full h-48 sm:h-56 lg:h-72 overflow-hidden">
            <img src="{{ asset('assets/images/p-booth-02.jpg') }}"
                 alt="G-Power exhibition booth production"
                 class="w-full h-full object-cover object-center"
                 loading="lazy">
        </div>
    </div>
</section>
