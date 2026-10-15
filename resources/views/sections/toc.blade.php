{{-- Page 3: Table Of Contents (100% Faithful to Screenshot 3) --}}
<section id="toc" class="relative w-full py-12 sm:py-16 lg:py-20 bg-cream text-ink transition-colors duration-400">
    {{-- Header & Title Container --}}
    <div class="max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20">
        {{-- Header Bar: pratamaid (left) and 2026 (right) --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-[13px] tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Centered Title --}}
        <div class="text-center pb-12 sm:pb-16 lg:pb-20">
            <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                Table Of Contents
            </h2>
        </div>
    </div>

    {{-- Bottom Two-Column Area (Left image flush to edge on large screens, matching Screenshot 3) --}}
    <div class="w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 xl:gap-16 items-start">
            
            {{-- Left: Bedroom Photo with Hanging Glass Globe Lamp (Flush to left on desktop) --}}
            <div class="lg:col-span-7 xl:col-span-8">
                <div class="relative w-full h-[360px] sm:h-[480px] lg:h-[620px] overflow-hidden">
                    <img src="{{ asset('assets/images/toc-bedroom.jpg') }}" 
                         alt="Contemporary bedroom with fluted wood headboard and illuminated triple-globe pendant light" 
                         class="w-full h-full object-cover object-center"
                         loading="lazy">
                </div>
            </div>

            {{-- Right: Numbered Index & Editorial Quote --}}
            <div class="lg:col-span-5 xl:col-span-4 px-6 sm:px-12 lg:px-0 lg:pr-12 xl:pr-20 flex flex-col justify-between h-full min-h-[360px] sm:min-h-[480px] lg:min-h-[620px] py-2">
                {{-- Index List --}}
                <nav class="space-y-3.5 sm:space-y-4 text-xs sm:text-[13px] font-sans" aria-label="Daftar Isi">
                    @php
                        $toc = [
                            ['title' => 'About Us',             'num' => '01',    'link' => '#about'],
                            ['title' => 'What we do',           'num' => '02',    'link' => '#services'],
                            ['title' => 'Project portfolio',    'num' => '03-08', 'link' => '#portfolio'],
                            ['title' => 'How we work',          'num' => '09',    'link' => '#process'],
                            ['title' => 'Price list',           'num' => '10',    'link' => '#pricing'],
                            ['title' => 'Meet our Principal',   'num' => '11',    'link' => '#principal'],
                            ['title' => 'Contact Us',           'num' => '12',    'link' => '#contact'],
                        ];
                    @endphp

                    @foreach($toc as $item)
                        <a href="{{ $item['link'] }}" 
                           class="flex items-baseline justify-between py-1 text-ink/90 hover:text-ink transition-colors group">
                            <span class="group-hover:translate-x-1 transition-transform duration-200">
                                {{ $item['title'] }}
                            </span>
                            <span class="font-light text-ink/75 tabular-nums">
                                {{ $item['num'] }}
                            </span>
                        </a>
                    @endforeach
                </nav>

                {{-- Bottom Editorial Note --}}
                <div class="pt-8 sm:pt-12">
                    <p class="font-sans text-[11px] sm:text-xs text-ink/75 leading-relaxed max-w-sm">
                        A harmonious blend of function and aesthetic interior design , our style combines with all the color, ambiances, form, ultra premium textures, warmth, and expressive elegance .
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
