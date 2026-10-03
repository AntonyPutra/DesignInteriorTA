{{-- Navbar Component --}}
{{-- Hidden on top of homepage until scrolled to About Us, fixed on other pages --}}

@php
    $isHome = request()->routeIs('home');
@endphp

<nav id="main-navbar"
     x-data="{ open: false, activeSection: 'home' }"
     class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md transition-all duration-300 ease-in-out {{ $isHome ? '-translate-y-full opacity-0 pointer-events-none' : 'translate-y-0 opacity-100 shadow-sm' }}"
     style="border-bottom: 1px solid #E5E0D8;">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[72px]">

            {{-- Brand / Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded flex items-center justify-center flex-shrink-0 transition-transform duration-200 group-hover:scale-105"
                     style="background-color: #2E2A23;">
                    <span class="text-white font-bold text-base leading-none font-display tracking-widest">P</span>
                </div>
                <div class="leading-tight">
                    <div class="font-semibold tracking-wide leading-none"
                         style="font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: #221F1B;">
                        Pratama Design Studio
                    </div>
                    <div class="text-[9.5px] tracking-[0.2em] uppercase font-semibold mt-1"
                         style="color: #8C7355;">INTERIOR DESIGN & BUILD</div>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ $isHome ? '#hero' : route('home') }}"
                   @click="activeSection = 'home'"
                   :class="activeSection === 'home' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    Home
                    <span :class="activeSection === 'home' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>

                <a href="{{ $isHome ? '#about-us-section' : route('about') }}"
                   @click="activeSection = 'about'"
                   :class="activeSection === 'about' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    About
                    <span :class="activeSection === 'about' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>

                <a href="{{ $isHome ? '#services-section' : route('services.index') }}"
                   @click="activeSection = 'services'"
                   :class="activeSection === 'services' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    Services
                    <span :class="activeSection === 'services' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>

                <a href="{{ route('portfolio.index') }}"
                   @click="activeSection = 'portfolio'"
                   :class="activeSection === 'portfolio' || '{{ request()->routeIs('portfolio.*') }}' === '1' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    Portfolio
                    <span :class="activeSection === 'portfolio' || '{{ request()->routeIs('portfolio.*') }}' === '1' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>

                <a href="{{ route('estimator.index') }}"
                   @click="activeSection = 'estimator'"
                   :class="activeSection === 'estimator' || '{{ request()->routeIs('estimator.*') }}' === '1' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    Cost Estimator
                    <span :class="activeSection === 'estimator' || '{{ request()->routeIs('estimator.*') }}' === '1' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>

                <a href="{{ route('contact') }}"
                   @click="activeSection = 'contact'"
                   :class="activeSection === 'contact' || '{{ request()->routeIs('contact') }}' === '1' ? 'text-[#B85C4A] font-semibold' : 'text-[#4A453E] hover:text-[#B85C4A]'"
                   class="relative text-[13.5px] font-medium tracking-wide transition-colors py-1 group">
                    Contact
                    <span :class="activeSection === 'contact' || '{{ request()->routeIs('contact') }}' === '1' ? 'w-full' : 'w-0 group-hover:w-full'"
                          class="absolute -bottom-0.5 left-0 h-[2px] rounded-full transition-all duration-200 bg-[#B85C4A]"></span>
                </a>
            </div>

            {{-- Desktop CTA + Mobile Hamburger --}}
            <div class="flex items-center gap-3">
                <button class="theme-toggle-btn" type="button" aria-label="Ganti mode gelap / terang" title="Ganti Mode Gelap / Terang">
                    <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    <svg class="theme-icon sun-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </button>

                <a href="{{ route('consultation.create') }}"
                   class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-md text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:opacity-90 hover:shadow-md hover:-translate-y-0.5 active:translate-y-0"
                   style="background-color: #B85C4A;">
                    <i class="fas fa-comment-dots text-xs"></i>
                    Konsultasi
                </a>

                {{-- Mobile Menu Button --}}
                <button @click="open = !open"
                        class="lg:hidden w-9 h-9 flex items-center justify-center rounded text-gray-700 hover:bg-gray-100 transition-colors"
                        :aria-expanded="open">
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
         style="border-color: #E5E0D8; display: none;">

        <a href="{{ $isHome ? '#hero' : route('home') }}"
           @click="open = false; activeSection = 'home'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-home w-4 text-center text-[#8C7355]"></i>
            Home
        </a>
        <a href="{{ $isHome ? '#about-us-section' : route('about') }}"
           @click="open = false; activeSection = 'about'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-building w-4 text-center text-[#8C7355]"></i>
            About
        </a>
        <a href="{{ $isHome ? '#services-section' : route('services.index') }}"
           @click="open = false; activeSection = 'services'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-layer-group w-4 text-center text-[#8C7355]"></i>
            Services
        </a>
        <a href="{{ route('portfolio.index') }}"
           @click="open = false; activeSection = 'portfolio'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-images w-4 text-center text-[#8C7355]"></i>
            Portfolio
        </a>
        <a href="{{ route('estimator.index') }}"
           @click="open = false; activeSection = 'estimator'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-calculator w-4 text-center text-[#8C7355]"></i>
            Cost Estimator
        </a>
        <a href="{{ route('contact') }}"
           @click="open = false; activeSection = 'contact'"
           class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-sm font-medium transition-colors hover:bg-gray-50 text-gray-800">
            <i class="fas fa-envelope w-4 text-center text-[#8C7355]"></i>
            Contact
        </a>

        <div class="pt-3 border-t border-[#E5E0D8]">
            <a href="{{ route('consultation.create') }}"
               class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-lg text-xs font-semibold uppercase tracking-wider text-white transition-opacity hover:opacity-90"
               style="background-color: #B85C4A;">
                <i class="fas fa-comment-dots"></i>
                Konsultasi Sekarang
            </a>
        </div>
    </div>
</nav>

{{-- Spacer ONLY for non-homepage pages so content is not behind fixed navbar --}}
@if(!$isHome)
<div style="height: 72px;"></div>
@endif
