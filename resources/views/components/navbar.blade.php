{{-- Pratama Design Studio - Canonical Site Header --}}
<header class="site-header" id="top">
  <a class="brand" href="{{ route('home') }}" aria-label="Pratama Design Studio">
    <span class="brand-icon">P</span>
    <span class="brand-copy">
      <span class="brand-word">Pratama Design Studio</span>
      <span class="brand-subtitle">Interior Design &amp; Build</span>
    </span>
  </a>

  <nav class="desktop-nav" aria-label="Main navigation">
    <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#home' : route('home') }}">Home</a>
    <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#about' : route('about') }}">About</a>
    <a class="{{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#services' : route('services.index') }}">Services</a>
    <a class="{{ request()->routeIs('portfolio.*') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#portfolio' : route('portfolio.index') }}">Portfolio</a>
    <a class="{{ request()->routeIs('estimator.*') ? 'active' : '' }}" href="{{ route('estimator.index') }}">Cost Estimator</a>
    <a class="{{ request()->routeIs('ai-portfolio.*') ? 'active' : '' }}" href="{{ route('ai-portfolio.index') }}">Cari AI</a>
    <a class="{{ request()->routeIs('ai-estimator.*') ? 'active' : '' }}" href="{{ route('ai-estimator.index') }}">AI Estimator</a>
    <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#contact' : route('contact') }}">Contact</a>
  </nav>

  <div class="header-actions">
    {{-- Dark / Light Mode Switcher (Matching Reference: Rounded Square Button with Moon/Sun Icon) --}}
    <button class="theme-toggle-btn" id="themeToggle" type="button" aria-label="Ganti mode gelap / terang" title="Ganti Mode Gelap / Terang">
      {{-- Moon Icon (shown in Light Mode to switch to Dark) --}}
      <svg class="theme-icon moon-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
      </svg>
      {{-- Sun Icon (shown in Dark Mode to switch to Light) --}}
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

    <a class="consult-button trigger-contact-modal" href="{{ route('consultation.create') }}">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11Z"/>
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
    </div>
  </div>
  <nav aria-label="Mobile navigation">
    <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#home' : route('home') }}">Home</a>
    <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#about' : route('about') }}">About</a>
    <a class="{{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#services' : route('services.index') }}">Services</a>
    <a class="{{ request()->routeIs('portfolio.*') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#portfolio' : route('portfolio.index') }}">Portfolio</a>
    <a class="{{ request()->routeIs('estimator.*') ? 'active' : '' }}" href="{{ route('estimator.index') }}">Cost Estimator</a>
    <a class="{{ request()->routeIs('ai-portfolio.*') ? 'active' : '' }}" href="{{ route('ai-portfolio.index') }}">Cari AI</a>
    <a class="{{ request()->routeIs('ai-estimator.*') ? 'active' : '' }}" href="{{ route('ai-estimator.index') }}">AI Estimator</a>
    <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ request()->routeIs('home') ? '#contact' : route('contact') }}">Contact</a>
  </nav>
</div>

{{-- Subpage Header Spacer: Prevents content from clipping under fixed 80px navbar when not on homepage --}}
@if(!request()->routeIs('home'))
  <div class="site-header-spacer" style="height: 80px; width: 100%; flex-shrink: 0;" aria-hidden="true"></div>
@endif