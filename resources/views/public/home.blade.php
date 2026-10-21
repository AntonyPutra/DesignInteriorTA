@extends('layouts.app')

@section('title', 'Pratama Design Studio | Interior & Exterior Design and Build')
@section('meta_description', 'PT Pratama Berkah Utama - Pratama Design Studio & Build. Interior & exterior consultancy, design, fit-out, and renovation in Jakarta.')
@section('content')
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
@endsection
