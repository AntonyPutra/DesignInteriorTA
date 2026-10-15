{{-- Pages 7–12: Project Portfolio (100% Matching PDF Pages 7-12) --}}
@php
    $portfolioPages = [
        // Page 7: 03 Landed House Portfolio
        [
            'page_key' => '03_landed',
            'page_num' => '03',
            'page_title' => '03 Landed House Portfolio',
            'projects' => [
                ['title' => 'Rainbow Cluster', 'meta' => 'West Kalimantan', 'image' => asset('assets/images/p-landed-01.jpg')],
                ['title' => 'Kitchen Set', 'meta' => 'Mr. Andy, PIK', 'image' => asset('assets/images/p-landed-02.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mr. Andreas, Cengkareng', 'image' => asset('assets/images/p-landed-03.jpg')],
                ['title' => 'Kitchen Set & Pantry', 'meta' => 'Mrs. Ajeng, Green Garden', 'image' => asset('assets/images/p-landed-04.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. Ody, Jelambar', 'image' => asset('assets/images/p-landed-05.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. Denny, Duri Mas', 'image' => asset('assets/images/service-01.jpg')],
                ['title' => 'Full House', 'meta' => 'Mrs. Chrystia, PIK AKASIA', 'image' => asset('assets/images/service-02.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. Albert, PIK GARDENIA', 'image' => asset('assets/images/service-03.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. David, Taman Semanan', 'image' => asset('assets/images/p-landed-01.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mr. Fahry, Sawangan', 'image' => asset('assets/images/p-landed-03.jpg')],
            ]
        ],

        // Page 8: 04 Landed House Portfolio
        [
            'page_key' => '04_landed',
            'page_num' => '04',
            'page_title' => '04 Landed House Portfolio',
            'projects' => [
                ['title' => 'Full House', 'meta' => 'Mr. Juvin, PIK Garden Island', 'image' => asset('assets/images/p-landed-05.jpg')],
                ['title' => 'Wet Kitchen', 'meta' => 'Mr. Kuson, Blue Ginger Citra 6', 'image' => asset('assets/images/p-landed-02.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mr. Freddy, Kemang Pratama', 'image' => asset('assets/images/p-landed-03.jpg')],
                ['title' => 'Re-Facade', 'meta' => 'Mr. Alyin, Greenlake City', 'image' => asset('assets/images/p-landed-04.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mr. Yono, Lippo Cikarang', 'image' => asset('assets/images/service-01.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. Nelson, Surabaya', 'image' => asset('assets/images/hero-living.jpg')],
                ['title' => 'Full House', 'meta' => 'Mrs. Cindya, Jogjakarta', 'image' => asset('assets/images/statement.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mr. Alvin, Meruya', 'image' => asset('assets/images/service-03.jpg')],
                ['title' => 'Full House', 'meta' => 'Mrs. Utari, Jagakarsa', 'image' => asset('assets/images/service-02.jpg')],
                ['title' => 'Full House', 'meta' => 'Mr. Iwan, Malang', 'image' => asset('assets/images/about.jpg')],
            ]
        ],

        // Page 9: 05 Apartement Unit Portfolio
        [
            'page_key' => '05_apartment',
            'page_num' => '05',
            'page_title' => '05 Apartement Unit Portfolio',
            'projects' => [
                ['title' => 'Full Unit, 3 Bedroom', 'meta' => 'Mr. Vafet, Apt. Meikarta', 'image' => asset('assets/images/p-apartment-01.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mrs. Jesica, Apt. Green Park View', 'image' => asset('assets/images/p-apartment-02.jpg')],
                ['title' => 'Full Unit, Studio', 'meta' => 'Mr. Jemmy, Apt. Pakuwon Bekasi', 'image' => asset('assets/images/p-apartment-03.jpg')],
                ['title' => 'Full Unit, 3 Bedroom', 'meta' => 'Mrs. Irenawati, Apt. CBD Pluit', 'image' => asset('assets/images/p-apartment-01.jpg')],
                ['title' => 'Full Unit, 3 Bedroom', 'meta' => 'Mrs. Grace, Apt. Taman Anggrek', 'image' => asset('assets/images/p-apartment-02.jpg')],
                ['title' => 'Master Bedroom', 'meta' => 'Mrs. Yvone, Apt. Regatta Dubai', 'image' => asset('assets/images/service-01.jpg')],
                ['title' => 'Full Unit, Pent House', 'meta' => 'Mr. Billy, Apt. Hillcrest Karawaci', 'image' => asset('assets/images/p-apartment-03.jpg')],
                ['title' => 'Full Unit, Studio', 'meta' => 'Mr. Yono, Apt. Kamata Lagoon', 'image' => asset('assets/images/service-03.jpg')],
            ]
        ],

        // Page 10: 06 F&B Portfolio (Matching user image 1)
        [
            'page_key' => '06_fnb',
            'page_num' => '06',
            'page_title' => '06 F&B Portfolio',
            'projects' => [
                ['title' => 'Kampung Burger, Depok', 'meta' => '', 'image' => asset('assets/images/p-fnb-01.jpg')],
                ['title' => 'KATA Kopi, PIK', 'meta' => '', 'image' => asset('assets/images/p-fnb-02.jpg')],
                ['title' => 'Muragaru, Gading Serpong', 'meta' => '', 'image' => asset('assets/images/service-02.jpg')],
                ['title' => 'KATA Kopi, Gading Serpong', 'meta' => '', 'image' => asset('assets/images/service-03.jpg')],
                ['title' => 'PanMee, Mangga Besar', 'meta' => '', 'image' => asset('assets/images/p-fnb-03.jpg')],
                ['title' => 'Sama Coffee, Taman Palem', 'meta' => '', 'image' => asset('assets/images/service-01.jpg')],
            ]
        ],

        // Page 11: 07 Booth Portfolio
        [
            'page_key' => '07_booth',
            'page_num' => '07',
            'page_title' => '07 Booth Portfolio',
            'projects' => [
                ['title' => 'Bubee Booth, Tomang', 'meta' => '', 'image' => asset('assets/images/p-booth-01.jpg')],
                ['title' => 'G-Power Booth, ICE BSD', 'meta' => '', 'image' => asset('assets/images/p-booth-02.jpg')],
            ]
        ],

        // Page 12: 08 Office Portfolio
        [
            'page_key' => '08_office',
            'page_num' => '08',
            'page_title' => '08 Office Portfolio',
            'projects' => [
                ['title' => 'Lobby Lift DPR, Fraksi PDIP Nasdem', 'meta' => '', 'image' => asset('assets/images/p-office-01.jpg')],
                ['title' => 'DPR Staff\'s Working Room', 'meta' => '', 'image' => asset('assets/images/p-office-02.jpg')],
                ['title' => 'DPR\'s Private Meeting Room', 'meta' => '', 'image' => asset('assets/images/service-02.jpg')],
                ['title' => 'Reception, PT Momodis, Jakarta', 'meta' => '', 'image' => asset('assets/images/p-office-03.jpg')],
                ['title' => 'Xing Xing Office, Jakarta', 'meta' => '', 'image' => asset('assets/images/service-01.jpg')],
                ['title' => 'NCS POLRI\'s Meeting Room, Jakarta', 'meta' => '', 'image' => asset('assets/images/p-office-04.jpg')],
                ['title' => 'Audi Forensik Room SIBER POLRI', 'meta' => '', 'image' => asset('assets/images/p-office-02.jpg')],
                ['title' => 'Lobby Lift PATI, DITTIPIDSIBER POLRI', 'meta' => '', 'image' => asset('assets/images/p-office-03.jpg')],
                ['title' => 'DITRESSIBER OFFICE, POLDA', 'meta' => '', 'image' => asset('assets/images/p-office-04.jpg')],
            ]
        ],
    ];
@endphp

<section id="portfolio" 
         x-data="{ 
            activePage: '06_fnb',
            portfolioData: {{ Js::from($portfolioPages) }},
            getCurrentPage() {
                return this.portfolioData.find(p => p.page_key === this.activePage) || this.portfolioData[3];
            }
         }" 
         class="relative w-full py-12 sm:py-16 lg:py-20 px-6 sm:px-12 lg:px-20 bg-cream text-ink transition-colors duration-400">
    <div class="max-w-[1440px] mx-auto">
        {{-- Header Bar: pratamaid (left) and 2026 (right) --}}
        <div class="flex items-center justify-between pb-8 sm:pb-12 text-xs sm:text-sm tracking-[0.22em] text-ink/70 font-sans">
            <span class="lowercase">pratamaid</span>
            <span>2026</span>
        </div>

        {{-- Section Title & QR Code (Matching PDF Pages 7-12) --}}
        <div class="flex items-start justify-end gap-6 pb-8">
            <h2 x-text="getCurrentPage().page_title" 
                class="font-sans font-normal text-3xl sm:text-4xl lg:text-5xl text-ink tracking-tight">
                06 F&amp;B Portfolio
            </h2>

            {{-- Stylized QR Code matching PDF --}}
            <div class="w-16 h-16 sm:w-20 sm:h-20 flex-shrink-0 text-ink">
                <svg class="w-full h-full" viewBox="0 0 100 100" fill="currentColor">
                    <rect x="5" y="5" width="28" height="28" rx="1" fill="none" stroke="currentColor" stroke-width="5"/>
                    <rect x="12" y="12" width="14" height="14"/>
                    <rect x="67" y="5" width="28" height="28" rx="1" fill="none" stroke="currentColor" stroke-width="5"/>
                    <rect x="74" y="12" width="14" height="14"/>
                    <rect x="5" y="67" width="28" height="28" rx="1" fill="none" stroke="currentColor" stroke-width="5"/>
                    <rect x="12" y="74" width="14" height="14"/>
                    <rect x="42" y="8" width="6" height="12"/>
                    <rect x="52" y="15" width="8" height="6"/>
                    <rect x="40" y="26" width="18" height="6"/>
                    <rect x="8" y="42" width="14" height="6"/>
                    <rect x="20" y="50" width="10" height="8"/>
                    <rect x="42" y="42" width="16" height="16"/>
                    <rect x="65" y="42" width="10" height="6"/>
                    <rect x="80" y="42" width="12" height="12"/>
                    <rect x="65" y="54" width="8" height="14"/>
                    <rect x="42" y="65" width="8" height="14"/>
                    <rect x="56" y="72" width="14" height="6"/>
                    <rect x="45" y="86" width="18" height="8"/>
                    <rect x="72" y="80" width="20" height="12"/>
                </svg>
            </div>
        </div>

        {{-- Page Switcher Pills (Matching the 6 portfolio sections from PDF) --}}
        <div class="flex flex-wrap items-center gap-2 pb-8 sm:pb-12 text-xs font-sans">
            @foreach($portfolioPages as $pg)
                <button type="button"
                        @click="activePage = '{{ $pg['page_key'] }}'"
                        :class="activePage === '{{ $pg['page_key'] }}' 
                            ? 'bg-olive text-cream' 
                            : 'bg-transparent text-ink/75 hover:text-ink'"
                        class="px-3 py-1.5 border border-ink/20 transition-colors cursor-pointer">
                    {{ $pg['page_num'] }} {{ str_replace(' Portfolio', '', $pg['page_title']) }}
                </button>
            @endforeach
        </div>

        {{-- 5-Column Grid Layout (Matching PDF: Caption ABOVE Image) --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-x-4 sm:gap-x-6 gap-y-8 sm:gap-y-10">
            <template x-for="(item, index) in getCurrentPage().projects" :key="index">
                <div class="flex flex-col">
                    {{-- Caption ABOVE Photo (PDF Rule) --}}
                    <div class="pb-2 text-left min-h-[36px]">
                        <p x-text="item.title" class="font-display text-xs sm:text-[13px] text-ink leading-tight truncate"></p>
                        <p x-show="item.meta" x-text="item.meta" class="font-sans text-[10px] sm:text-[11px] text-ink/70 leading-tight truncate"></p>
                    </div>

                    {{-- Image Container (Sharp Square/Rectangle Aspect Ratio) --}}
                    <div class="relative w-full aspect-square overflow-hidden bg-ink/5">
                        <img :src="item.image" 
                             :alt="item.title" 
                             class="w-full h-full object-cover object-center"
                             loading="lazy">
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
