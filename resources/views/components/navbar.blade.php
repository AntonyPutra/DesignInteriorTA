{{-- Navbar Component --}}
<nav id="main-navbar"
     x-data="{ open: false }"
     class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md transition-all duration-300 ease-in-out border-b"
     style="border-color: #E8E3DC;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[72px]">

            {{-- Brand / Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 transition-transform duration-200 group-hover:scale-105 shadow-sm"
                     style="background-color: #2E2A23;">
                    <span class="text-white font-bold text-lg leading-none font-display tracking-widest">P</span>
                </div>
                <div class="leading-tight">
                    <div class="font-semibold tracking-wide leading-none"
                         style="font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; color: #2E2A23;">
                        Pratama Design Studio
                    </div>
                    <div class="text-[9.5px] tracking-[0.2em] uppercase font-semibold mt-1"
                         style="color: #8C7355;">Interior Design & Build</div>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center gap-7">
                @php
                    $navLinks = [
                        ['route' => 'home',            'label' => 'Home',            'match' => 'home'],
                        ['route' => 'about',           'label' => 'About',           'match' => 'about'],
                        ['route' => 'services.index',  'label' => 'Services',        'match' => 'services.*'],
                        ['route' => 'portfolio.index', 'label' => 'Portfolio',       'match' => 'portfolio.*'],
                        ['route' => 'estimator.index', 'label' => 'Cost Estimator',  'match' => 'estimator.*'],
                        ['route' => 'contact',         'label' => 'Contact',         'match' => 'contact'],
                        ['route' => 'ai-portfolio.index', 'label' => 'Cari AI',      'match' => 'ai-portfolio.*', 'icon' => 'fas fa-search'],
                        ['route' => 'ai-estimator.index', 'label' => 'AI Estimator', 'match' => 'ai-estimator.*', 'icon' => 'fas fa-robot'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="relative text-sm font-medium transition-colors duration-200 pb-0.5 group
                              {{ request()->routeIs($link['match']) ? 'font-semibold' : '' }}"
                       style="{{ request()->routeIs($link['match']) ? 'color: #B85C4A;' : 'color: #4A453E;' }}">
                        @if(isset($link['icon']))
                            <i class="{{ $link['icon'] }} text-xs mr-1 opacity-70"></i>
                        @endif
                        {{ $link['label'] }}
                        {{-- Active indicator --}}
                        <span class="absolute -bottom-0.5 left-0 h-0.5 rounded-full transition-all duration-300
                                     {{ request()->routeIs($link['match']) ? 'w-full' : 'w-0 group-hover:w-full' }}"
                              style="background-color: #B85C4A;"></span>
                    </a>
                @endforeach
            </div>

            {{-- Desktop CTA + Mobile Toggle --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('consultation.create') }}"
                   class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-md text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-90 hover:shadow-md hover:-translate-y-0.5 active:translate-y-0"
                   style="background-color: #B85C4A;">
                    <i class="fas fa-comment-dots text-xs"></i>
                    Konsultasi
                </a>

                {{-- Mobile Hamburger --}}
                <button @click="open = !open"
                        class="lg:hidden w-9 h-9 flex items-center justify-center rounded text-gray-700 hover:bg-gray-100 transition-colors"
                        :aria-expanded="open"
                        aria-label="Menu navigasi">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Dropdown Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden bg-white border-t px-4 pt-3 pb-5 space-y-1 shadow-xl"
         style="border-color: #E8E3DC; display: none;">

        <a href="{{ route('home') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('home') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('home') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-home w-4 text-center text-[#8C7355]"></i>
            Home
        </a>
        <a href="{{ route('about') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('about') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('about') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-building w-4 text-center text-[#8C7355]"></i>
            About
        </a>
        <a href="{{ route('services.index') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('services.*') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('services.*') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-layer-group w-4 text-center text-[#8C7355]"></i>
            Services
        </a>
        <a href="{{ route('portfolio.index') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('portfolio.*') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('portfolio.*') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-images w-4 text-center text-[#8C7355]"></i>
            Portfolio
        </a>
        <a href="{{ route('estimator.index') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('estimator.*') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('estimator.*') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-calculator w-4 text-center text-[#8C7355]"></i>
            Cost Estimator
        </a>
        <a href="{{ route('contact') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('contact') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('contact') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-envelope w-4 text-center text-[#8C7355]"></i>
            Contact
        </a>
        <a href="{{ route('ai-portfolio.index') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('ai-portfolio.*') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('ai-portfolio.*') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-search w-4 text-center text-[#8C7355]"></i>
            Cari AI
        </a>
        <a href="{{ route('ai-estimator.index') }}"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50
                  {{ request()->routeIs('ai-estimator.*') ? 'font-semibold' : 'text-gray-800' }}"
           style="{{ request()->routeIs('ai-estimator.*') ? 'color: #B85C4A; background-color: #FEF6F4;' : '' }}">
            <i class="fas fa-robot w-4 text-center text-[#8C7355]"></i>
            AI Estimator
        </a>

        <div class="pt-3 border-t" style="border-color: #E8E3DC;">
            <a href="{{ route('consultation.create') }}"
               class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-lg text-xs font-semibold uppercase tracking-wider text-white transition-opacity hover:opacity-90"
               style="background-color: #B85C4A;">
                <i class="fas fa-comment-dots"></i>
                Konsultasi Sekarang
            </a>
        </div>
    </div>
</nav>

{{-- Navbar spacer --}}
<div style="height: 72px;"></div>
