{{-- Page 17: 11 Meet Our Principal (100% Matching PDF Page 17) --}}
<section id="principal" class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400">
    <div class="max-w-[1440px] mx-auto">
        {{-- Header Bar --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Main Layout: Left Portrait Photo, Right Bio Text --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            {{-- Left: Founder Portrait Photo (Matching PDF Page 17 left) --}}
            <div class="lg:col-span-5 xl:col-span-5">
                <div class="relative w-full h-[440px] sm:h-[560px] lg:h-[660px] overflow-hidden bg-ink/5">
                    <img src="{{ asset('assets/images/team.png') }}"
                         alt="Kaleb Wahyu Pratama – Founder & CEO"
                         class="w-full h-full object-cover object-top"
                         loading="lazy">
                </div>
            </div>

            {{-- Right: Title + Bio Text + Team Photo (Matching PDF Page 17 right) --}}
            <div class="lg:col-span-7 xl:col-span-7 flex flex-col space-y-6">
                {{-- Section Title --}}
                <h2 class="font-sans font-normal text-4xl sm:text-5xl lg:text-6xl text-ink tracking-tight">
                    11 Meet Our Principal
                </h2>

                {{-- Label & Name --}}
                <div>
                    <span class="font-display text-sm text-ink/70 tracking-wider">Founder &amp; CEO</span>
                    <h3 class="font-sans text-2xl sm:text-3xl text-ink font-normal mt-1">
                        Kaleb Wahyu Pratama
                    </h3>
                </div>

                {{-- Personal Narrative (Matching PDF Page 17 multi-paragraph bio) --}}
                <div class="space-y-4 text-[12.5px] sm:text-[13.5px] leading-[1.7] text-ink/85 font-sans">
                    <p>
                        I started Pratama Design Studio &amp; Build in August 2021, at a time when the interior industry in Indonesia was becoming increasingly competitive. From the beginning, my goal has been to create a studio that delivers design solutions which are not only visually appealing, but also highly functional for the people using the space.
                    </p>
                    <p>
                        Over the past few years, we have had the privilege of working on a wide range of projects — from residential homes and apartments to commercial spaces such as cafés, restaurants, offices, and exhibition booths. Each project has taught us something new and strengthened our ability to adapt to different client needs.
                    </p>
                    <p>
                        What truly drives our work is a commitment to understanding the client. We listen carefully, study their habits and preferences, and translate all of that into a space that feels personal and purposeful.
                    </p>
                    <p>
                        Our team may be small, but we are intentional about quality. With a core studio team and a dedicated workshop, we oversee every detail from concept to installation — ensuring consistency and craftsmanship at every stage.
                    </p>
                    <p>
                        I am grateful for the trust our clients continue to place in us, and I look forward to building more meaningful spaces together.
                    </p>
                </div>

                {{-- Small Team Photo Bottom Right (Matching PDF Page 17) --}}
                <div class="w-full h-40 sm:h-48 overflow-hidden mt-2">
                    <img src="{{ asset('assets/images/about.jpg') }}"
                         alt="Pratama studio interior and team workspace"
                         class="w-full h-full object-cover object-center"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>
