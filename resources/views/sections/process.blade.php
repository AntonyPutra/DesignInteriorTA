{{-- Pages 14–15: 09 How We Work (100% Matching PDF Pages 14-15) --}}
<section id="process" class="relative w-full overflow-hidden">
    {{-- Top Half: Wide Horizontal Workshop/Office Photo (Matching PDF Page 14 top) --}}
    <div class="relative w-full h-[320px] sm:h-[420px] lg:h-[520px] overflow-hidden">
        {{-- Header Bar overlaying image --}}
        <div class="absolute inset-x-0 top-0 z-10 max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 pt-6 sm:pt-10 flex items-center justify-between text-xs sm:text-sm tracking-[0.22em] text-white/80 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>
        <img src="{{ asset('assets/images/process.jpg') }}"
             alt="Pratama studio office and workshop space"
             class="w-full h-full object-cover object-center"
             loading="lazy">
    </div>

    {{-- Bottom Half: Olive Band with 7 Steps (Matching PDF Pages 14-15 bottom) --}}
    <div class="w-full bg-olive text-cream py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20">
        <div class="max-w-[1440px] mx-auto">
            {{-- Section Title --}}
            <div class="pb-10 sm:pb-14">
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-cream tracking-tight">
                    09 How We Work
                </h2>
            </div>

            {{-- 7 Steps Grid (Matching PDF: Step Name in Serif, Description in Sans) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 lg:gap-x-14 gap-y-10">
                @php
                    $steps = [
                        [
                            'num' => '01',
                            'title' => 'Meet',
                            'desc' => 'We begin every project with a focused discovery session — listening to the client\'s vision, measuring the space, and understanding how the users will live and move within it. This stage sets the foundation for everything that follows.'
                        ],
                        [
                            'num' => '02',
                            'title' => 'Research',
                            'desc' => 'From the brief, we explore references, map the client\'s preferences, and identify spatial challenges. Brainstorming is done collaboratively so every decision is grounded in real needs — not assumption.'
                        ],
                        [
                            'num' => '03',
                            'title' => 'Concept',
                            'desc' => 'We define the design direction: visual style, atmosphere, material palette, and color language. The concept board gives the client a clear picture of the intended spatial character before any technical work begins.'
                        ],
                        [
                            'num' => '04',
                            'title' => 'Design',
                            'desc' => 'Space planning and layout are refined into detailed floor plans and preliminary 3D models. Every functional zone is considered — circulation, proportion, light, and the relationship between furniture and architecture.'
                        ],
                        [
                            'num' => '05',
                            'title' => 'Finalize',
                            'desc' => 'The approved design is developed into a full documentation package: photorealistic 3D renders, technical drawings, shop drawings, and a detailed bill of quantity — giving contractors and clients a complete reference for execution.'
                        ],
                        [
                            'num' => '06',
                            'title' => 'Create',
                            'desc' => 'Custom furniture and interior elements are produced through our own workshop. Quality is managed in-house — from raw material selection through finishing — ensuring every piece meets the agreed specifications.'
                        ],
                        [
                            'num' => '07',
                            'title' => 'Install',
                            'desc' => 'Our team executes the full on-site installation with precision. After placement, we conduct a thorough quality check and attend to all final touches before handing the completed space over to the client.'
                        ],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="flex flex-col space-y-2">
                        <div class="flex items-baseline gap-3 pb-2 border-b border-cream/15">
                            <span class="font-sans text-xs text-cream/50">{{ $step['num'] }}</span>
                            <h3 class="font-display text-2xl sm:text-3xl text-cream">{{ $step['title'] }}</h3>
                        </div>
                        <p class="font-sans text-[11px] sm:text-xs text-cream/80 leading-relaxed pt-1">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
