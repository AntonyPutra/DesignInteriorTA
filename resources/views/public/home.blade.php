@extends('layouts.app')

@section('title', 'pratamaid.')
@section('meta_description', 'Pratamaid - interior & exterior design and build studio in Jakarta.')

@section('content')

  {{-- Top Sticky Header (Hidden initially on top of hero, appears on scroll to About Us) --}}
  <header class="site-header" id="top">
    <a class="brand" href="#top" aria-label="Pratamaid home">
      <span class="brand-icon">P</span>
      <span class="brand-copy">
        <span class="brand-word">Pratama Design Studio</span>
        <span class="brand-subtitle">Interior Design &amp; Build</span>
      </span>
    </a>
    <nav class="desktop-nav" aria-label="Main navigation">
      <a class="active" href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#services">Services</a>
      <a href="#portfolio">Portfolio</a>
      <a href="#pricing">Cost Estimator</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="header-actions">
      {{-- Dark / Light Mode Switcher (Matching Reference: Rounded Square Button with Moon/Sun Icon) --}}
      <button class="theme-toggle-btn" id="themeToggle" onclick="toggleTheme()" type="button" aria-label="Ganti mode gelap / terang" title="Ganti Mode Gelap / Terang">
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

      <a class="consult-button trigger-contact-modal" href="#contact">
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
    </div>
    <nav aria-label="Mobile navigation">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#services">Services</a>
      <a href="#portfolio">Portfolio</a>
      <a href="#pricing">Cost Estimator</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>

  <main>
    {{-- ============================================================ --}}
    {{-- HERO SECTION — Split Screen                                   --}}
    {{-- ============================================================ --}}
    <section class="hero" id="home" aria-labelledby="hero-title">

      {{-- LEFT PANEL: olive background --}}
      <div class="hero-copy">
        <div class="hero-content-wrapper">
          
          <div class="hero-header">
            <img class="hero-mark" src="{{ asset('assets/images/logo-mark.png') }}" alt="Pratamaid geometric mark" />
          </div>

          <div class="hero-main-copy">
            <p class="hero-eyebrow">PT Pratama Berkah Utama</p>
            <h1 id="hero-title">Pratama<br><span>Design Studio</span></h1>
            <p class="hero-desc">Elevating spaces through harmonious blend of function and aesthetic interior design.</p>
          </div>

          <div class="hero-footer">
            <span>Company Profile</span>
            <span>Est. 2021</span>
            <span>pratamaid.</span>
          </div>

        </div>
      </div>

      {{-- RIGHT PANEL: interior photo + Contractor overlay --}}
      <div class="hero-image">
        <img src="{{ asset('assets/images/cover-armchair.jpg') }}?v={{ filemtime(public_path('assets/images/cover-armchair.jpg')) }}" alt="Elegant armchair interior by Pratama Contractor" />
        <div class="hero-image-overlay">
          <div class="hero-image-overlay-inner">
            <span>Pratama</span>
            <strong>Contractor</strong>
          </div>
        </div>
      </div>

    </section>

    {{-- ============================================================ --}}
    {{-- INTRODUCTION SECTION (Between Hero & About)                  --}}
    {{-- ============================================================ --}}
    <section class="intro-section" id="introduction" aria-labelledby="intro-title">

      {{-- Top bar: olive background, two-level layout --}}
      <div class="intro-bar intro-fade-in">
        {{-- Row 1: brand left, year right --}}
        <div class="intro-bar-top">
          <span class="intro-bar-brand">pratamaid.</span>
          <span class="intro-bar-year">2026</span>
        </div>
        {{-- Row 2: large heading left, description right --}}
        <div class="intro-bar-main">
          <h2 class="intro-bar-heading" id="intro-title">Introduction</h2>
          <p class="intro-bar-desc">pratamaid. is an interior &amp; exterior design &amp; build<br>established in 2021 in Jakarta, Indonesia.</p>
        </div>
      </div>

      {{-- Full-width interior photo --}}
      <div class="intro-photo intro-fade-in">
        <img src="{{ asset('assets/images/hero-living.jpg') }}?v={{ filemtime(public_path('assets/images/hero-living.jpg')) }}" alt="Pratamaid interior design showcase — living space" loading="lazy" />
      </div>

    </section>

    {{-- ============================================================ --}}
    {{-- TABLE OF CONTENTS SECTION                                     --}}
    {{-- ============================================================ --}}
    <section class="toc-section" id="toc" aria-labelledby="toc-title">

      {{-- Top: cream background, brand/year meta + large heading --}}
      <div class="toc-header">
        <div class="toc-header-meta">
          <span class="toc-meta-brand">pratamaid</span>
          <span class="toc-meta-year">2026</span>
        </div>
        <h2 class="toc-heading" id="toc-title">Table Of Contents</h2>
      </div>

      {{-- Body: photo left + TOC list right --}}
      <div class="toc-body">

        {{-- Left: interior bedroom photo (full, no crop) --}}
        <div class="toc-photo">
          <img src="{{ asset('assets/images/toc-bedroom.jpg') }}?v={{ file_exists(public_path('assets/images/toc-bedroom.jpg')) ? filemtime(public_path('assets/images/toc-bedroom.jpg')) : time() }}" alt="Interior bedroom — Pratamaid Design Studio" loading="lazy" />
        </div>

        {{-- Right: list of sections + closing desc --}}
        <div class="toc-content">
          <nav class="toc-list" aria-label="Table of contents">
            <a class="toc-item" href="#about">
              <span class="toc-item-name">About Us</span>
              <span class="toc-item-num">01</span>
            </a>
            <a class="toc-item" href="#services">
              <span class="toc-item-name">What we do</span>
              <span class="toc-item-num">02</span>
            </a>
            <a class="toc-item" href="#portfolio">
              <span class="toc-item-name">Project portfolio</span>
              <span class="toc-item-num">03–08</span>
            </a>
            <a class="toc-item" href="#process">
              <span class="toc-item-name">How we work</span>
              <span class="toc-item-num">09</span>
            </a>
            <a class="toc-item" href="#pricing">
              <span class="toc-item-name">Price list</span>
              <span class="toc-item-num">10</span>
            </a>
            <a class="toc-item" href="#principal">
              <span class="toc-item-name">Meet our Principal</span>
              <span class="toc-item-num">11</span>
            </a>
            <a class="toc-item" href="#contact">
              <span class="toc-item-name">Contact Us</span>
              <span class="toc-item-num">12</span>
            </a>
          </nav>
          <p class="toc-closing-desc">A harmonious blend of function and aesthetic interior design, our style combines with all the color, ambiances, form, ultra premium textures, warmth, and expressive elegance.</p>
        </div>

      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 2. ABOUT US SECTION                                           --}}
    {{-- ============================================================ --}}
    <section class="about section-pad" id="about" aria-labelledby="about-title">
      <div class="about-heading reveal">
        <div class="section-index">01</div>
        <h2 id="about-title">About Us</h2>
      </div>
      <div class="about-grid">
        <div class="about-copy reveal">
          <p class="lead">Pratama Design Studio &amp; Build specializes in interior and exterior consultancy, design, production, fit-out, and renovation.</p>
          <p>The studio focuses on creating spaces that support the users’ needs and lifestyle, combining visual character with practical function. Based in Jakarta, the team handles residential, retail, F&amp;B, and office projects, supported by its own workshop and production facilities.</p>
          <div class="about-values">
            <span>Professionalism</span>
            <span>Integrity</span>
            <span>Innovation</span>
            <span>Attention to Detail</span>
          </div>
        </div>
        <figure class="image-frame reveal">
          <img src="{{ asset('assets/images/about.jpg') }}" alt="Interior project with warm wood, lighting and furniture" loading="lazy" />
          <figcaption>Pratamaid / Interior &amp; exterior design and build</figcaption>
        </figure>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 3. WHAT WE DO / SERVICES                                      --}}
    {{-- ============================================================ --}}
    <section class="services section-pad" id="services" aria-labelledby="services-title">
      <div class="section-heading reveal">
        <div class="section-index">02</div>
        <h2 id="services-title">What We Do</h2>
        <p>One-stop project support from the first site conversation to installation and final touches.</p>
      </div>

      <div class="service-list reveal">
        <article><span>01</span><h3>Fit-Out Consultation</h3><p>Planning spaces around user needs, budget and site measurements before execution.</p></article>
        <article><span>02</span><h3>Project Plan &amp; Schedule</h3><p>Design concept, specification and technical planning organized into a clear execution path.</p></article>
        <article><span>03</span><h3>Project Budgeting</h3><p>Cost control aimed at achieving the best possible quality within the agreed project budget.</p></article>
        <article><span>04</span><h3>Digital Rendering</h3><p>3D visualization to align design expectations before construction and production begin.</p></article>
        <article><span>05</span><h3>Production</h3><p>Custom interior elements produced through the workshop and coordinated with project specifications.</p></article>
        <article><span>06</span><h3>Fit-Out &amp; Renovation</h3><p>On-site execution that transforms approved designs into functional, finished environments.</p></article>
      </div>

      <div class="service-gallery reveal" aria-label="Selected interiors">
        <img src="{{ asset('assets/images/service-01.jpg') }}" alt="Bedroom and lounge interior" loading="lazy" />
        <img src="{{ asset('assets/images/service-02.jpg') }}" alt="Dark contemporary living interior" loading="lazy" />
        <img src="{{ asset('assets/images/service-03.jpg') }}" alt="Bright bedroom interior" loading="lazy" />
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 4. STATEMENT BANNER                                           --}}
    {{-- ============================================================ --}}
    <section class="statement" aria-label="Brand statement">
      <img src="{{ asset('assets/images/statement.jpg') }}" alt="Elegant bright living space" loading="lazy" />
      <div class="statement-shade"></div>
      <p class="reveal"><span>Transforming Ideas</span> into Living Spaces</p>
    </section>

    {{-- ============================================================ --}}
    {{-- 5. PROJECT PORTFOLIO                                          --}}
    {{-- ============================================================ --}}
    <section class="portfolio section-pad" id="portfolio" aria-labelledby="portfolio-title">
      <div class="portfolio-top reveal">
        <div class="portfolio-top-left">
          <p class="portfolio-eyebrow">Project Portfolio</p>
          <h2 id="portfolio-title">Karya Kami</h2>
        </div>
        <a href="/portfolio" class="btn-lihat-semua" aria-label="Lihat semua proyek">
          Lihat Semua Proyek
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>

      <div class="portfolio-grid" id="portfolioGrid">

        <a href="/portfolio" class="project-card" aria-label="Full House Jelambar">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-landed-05.jpg') }}" alt="Full House Jelambar" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>Full House</p><span>Jelambar · Landed House</span></div>
        </a>

        <a href="/portfolio" class="project-card" aria-label="Master Bedroom Cengkareng">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-landed-03.jpg') }}" alt="Master Bedroom Cengkareng" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>Master Bedroom</p><span>Cengkareng · Landed House</span></div>
        </a>

        <a href="/portfolio" class="project-card" aria-label="Pent House Karawaci">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-apartment-03.jpg') }}" alt="Pent House Karawaci" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>Pent House</p><span>Karawaci · Apartment</span></div>
        </a>

        <a href="/portfolio" class="project-card" aria-label="KATA Kopi PIK">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-fnb-02.jpg') }}" alt="KATA Kopi PIK" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>KATA Kopi</p><span>PIK · F&amp;B</span></div>
        </a>

        <a href="/portfolio" class="project-card" aria-label="G-Power Exhibition Booth">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-booth-02.jpg') }}" alt="G-Power Exhibition Booth" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>G-Power Booth</p><span>ICE BSD · Booth</span></div>
        </a>

        <a href="/portfolio" class="project-card" aria-label="Lobby Lift DPR Jakarta">
          <div class="project-image">
            <img src="{{ asset('assets/images/p-office-01.jpg') }}" alt="Lobby Lift DPR Jakarta" loading="lazy" />
            <div class="card-overlay"><span class="card-overlay-label">Selengkapnya</span></div>
          </div>
          <div class="project-meta"><p>Lobby Lift DPR</p><span>Jakarta · Office</span></div>
        </a>

      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 6. HOW WE WORK (Process)                                      --}}
    {{-- ============================================================ --}}
    <section class="process" id="process" aria-labelledby="process-title">
      <!-- Part 1: How We Work, Meet, Research -->
      <div class="process-slide reveal">
        <div class="process-banner">
          <img src="{{ asset('assets/images/process-1.jpg') }}" alt="How We Work - Executive Office" loading="lazy" />
        </div>
        <div class="process-info-strip process-strip-1">
          <div class="process-headline">
            <h2 id="process-title"><span class="process-index">09</span> How We Work</h2>
          </div>
          <div class="process-col">
            <h3>Meet</h3>
            <ul class="process-bullet-list">
              <li>New client meeting</li>
              <li>Brief understanding</li>
              <li>Measuring Spaces</li>
              <li>Interviewing User</li>
            </ul>
          </div>
          <div class="process-col">
            <h3>Research</h3>
            <ul class="process-bullet-list">
              <li>Brainstorming</li>
              <li>Mapping Client’s need</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Part 2: Concept, Design, Finalize, Create, Install -->
      <div class="process-slide reveal">
        <div class="process-banner">
          <img src="{{ asset('assets/images/process-2.jpg') }}" alt="How We Work - Meeting Room" loading="lazy" />
        </div>
        <div class="process-info-strip process-strip-2">
          <div class="process-col">
            <h3>Concept</h3>
            <ul class="process-bullet-list">
              <li>Concepting Styles</li>
              <li>Concepting Ambiances</li>
              <li>Concepting Color Tone</li>
            </ul>
          </div>
          <div class="process-col">
            <h3>Design</h3>
            <ul class="process-bullet-list">
              <li>Layouting</li>
              <li>3d Modeling</li>
            </ul>
          </div>
          <div class="process-col">
            <h3>Finalize</h3>
            <ul class="process-bullet-list">
              <li>3d Presentation</li>
              <li>Technical &amp; Shop Drawing</li>
            </ul>
          </div>
          <div class="process-col">
            <h3>Create</h3>
            <ul class="process-bullet-list">
              <li>Finish Good Production</li>
            </ul>
          </div>
          <div class="process-col">
            <h3>Install</h3>
            <ul class="process-bullet-list">
              <li>Installation and final touches</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 7. PRICE LIST SECTION                                         --}}
    {{-- ============================================================ --}}
    <section class="pricing section-pad" id="pricing" aria-labelledby="pricing-title">
      <div class="pricing-mark" aria-hidden="true"><img src="{{ asset('assets/images/logo-mark.png') }}" alt="" /></div>
      <div class="pricing-heading reveal">
        <div class="section-index">10</div>
        <h2 id="pricing-title">Price List</h2>
      </div>
      <div class="pricing-grid">
        <article class="price-card reveal">
          <p class="eyebrow dark">Design &amp; Consulting</p>
          <h3>IDR 150k–250k <span>/ sqm</span></h3>
          <p>Design services are offered within this range, while comprehensive interior and exterior packages are listed at IDR 350k–400k per sqm.</p>
          <small>Pricing is flexible and subject to project scope, specifications and other relevant factors.</small>
        </article>
        <article class="price-card dark-card reveal">
          <p class="eyebrow">Production &amp; Renovation</p>
          <h3>Project based</h3>
          <p>Custom production has no fixed standard price. Cost is determined by project area, specifications and material grade.</p>
          <small>A detailed Bill of Quantity is prepared before project agreement.</small>
        </article>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 8. PRINCIPAL (Meet Our Principal)                             --}}
    {{-- ============================================================ --}}
    <section class="principal section-pad" aria-labelledby="principal-title">
      <div class="principal-grid">
        <div class="principal-copy reveal">
          <div class="section-index">11</div>
          <h2 id="principal-title">Meet Our Principal</h2>
          <p class="eyebrow dark">Founder &amp; CEO</p>
          <h3>Kaleb Wahyu Pratama</h3>
          <p>Pratamaid was established at the end of 2021 and has grown across residential, retail and office work. The studio’s stated commitment is to deliver spaces that are both visually considered and highly functional.</p>
        </div>
        <figure class="team-figure reveal">
          <div class="team-bg"></div>
          <img src="{{ asset('assets/images/team.png') }}" alt="Pratamaid team" loading="lazy" />
          <figcaption>Pratamaid studio team</figcaption>
        </figure>
      </div>
    </section>
  </main>

  {{-- ============================================================ --}}
  {{-- 9. INTERACTIVE CONTACT & CONSULTATION MODAL                   --}}
  {{-- ============================================================ --}}
  <dialog id="contactModal" class="contact-modal" aria-labelledby="modalTitle">
    <div class="modal-dialog">
      <button type="button" class="modal-close" id="closeContactModal" aria-label="Close dialog">&times;</button>
      <div class="modal-header">
        <div class="card-kicker">
          <svg class="kicker-diamond" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" aria-hidden="true">
            <path d="M6 0L12 6L6 12L0 6Z"/>
          </svg>
          <span>KONSULTASI DESAIN</span>
        </div>
        <h3 id="modalTitle">Mulai Proyek Anda</h3>
        <p>Diskusikan kebutuhan interior atau eksterior Anda dengan tim desainer dan kontraktor Pratama.</p>
      </div>
      <form id="contactForm" class="contact-form" action="{{ route('consultation.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="formName">Nama Lengkap</label>
          <input type="text" id="formName" name="name" placeholder="Nama Anda" required />
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="formEmail">Email</label>
            <input type="email" id="formEmail" name="email" placeholder="nama@email.com" required />
          </div>
          <div class="form-group">
            <label for="formPhone">Nomor WhatsApp / HP</label>
            <input type="tel" id="formPhone" name="phone" placeholder="+62 8..." required />
          </div>
        </div>
        <div class="form-group">
          <label for="formSubject">Jenis Layanan</label>
          <select id="formSubject" name="subject">
            <option value="residential">Interior Rumah Tinggal (Landed House)</option>
            <option value="apartment">Interior Apartemen</option>
            <option value="commercial">Komersial / F&amp;B / Cafe / Resto</option>
            <option value="office">Kantor / Office &amp; Reception</option>
            <option value="booth">Booth Pameran</option>
            <option value="consultation">Konsultasi &amp; Estimasi Biaya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="formMessage">Detail Proyek / Pesan</label>
          <textarea id="formMessage" name="message" rows="4" placeholder="Ceritakan ukuran lokasi, konsep yang diinginkan, atau estimasi jadwal..." required></textarea>
        </div>
        <button type="submit" class="btn-modal-submit">
          <span>Kirim Pesan Konsultasi</span>
          <span aria-hidden="true">→</span>
        </button>
      </form>
      <div id="formSuccessToast" class="form-toast" hidden>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
          <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span>Terima kasih! Pesan Anda telah terkirim. Tim Pratama akan segera menghubungi Anda.</span>
      </div>
    </div>
  </dialog>

  {{-- ============================================================ --}}
  {{-- 10. 4-COLUMN CONTACT & FOOTER SECTION                         --}}
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
        <p class="brand-desc">
          Pratama Design Studio &amp; Build spesialis konsultasi interior dan eksterior, desain arsitektur, perencanaan tata ruang, produksi custom workshop, dan renovasi di Jakarta.
        </p>
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
        <h3 class="footer-col-title">Menu Utama</h3>
        <div class="footer-title-bar"></div>
        <ul class="footer-menu-list">
          <li><a href="#home"><span class="menu-chevron">&gt;</span> Home</a></li>
          <li><a href="#about"><span class="menu-chevron">&gt;</span> About Us</a></li>
          <li><a href="#services"><span class="menu-chevron">&gt;</span> Services</a></li>
          <li><a href="#portfolio"><span class="menu-chevron">&gt;</span> Portfolio</a></li>
          <li><a href="#process"><span class="menu-chevron">&gt;</span> How We Work</a></li>
          <li><a href="{{ route('estimator.index') }}"><span class="menu-chevron">&gt;</span> Price List</a></li>
          <li><a href="#contact" class="trigger-contact-modal"><span class="menu-chevron">&gt;</span> Konsultasi Form</a></li>
        </ul>
      </div>

      <!-- Column 3: Hubungi Kami -->
      <div class="footer-col footer-col-contact reveal">
        <h3 class="footer-col-title">Hubungi Kami</h3>
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
              <span>Puri Orchard Apt. Orange Grove 21/09, Jakarta Barat 11740</span>
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
              <span>WA / SMS: +62 822 1364 1995</span>
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
              <span>Jam Kerja: Senin – Sabtu 08:30 – 17:30</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Column 4: Lokasi Kami (Map) -->
      <div class="footer-col footer-col-location reveal">
        <h3 class="footer-col-title">Lokasi Kami</h3>
        <div class="footer-title-bar"></div>
        <div class="map-card-container">
          <a href="https://maps.google.com/?q=Puri+Orchard+Apartment+Jakarta" target="_blank" rel="noopener noreferrer" class="map-open-badge">
            <span>Open In Maps</span>
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
      <p class="copyright-text">&copy; 2026 PT Pratama Berkah Utama. All rights reserved.</p>
      <p class="tagline-text">Interior &amp; Exterior Design and Build &middot; Jakarta</p>
    </div>

    <!-- Floating Back to Top Button -->
    <a href="#top" class="back-to-top" id="backToTop" aria-label="Back to top">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="12" y1="19" x2="12" y2="5"></line>
        <polyline points="5 12 12 5 19 12"></polyline>
      </svg>
    </a>
  </footer>

@endsection
