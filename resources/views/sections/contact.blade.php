{{-- Page 18: 12 Contact Us (100% Matching PDF Page 18) --}}
<footer id="contact" class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400 overflow-hidden">
    <div class="max-w-[1440px] mx-auto relative z-10">
        {{-- Header Bar --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Main Layout: Left (Clay Polygon + Logo) + Right (Title + Contact Info + Photo) --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            {{-- Left Column: Clay/Salmon Polygon + Logo Mark (Matching PDF Page 18) --}}
            <div class="lg:col-span-4 flex items-center justify-center relative min-h-[260px] sm:min-h-[320px]">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-52 h-52 sm:w-64 sm:h-64 bg-clay/25 rotate-45 rounded-md"></div>
                </div>
                <div class="relative z-10 w-24 sm:w-32">
                    <img src="{{ asset('assets/images/logo-mark.png') }}"
                         alt="Pratama geometric mark"
                         class="w-full h-auto drop-shadow-sm">
                </div>
            </div>

            {{-- Right Column: Title + Intro + 2-Column Contact + Photo --}}
            <div class="lg:col-span-8 flex flex-col space-y-8">
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                    12 Contact Us
                </h2>

                <p class="font-sans text-xs sm:text-sm text-ink/80 leading-relaxed max-w-xl">
                    We would love to hear about your project. Whether you are looking for a full interior design service, renovation consultation, or simply want to explore ideas, our team is ready to assist.
                </p>

                {{-- 2-Column Contact Info (Matching PDF Page 18) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-[12.5px] sm:text-[13.5px] leading-[1.7] text-ink/85 font-sans">
                    <div class="space-y-4">
                        <div>
                            <span class="font-display text-sm text-ink/65 block mb-1">Contact</span>
                            <p>+62 822 1364 1995</p>
                        </div>
                        <div>
                            <span class="font-display text-sm text-ink/65 block mb-1">Address</span>
                            <p>Puri Orchard Apt. Orange Grove 21/09, Jakarta Barat 11740</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <span class="font-display text-sm text-ink/65 block mb-1">Instagram</span>
                            <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener noreferrer" class="hover:text-ink transition-colors">
                                @pratamaid.studio
                            </a>
                        </div>
                        <div>
                            <span class="font-display text-sm text-ink/65 block mb-1">Email</span>
                            <a href="mailto:pratamadsb@gmail.com" class="hover:text-ink transition-colors">
                                pratamadsb@gmail.com
                            </a>
                        </div>
                        <div>
                            <span class="font-display text-sm text-ink/65 block mb-1">Website</span>
                            <a href="https://pratamadesign.com" target="_blank" rel="noopener noreferrer" class="hover:text-ink transition-colors">
                                pratamadesign.com
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Bottom Right Photo (Matching PDF Page 18 photo) --}}
                <div class="w-full h-40 sm:h-52 overflow-hidden mt-2">
                    <img src="{{ asset('assets/images/service-03.jpg') }}"
                         alt="Office and studio interior"
                         class="w-full h-full object-cover object-center"
                         loading="lazy">
                </div>
            </div>
        </div>

        {{-- Consultation CTA --}}
        <div class="mt-12 sm:mt-16 pt-8 border-t border-ink/10 flex flex-col sm:flex-row items-center justify-between gap-6">
            <p class="font-sans text-xs text-ink/60">
                &copy; 2026 PT Pratama Berkah Utama. All rights reserved. Interior &amp; Exterior Design &middot; Jakarta.
            </p>
            <button type="button"
                    @click="$dispatch('open-consultation')"
                    class="px-6 py-3 bg-olive text-cream font-sans text-xs tracking-wider uppercase transition-all duration-200 hover:opacity-90 cursor-pointer flex items-center gap-3">
                <span>Start Consultation</span>
                <span aria-hidden="true">&rarr;</span>
            </button>
        </div>
    </div>
</footer>
