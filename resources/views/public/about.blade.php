@extends('layouts.app')

@section('title', 'Tentang Kami — Pratama Design Studio')
@section('meta_description', 'Tentang Pratama Design Studio — PT Pratama Berkah Utama. Perusahaan desain interior & exterior design & build berdiri 2021 di Jakarta. Profil, Visi, Misi, dan Keunggulan kami.')

@section('content')

  {{-- ============================================================ --}}
  {{-- SITE HEADER (Always Visible on Subpages)                     --}}
  {{-- ============================================================ --}}
  <header class="site-header is-subpage is-visible" id="top">
    <a class="brand" href="{{ route('home') }}" aria-label="Pratamaid home">
      <span class="brand-icon">P</span>
      <span class="brand-copy">
        <span class="brand-word">Pratama Design Studio</span>
        <span class="brand-subtitle">Interior Design &amp; Build</span>
      </span>
    </a>

    <nav class="desktop-nav" aria-label="Navigasi utama">
      <a href="{{ route('home') }}" data-i18n="nav.home">Beranda</a>
      <a class="active" href="{{ route('about') }}" data-i18n="nav.about">Tentang</a>
      <a href="{{ route('home') }}#services" data-i18n="nav.services">Layanan</a>
      <a href="{{ route('portfolio.index') }}" data-i18n="nav.portfolio">Portofolio</a>
      <a href="{{ route('home') }}#contact" data-i18n="nav.contact">Kontak</a>
    </nav>

    <div class="header-actions">
      {{-- Language Switcher (Switch-style toggle matching theme switch) --}}
      <button class="lang-toggle-btn" id="langToggle" onclick="window.toggleLanguage && window.toggleLanguage()" type="button" role="switch" aria-checked="false" aria-label="Ganti Bahasa (ID / EN)" title="Ubah Bahasa (ID / EN)">
        <span class="lang-slider" aria-hidden="true"></span>
        <span class="lang-label lang-label-id">ID</span>
        <span class="lang-label lang-label-en">EN</span>
      </button>

      {{-- Dark / Light Mode Switcher (Matching Reference: Rounded Square Button with Moon/Sun Icon) --}}
      <button class="theme-toggle-btn" id="themeToggle" onclick="toggleTheme()" type="button" aria-label="Ganti mode gelap / terang" title="Ganti Mode Gelap / Terang">
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

      <a class="consult-button trigger-contact-modal" href="#contactModal">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11Z"/>
        </svg>
        <span data-i18n="nav.consult">Konsultasi</span>
      </a>

      <button class="menu-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false">
        <span></span><span></span>
      </button>
    </div>
  </header>

  {{-- Mobile Navigation Dropdown --}}
  <div class="mobile-menu" aria-hidden="true">
    <div class="mobile-menu-top">
      <div class="mobile-theme-switch-wrap">
        <span class="mobile-theme-text" data-i18n="nav.mode_label">Mode Tampilan</span>
        <button class="theme-toggle-btn mobile-theme-toggle" onclick="toggleTheme()" type="button" aria-label="Ganti mode gelap / terang">
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
      <div class="mobile-theme-switch-wrap" style="margin-top: 14px;">
        <span class="mobile-theme-text" data-i18n="nav.lang_label">Pilihan Bahasa</span>
        <button class="lang-toggle-btn mobile-lang-toggle" onclick="window.toggleLanguage && window.toggleLanguage()" type="button" role="switch" aria-checked="false" aria-label="Ganti Bahasa (ID / EN)" title="Ubah Bahasa (ID / EN)">
          <span class="lang-slider" aria-hidden="true"></span>
          <span class="lang-label lang-label-id">ID</span>
          <span class="lang-label lang-label-en">EN</span>
        </button>
      </div>
    </div>
    <nav aria-label="Navigasi mobile">
      <a href="{{ route('home') }}" data-i18n="nav.home">Beranda</a>
      <a href="{{ route('about') }}" data-i18n="nav.about">Tentang Kami</a>
      <a href="{{ route('home') }}#services" data-i18n="nav.services">Layanan</a>
      <a href="{{ route('portfolio.index') }}" data-i18n="nav.portfolio">Portofolio</a>
      <a href="{{ route('home') }}#contact" data-i18n="nav.contact">Kontak</a>
    </nav>
  </div>

  {{-- ============================================================ --}}
  {{-- MAIN ABOUT CONTENT (4 SCREENSHOT BLOCKS)                     --}}
  {{-- ============================================================ --}}
  <main class="about-standalone-content section-pad" style="max-width: 1200px; margin: 0 auto; padding-top: 110px; padding-bottom: 70px; padding-left: 24px; padding-right: 24px;">

    {{-- Main Page Title: Tentang Kami --}}
    <div class="about-heading reveal" style="margin-bottom: 36px;">
      <h1 id="about-page-title" style="font-size: clamp(44px, 5.2vw, 84px); font-family: var(--font-display, 'Cormorant Garamond', serif); font-weight: 500; color: var(--text-heading, #221F1B); margin: 0; line-height: 1;" data-i18n="about.title">Tentang Kami</h1>
    </div>

    {{-- ============================================================ --}}
    {{-- BLOCK 1: PROFIL PERUSAHAAN + STATS CARD (SCREENSHOT 1)      --}}
    {{-- ============================================================ --}}
    <div class="about-profile-grid reveal">
      <div class="about-profile-text">
        <p class="section-kicker" data-i18n="about.profile_tag">PROFIL PERUSAHAAN</p>
        <h2 class="about-company-name" data-i18n="about.profile_title">PT Pratama Berkah Utama</h2>
        <div class="about-divider-bar"></div>
        
        <div class="about-paragraphs">
          <p data-i18n="about.p1"><strong>Pratama Design Studio</strong> adalah brand dari PT Pratama Berkah Utama, perusahaan yang bergerak di bidang <em>interior &amp; exterior design &amp; build</em>. Berdiri sejak tahun 2021 dan berkantor di Jakarta, Indonesia.</p>
          <p data-i18n="about.p2">Kami menyediakan layanan lengkap mulai dari konsultasi fit-out, perencanaan proyek, manajemen anggaran, visualisasi 3D digital, proses produksi custom interior, hingga pelaksanaan fit-out dan renovasi secara end-to-end.</p>
          <p data-i18n="about.p3">Dengan pengalaman menangani berbagai jenis proyek — landed house, apartment, F&amp;B, booth, dan office — kami hadir sebagai mitra terpercaya untuk mewujudkan ruang impian Anda dengan standar kualitas tinggi.</p>
        </div>

        {{-- Quick Facts Badges (2x2 Grid) --}}
        <div class="about-facts-grid">
          <div class="about-fact-item">
            <span class="fact-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
            <div>
              <span class="fact-label" data-i18n="about.fact_est">Berdiri</span>
              <span class="fact-val">2021</span>
            </div>
          </div>
          <div class="about-fact-item">
            <span class="fact-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </span>
            <div>
              <span class="fact-label" data-i18n="about.fact_loc">Lokasi</span>
              <span class="fact-val" data-i18n="about.fact_loc_val">Jakarta, Indonesia</span>
            </div>
          </div>
          <div class="about-fact-item">
            <span class="fact-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            </span>
            <div>
              <span class="fact-label" data-i18n="about.fact_port">Portfolio</span>
              <span class="fact-val" data-i18n="about.fact_port_val">20+ Proyek</span>
            </div>
          </div>
          <div class="about-fact-item">
            <span class="fact-icon">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </span>
            <div>
              <span class="fact-label" data-i18n="about.fact_cov">Jangkauan</span>
              <span class="fact-val" data-i18n="about.fact_cov_val">Multi-Kota</span>
            </div>
          </div>
        </div>
      </div>

      {{-- Stats Showcase Card --}}
      <div class="about-profile-card">
        <div class="about-brand-box">
          <div class="about-brand-icon">P</div>
          <h3 class="about-brand-title">Pratama Design Studio</h3>
          <p class="about-brand-sub" data-i18n="about.badge_sub">INTERIOR · EXTERIOR · DESIGN &amp; BUILD</p>
        </div>
        <div class="about-stats-row">
          <div class="about-stat-col">
            <div class="stat-number">20+</div>
            <div class="stat-caption" data-i18n="about.stat_projects">Proyek Selesai</div>
          </div>
          <div class="about-stat-col">
            <div class="stat-number">4+</div>
            <div class="stat-caption" data-i18n="about.stat_years">Tahun Pengalaman</div>
          </div>
          <div class="about-stat-col">
            <div class="stat-number">3+</div>
            <div class="stat-caption" data-i18n="about.stat_cities">Kota Jangkauan</div>
          </div>
        </div>
      </div>
    </div>

    {{-- ============================================================ --}}
    {{-- BLOCK 2: VISI & MISI (SCREENSHOT 2)                          --}}
    {{-- ============================================================ --}}
    <div class="about-vision-section reveal">
      <div class="about-sub-header">
        <p class="section-kicker" data-i18n="about.vision_tag">ARAH PERUSAHAAN</p>
        <h2 class="about-sub-title" data-i18n="about.vision_title">Visi &amp; Misi</h2>
        <div class="about-divider-bar"></div>
      </div>

      <div class="about-vision-cards">
        {{-- Card 1: Visi --}}
        <div class="vision-card">
          <div class="vision-icon-badge">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </div>
          <h3 class="vision-card-title" data-i18n="about.vis_title">Visi</h3>
          <div class="vision-line"></div>
          <p class="vision-card-desc" data-i18n="about.vis_desc">
            Menjadi perusahaan desain interior terpercaya yang tidak hanya mengutamakan estetika, tetapi juga fungsionalitas ruang bagi pemiliknya — menghadirkan karya yang bertahan lama, bermakna, dan mencerminkan kepribadian penghuninya.
          </p>
        </div>

        {{-- Card 2: Misi --}}
        <div class="vision-card">
          <div class="vision-icon-badge">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
          </div>
          <h3 class="vision-card-title" data-i18n="about.mis_title">Misi</h3>
          <div class="vision-line"></div>
          <p class="vision-card-desc" data-i18n="about.mis_desc">
            Memahami kebutuhan klien secara mendalam dan menerjemahkannya menjadi desain yang menarik, praktis, fungsional, dan sesuai dengan anggaran yang tersedia — dengan komunikasi yang transparan sepanjang proses.
          </p>
        </div>
      </div>
    </div>

    {{-- ============================================================ --}}
    {{-- BLOCK 3: MENGAPA KAMI / KEUNGGULAN (SCREENSHOT 3)            --}}
    {{-- ============================================================ --}}
    <div class="about-advantages-section reveal">
      <div class="advantages-grid">
        <div class="advantages-intro">
          <p class="section-kicker" data-i18n="about.adv_tag">MENGAPA KAMI</p>
          <h2 class="advantages-title" data-i18n="about.adv_title">Keunggulan Pratama Design Studio</h2>
          <div class="about-divider-bar"></div>
          <p class="advantages-desc" data-i18n="about.adv_desc">
            Kami hadir sebagai mitra terpercaya yang memberikan layanan desain interior komprehensif dengan standar kualitas tinggi dan nilai yang transparan.
          </p>
          <button type="button" class="btn-adv-consult trigger-contact-modal">
            <span data-i18n="about.adv_btn">Mulai Konsultasi</span>
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </button>
        </div>

        <div class="advantages-list">
          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18.178 8c5.096 0 5.096 8 0 8-5.095 0-7.178-8-12.178-8-5.096 0-5.096 8 0 8 5.095 0 7.178-8 12.178-8z"></path></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv1_title">One-Stop Solution</h4>
              <p class="adv-item-desc" data-i18n="about.adv1_desc">Dari konsultasi hingga fit-out selesai, semua ditangani oleh satu tim.</p>
            </div>
          </div>

          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv2_title">Free Pre-Layout &amp; Konsultasi</h4>
              <p class="adv-item-desc" data-i18n="about.adv2_desc">Klien mendapat konsep denah awal dan konsultasi fit-out gratis sebelum agreement.</p>
            </div>
          </div>

          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv3_title">Fleksibel dalam Budget</h4>
              <p class="adv-item-desc" data-i18n="about.adv3_desc">Kami menyesuaikan desain dan material dengan anggaran yang dimiliki klien.</p>
            </div>
          </div>

          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"></path><path d="M18 18h.01"></path><path d="M14 18h.01"></path></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv4_title">Workshop &amp; Fasilitas Produksi Sendiri</h4>
              <p class="adv-item-desc" data-i18n="about.adv4_desc">Produksi furniture dan elemen interior custom dilakukan di workshop kami sendiri.</p>
            </div>
          </div>

          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv5_title">Pengalaman Multi-Segmen</h4>
              <p class="adv-item-desc" data-i18n="about.adv5_desc">Berpengalaman menangani residential, F&amp;B, retail, dan office project.</p>
            </div>
          </div>

          <div class="adv-card">
            <div class="adv-icon-wrap">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
            </div>
            <div class="adv-content">
              <h4 class="adv-item-title" data-i18n="about.adv6_title">Mampu Multi-Kota</h4>
              <p class="adv-item-desc" data-i18n="about.adv6_desc">Kami dapat menangani proyek di berbagai kota di Indonesia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- ============================================================ --}}
    {{-- BLOCK 4: MEET OUR PRINCIPAL (SCREENSHOT 4)                   --}}
    {{-- ============================================================ --}}
    <div class="about-principal-box reveal" style="padding-top: 10px; padding-bottom: 20px;">
      <div class="principal-featured-card">
        <div class="principal-avatar-col">
          <div class="principal-avatar-circle">
            <span>K</span>
          </div>
          <span class="principal-avatar-label">Principal</span>
        </div>
        <div class="principal-bio-col">
          <p class="principal-role-badge" data-i18n="about.principal_tag">FOUNDER &amp; CEO</p>
          <h3 class="principal-person-name" data-i18n="about.principal_name">Kaleb Wahyu Pratama</h3>
          <div class="principal-divider"></div>
          <p class="principal-bio-text" data-i18n="about.principal_desc">
            Sebagai Founder dan CEO Pratama Design Studio, Kaleb memimpin setiap proyek dengan visi desain yang kuat dan komitmen terhadap kualitas. Beliau berpengalaman dalam menangani proyek interior &amp; exterior residential, F&amp;B, dan commercial di berbagai kota Indonesia.
          </p>
          <div class="principal-tag-badges">
            <span class="principal-pill" data-i18n="about.tag_interior">Interior Design</span>
            <span class="principal-pill" data-i18n="about.tag_pm">Project Management</span>
            <span class="principal-pill" data-i18n="about.tag_db">Design &amp; Build</span>
          </div>
        </div>
      </div>
    </div>

  </main>

  {{-- ============================================================ --}}
  {{-- CALL TO ACTION (Tertarik Bekerja Sama?)                       --}}
  {{-- ============================================================ --}}
  <section class="about-page-cta">
    <div class="cta-inner">
      <h3 data-i18n="about.cta_title">Tertarik Bekerja Sama?</h3>
      <p data-i18n="about.cta_desc">Konsultasikan kebutuhan desain Anda bersama kami. Gratis dan tanpa kewajiban.</p>
      <button type="button" class="btn-adv-consult trigger-contact-modal" style="margin: 0 auto;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        <span data-i18n="about.cta_btn">Konsultasi Sekarang</span>
      </button>
    </div>
  </section>

  {{-- ============================================================ --}}
  {{-- KONSULTASI / CONTACT MODAL DIALOG                            --}}
  {{-- ============================================================ --}}
  <dialog class="contact-modal" id="contactModal">
    <div class="contact-modal-backdrop" onclick="document.getElementById('contactModal').close()"></div>
    <div class="contact-modal-box">
      <button class="modal-close-btn" type="button" aria-label="Tutup form" onclick="document.getElementById('contactModal').close()">&times;</button>
      <div class="modal-header">
        <span class="modal-brand-badge">P</span>
        <h3 class="modal-title" data-i18n="modal.title">Konsultasi Proyek</h3>
        <p class="modal-subtitle" data-i18n="modal.subtitle">Ceritakan rencana interior atau renovasi Anda. Tim Pratama akan merespons dalam waktu 1x24 jam.</p>
      </div>
      <form class="modal-form" id="consultationModalForm" action="{{ route('consultation.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="m_name" data-i18n="modal.name_label">Nama Lengkap *</label>
          <input type="text" id="m_name" name="name" required placeholder="Contoh: Budi Santoso" data-i18n-placeholder="modal.name_ph" />
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label for="m_phone" data-i18n="modal.phone_label">Nomor WhatsApp *</label>
            <input type="tel" id="m_phone" name="phone" required placeholder="08xxxxxxxxxx" data-i18n-placeholder="modal.phone_ph" />
          </div>
          <div class="form-group">
            <label for="m_email" data-i18n="modal.email_label">Email (Opsional)</label>
            <input type="email" id="m_email" name="email" placeholder="nama@email.com" data-i18n-placeholder="modal.email_ph" />
          </div>
        </div>
        <div class="form-row-2">
          <div class="form-group">
            <label for="m_service" data-i18n="modal.service_label">Tipe Layanan *</label>
            <select id="m_service" name="service_type" required>
              <option value="" disabled selected data-i18n="modal.service_default">Pilih Layanan</option>
              <option value="Residential">Residential (Rumah / Apartemen)</option>
              <option value="Commercial">Commercial / Office</option>
              <option value="F&B / Retail">F&amp;B / Retail / Café</option>
              <option value="Fit-Out & Renovation">Fit-Out &amp; Renovasi</option>
              <option value="Custom Furniture">Custom Furniture Production</option>
            </select>
          </div>
          <div class="form-group">
            <label for="m_budget" data-i18n="modal.budget_label">Perkiraan Anggaran</label>
            <select id="m_budget" name="estimated_budget">
              <option value="" selected data-i18n="modal.budget_default">Belum ditentukan</option>
              <option value="< 50 Juta">&lt; Rp 50 Juta</option>
              <option value="50 - 150 Juta">Rp 50 - 150 Juta</option>
              <option value="150 - 300 Juta">Rp 150 - 300 Juta</option>
              <option value="> 300 Juta">&gt; Rp 300 Juta</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="m_notes" data-i18n="modal.notes_label">Ceritakan Kebutuhan Anda</label>
          <textarea id="m_notes" name="project_description" rows="3" placeholder="Lokasi proyek, luas ruangan, gaya desain yang diinginkan..." data-i18n-placeholder="modal.notes_ph"></textarea>
        </div>
        <button type="submit" class="btn-modal-submit">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          <span data-i18n="modal.btn_submit">Kirim Permintaan Konsultasi</span>
        </button>
      </form>
    </div>
  </dialog>

  {{-- ============================================================ --}}
  {{-- 4-COLUMN CONTACT & FOOTER SECTION (STANDARD DESIGN SYSTEM)   --}}
  {{-- ============================================================ --}}
  <footer class="contact-footer" id="contact" aria-labelledby="contact-title">
    <div class="contact-footer-inner">
      
      <!-- Column 1: Brand Info & Social Media -->
      <div class="footer-col footer-col-brand reveal">
        <div class="brand-badge-row">
          <span class="brand-icon-sm">P</span>
          <div class="brand-title-wrap">
            <strong id="contact-title" class="brand-main-title">Pratama Design Studio</strong>
            <span class="brand-sub-title">PT Pratama Berkah Utama</span>
          </div>
        </div>
        <p class="brand-desc" data-i18n="footer.desc">Pratama Design Studio &amp; Build spesialis konsultasi interior dan eksterior, desain arsitektur, perencanaan tata ruang, produksi custom workshop, dan renovasi di Jakarta.</p>
        <div class="social-icon-row" aria-label="Media Sosial Pratama">
          <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="WhatsApp">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
          </a>
          <a href="mailto:pratamadsb@gmail.com" class="social-circle-btn" aria-label="Email">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </a>
          <a href="https://pratamadesign.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="Website">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="2" y1="12" x2="22" y2="12"></line>
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Column 2: Menu Utama -->
      <div class="footer-col footer-col-menu reveal">
        <h3 class="footer-col-title" data-i18n="footer.menu_title">Menu Utama</h3>
        <div class="footer-title-bar"></div>
        <ul class="footer-menu-list">
          <li><a href="{{ route('home') }}"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_home">Beranda</span></a></li>
          <li><a href="{{ route('about') }}"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_about">Tentang Kami</span></a></li>
          <li><a href="{{ route('home') }}#services"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_services">Layanan</span></a></li>
          <li><a href="{{ route('portfolio.index') }}"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_portfolio">Portofolio</span></a></li>
          <li><a href="{{ route('home') }}#process"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_process">Cara Kerja Kami</span></a></li>
          <li><a href="{{ route('home') }}#testimonials"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_testimonials">Kata Klien Kami</span></a></li>
          <li><a href="{{ route('home') }}#cta-consult"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_principal">Konsultasi Desain</span></a></li>
          <li><a href="#contactModal" class="trigger-contact-modal"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_consult">Form Konsultasi</span></a></li>
        </ul>
      </div>

      <!-- Column 3: Hubungi Kami -->
      <div class="footer-col footer-col-contact reveal">
        <h3 class="footer-col-title" data-i18n="footer.contact_title">Hubungi Kami</h3>
        <div class="footer-title-bar"></div>
        <div class="contact-info-list">
          <div class="contact-info-item">
            <span class="info-icon" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
            </span>
            <div class="info-content">
              <span>Puri Orchard Apartment, Tower Orange, Lantai Dasar Unit G-08, Jl. Raya Rawa Buaya No. 88, Cengkareng, Jakarta Barat 11740</span>
            </div>
          </div>

          <a href="tel:+6282213641995" class="contact-info-item contact-info-link">
            <span class="info-icon" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
            </span>
            <div class="info-content">
              <span>Telepon: +62 822 1364 1995</span>
            </div>
          </a>

          <a href="mailto:pratamadsb@gmail.com" class="contact-info-item contact-info-link">
            <span class="info-icon" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </span>
            <div class="info-content">
              <span>pratamadsb@gmail.com</span>
            </div>
          </a>

          <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer" class="contact-info-item contact-info-link">
            <span class="info-icon" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
              </svg>
            </span>
            <div class="info-content">
              <span>WhatsApp: +62 822 1364 1995</span>
            </div>
          </a>

          <div class="contact-info-item">
            <span class="info-icon" aria-hidden="true">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
            </span>
            <div class="info-content">
              <span>Senin — Sabtu: 09.00 — 18.00 WIB</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Column 4: Lokasi Google Maps -->
      <div class="footer-col footer-col-location reveal">
        <h3 class="footer-col-title" data-i18n="footer.location_title">Lokasi Kami</h3>
        <div class="footer-title-bar"></div>
        <div class="map-card-container">
          <a href="https://maps.google.com/?q=Puri+Orchard+Apartment+Jakarta" target="_blank" rel="noopener noreferrer" class="map-open-badge">
            <span>Buka di Google Maps</span>
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
              <polyline points="15 3 21 3 21 9"></polyline>
              <line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
          </a>
          <iframe 
            src="https://maps.google.com/maps?q=Puri+Orchard+Apartment+Jakarta&t=&z=14&ie=UTF8&iwloc=&output=embed" 
            class="map-frame" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade" 
            title="Lokasi Kantor Pratama Design Studio">
          </iframe>
        </div>
      </div>

    </div>

    <!-- Sub-Footer Copyright Bar -->
    <div class="footer-bottom-bar">
      <p class="copyright-text" data-i18n="footer.copyright">&copy; {{ date('Y') }} PT Pratama Berkah Utama. Seluruh hak cipta dilindungi.</p>
      <p class="tagline-text">Interior &amp; Exterior Design and Build &middot; Jakarta</p>
    </div>

    <!-- Floating Back to Top Button -->
    <a href="#top" class="back-to-top" id="backToTop" aria-label="Kembali ke atas">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="12" y1="19" x2="12" y2="5"></line>
        <polyline points="5 12 12 5 19 12"></polyline>
      </svg>
    </a>
  </footer>

@endsection

@section('scripts')
<script>
  // Modal triggering
  document.addEventListener('DOMContentLoaded', function() {
    const triggers = document.querySelectorAll('.trigger-contact-modal');
    const modal = document.getElementById('contactModal');
    triggers.forEach(trigger => {
      trigger.addEventListener('click', function(e) {
        e.preventDefault();
        if (modal) modal.showModal();
      });
    });
  });
</script>
@endsection
