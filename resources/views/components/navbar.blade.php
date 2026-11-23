{{-- Pratama Design Studio - Canonical Site Header --}}
<header class="site-header" id="top">
  <a class="brand" href="{{ route('home') }}" aria-label="Pratama Design Studio">
    <span class="brand-icon">
      <img src="{{ asset('assets/images/logo-mark.png') }}?v=3"
        onerror="this.onerror=null; this.src='/assets/images/logo-mark.png?v=3';"
        alt="Pratama Design Studio"
        class="h-9 md:h-10 w-auto object-contain block">
    </span>
    <span class="brand-copy">
      <span class="brand-word">Pratama Design Studio</span>
      <span class="brand-subtitle">Interior Design &amp; Build</span>
    </span>
  </a>

  <nav class="desktop-nav" aria-label="Main navigation">
    <a class="{{ request()->routeIs('home') ? 'active' : '' }}"
      href="{{ route('home') }}">Home</a>
    <a class="{{ request()->routeIs('about') ? 'active' : '' }}"
      href="{{ route('about') }}">About</a>
    <a class="{{ request()->routeIs('services.*') ? 'active' : '' }}"
      href="{{ route('services.index') }}">Services</a>
    <a class="{{ request()->routeIs('portfolio.*') ? 'active' : '' }}"
      href="{{ route('portfolio.index') }}">Portfolio</a>
    <a class="{{ request()->routeIs('ai-portfolio.*') ? 'active' : '' }}" href="{{ route('ai-portfolio.index') }}">Cari
      AI</a>

    {{-- Estimator Dropdown for compact 13" laptop viewports --}}
    <div class="nav-dropdown-wrapper relative group" x-data="{ open: false }" @mouseenter="open = true"
      @mouseleave="open = false">
      <button type="button" @click="open = !open"
        class="nav-dropdown-trigger flex items-center gap-1.5 transition-colors cursor-pointer {{ request()->routeIs('estimator.*') || request()->routeIs('ai-estimator.*') ? 'active font-semibold' : '' }}"
        :class="{ 'active': open }" aria-haspopup="true" :aria-expanded="open">
        <span>Estimator</span>
        <svg class="w-3.5 h-3.5 transition-transform duration-200 opacity-70 group-hover:opacity-100"
          :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </button>
      <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="nav-dropdown-menu absolute left-0 top-full mt-2 w-60 rounded-xl shadow-xl py-2 z-50 border backdrop-blur-md"
        style="background-color: var(--card-bg); border-color: var(--card-border);">
        <a href="{{ route('estimator.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-xs transition-colors hover:bg-black/5 dark:hover:bg-white/5 {{ request()->routeIs('estimator.*') ? 'font-semibold' : '' }}"
          style="{{ request()->routeIs('estimator.*') ? 'color: var(--accent);' : 'color: var(--ink);' }}">
          <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0"
            style="background-color: rgba(181,91,72,0.12); color: var(--accent);">
            <i class="fas fa-calculator text-xs"></i>
          </div>
          <div>
            <div class="font-semibold text-xs leading-tight">Cost Estimator</div>
            <div class="text-[10px] opacity-70 mt-0.5">Kalkulator Standar RAB</div>
          </div>
        </a>
        <a href="{{ route('ai-estimator.index') }}"
          class="flex items-center gap-3 px-4 py-2.5 text-xs transition-colors hover:bg-black/5 dark:hover:bg-white/5 {{ request()->routeIs('ai-estimator.*') ? 'font-semibold' : '' }}"
          style="{{ request()->routeIs('ai-estimator.*') ? 'color: var(--accent);' : 'color: var(--ink);' }}">
          <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0"
            style="background-color: rgba(181,91,72,0.12); color: var(--accent);">
            <i class="fas fa-magic text-xs"></i>
          </div>
          <div>
            <div class="font-semibold text-xs leading-tight">AI Smart Estimator</div>
            <div class="text-[10px] opacity-70 mt-0.5">RAB Otomatis via AI</div>
          </div>
        </a>
      </div>
    </div>

    <a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
      href="{{ route('contact') }}">Contact</a>
  </nav>

  <div class="header-actions">
    {{-- Dark / Light Mode Switcher (Matching Reference: Rounded Square Button with Moon/Sun Icon) --}}
    <button class="theme-toggle-btn" id="themeToggle" type="button" aria-label="Ganti mode gelap / terang"
      title="Ganti Mode Gelap / Terang">
      {{-- Moon Icon (shown in Light Mode to switch to Dark) --}}
      <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
      </svg>
      {{-- Sun Icon (shown in Dark Mode to switch to Light) --}}
      <svg class="theme-icon sun-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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

    <a class="consult-button trigger-contact-modal" href="{{ route('consultation.create') }}">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path
          d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11Z" />
      </svg>
      <span>Konsultasi</span>
    </a>

    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false">
      <span></span><span></span>
    </button>
  </div>
</header>

{{-- Mobile Navigation Dropdown --}}
<div class="mobile-menu" aria-hidden="true">
  <div class="mobile-menu-top">
    <div class="mobile-theme-switch-wrap">
      <span class="mobile-theme-text">Mode Tampilan</span>
      <button class="theme-toggle-btn mobile-theme-toggle" type="button" aria-label="Ganti mode gelap / terang">
        <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
        <svg class="theme-icon sun-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
    </div>
  </div>
  <nav aria-label="Mobile navigation">
    <a class="{{ request()->routeIs('home') ? 'active' : '' }}"
      href="{{ route('home') }}">Home</a>
    <a class="{{ request()->routeIs('about') ? 'active' : '' }}"
      href="{{ route('about') }}">About</a>
    <a class="{{ request()->routeIs('services.*') ? 'active' : '' }}"
      href="{{ route('services.index') }}">Services</a>
    <a class="{{ request()->routeIs('portfolio.*') ? 'active' : '' }}"
      href="{{ route('portfolio.index') }}">Portfolio</a>
    <a class="{{ request()->routeIs('ai-portfolio.*') ? 'active' : '' }}" href="{{ route('ai-portfolio.index') }}">Cari
      AI Portofolio</a>
    <div class="mobile-estimator-group py-1 my-1 border-y" style="border-color: rgba(255,255,255,0.08);">
      <div class="px-4 py-1 text-[10px] font-semibold tracking-wider uppercase" style="color: var(--accent);">Kalkulator
        Estimasi</div>
      <a class="{{ request()->routeIs('estimator.*') ? 'active' : '' }} pl-6 flex items-center gap-2"
        href="{{ route('estimator.index') }}">
        <i class="fas fa-calculator text-xs opacity-75"></i> Cost Estimator
      </a>
      <a class="{{ request()->routeIs('ai-estimator.*') ? 'active' : '' }} pl-6 flex items-center gap-2"
        href="{{ route('ai-estimator.index') }}">
        <i class="fas fa-magic text-xs opacity-75"></i> AI Smart Estimator
      </a>
    </div>
    <a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
      href="{{ route('contact') }}">Contact</a>
  </nav>
</div>

{{-- Subpage Header Spacer: Prevents content from clipping under fixed 80px navbar when not on homepage --}}
@if(!request()->routeIs('home'))
  <div class="site-header-spacer" style="height: 80px; width: 100%; flex-shrink: 0;" aria-hidden="true"></div>
@endif