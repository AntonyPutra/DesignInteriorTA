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
    {{-- 1. HERO SECTION (Split Screen)                                --}}
    {{-- ============================================================ --}}
    <section class="hero" id="home" aria-labelledby="hero-title">
      <div class="hero-copy">
        <div class="hero-kicker">PT Pratama Berkah Utama <span>2026</span></div>
        <div class="hero-main-copy">
          <p class="eyebrow">Company Profile</p>
          <h1 id="hero-title"><span>Pratama Design</span> Studio</h1>
          <p class="hero-subtitle">Interior &amp; exterior design and build, established in Jakarta in 2021.</p>
          <div class="hero-actions">
            <a class="btn btn-cta btn-primary" href="#portfolio">
              <span>Explore Projects</span>
              <span class="btn-icon" aria-hidden="true">↗</span>
            </a>
            <a class="btn btn-cta btn-secondary trigger-contact-modal" href="#contact">
              <span>Start a Project</span>
              <span class="btn-icon" aria-hidden="true">→</span>
            </a>
          </div>
        </div>
        <img class="hero-mark" src="{{ asset('assets/images/logo-mark.png') }}" alt="Pratamaid geometric mark" />
      </div>
      <div class="hero-image">
        <img src="{{ asset('assets/images/hero-living.jpg') }}" alt="Warm contemporary living room interior" />
        <div class="hero-image-overlay">
          <span>Pratama</span>
          <strong>Contractor</strong>
        </div>
        <p class="hero-vertical">Design / Build / Renovation</p>
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
      <div class="section-heading portfolio-heading reveal">
        <div>
          <div class="section-index">03—08</div>
          <h2 id="portfolio-title">Project Portfolio</h2>
        </div>
        <p>Selected projects from the company profile across landed houses, apartments, F&amp;B, booths, and offices.</p>
      </div>

      <div class="filter-bar reveal" role="group" aria-label="Portfolio filters">
        <button class="filter-button active" type="button" data-filter="all">All</button>
        <button class="filter-button" type="button" data-filter="landed">Landed House</button>
        <button class="filter-button" type="button" data-filter="apartment">Apartment</button>
        <button class="filter-button" type="button" data-filter="fnb">F&amp;B</button>
        <button class="filter-button" type="button" data-filter="booth">Booth</button>
        <button class="filter-button" type="button" data-filter="office">Office</button>
      </div>

      <div class="portfolio-grid" id="portfolioGrid">
        <article class="project-card reveal" data-category="landed"><div class="project-image"><img src="{{ asset('assets/images/p-landed-01.jpg') }}" alt="Rainbow Cluster house exterior" loading="lazy" /></div><div class="project-meta"><p>Rainbow Cluster</p><span>West Kalimantan · Landed House</span></div></article>
        <article class="project-card reveal" data-category="landed"><div class="project-image"><img src="{{ asset('assets/images/p-landed-02.jpg') }}" alt="Kitchen set project" loading="lazy" /></div><div class="project-meta"><p>Kitchen Set</p><span>PIK · Residential</span></div></article>
        <article class="project-card reveal" data-category="landed"><div class="project-image"><img src="{{ asset('assets/images/p-landed-03.jpg') }}" alt="Master bedroom project" loading="lazy" /></div><div class="project-meta"><p>Master Bedroom</p><span>Cengkareng · Residential</span></div></article>
        <article class="project-card reveal" data-category="landed"><div class="project-image"><img src="{{ asset('assets/images/p-landed-04.jpg') }}" alt="Residential re-facade project" loading="lazy" /></div><div class="project-meta"><p>Re-Facade</p><span>Greenlake City · Exterior</span></div></article>
        <article class="project-card reveal" data-category="landed"><div class="project-image"><img src="{{ asset('assets/images/p-landed-05.jpg') }}" alt="Full house living room project" loading="lazy" /></div><div class="project-meta"><p>Full House</p><span>Surabaya · Residential</span></div></article>

        <article class="project-card reveal" data-category="apartment"><div class="project-image"><img src="{{ asset('assets/images/p-apartment-01.jpg') }}" alt="Apartment living interior" loading="lazy" /></div><div class="project-meta"><p>3 Bedroom Unit</p><span>Meikarta · Apartment</span></div></article>
        <article class="project-card reveal" data-category="apartment"><div class="project-image"><img src="{{ asset('assets/images/p-apartment-02.jpg') }}" alt="Apartment bedroom design" loading="lazy" /></div><div class="project-meta"><p>3 Bedroom Unit</p><span>CBD Pluit · Apartment</span></div></article>
        <article class="project-card reveal" data-category="apartment"><div class="project-image"><img src="{{ asset('assets/images/p-apartment-03.jpg') }}" alt="Penthouse living interior" loading="lazy" /></div><div class="project-meta"><p>Pent House</p><span>Karawaci · Apartment</span></div></article>

        <article class="project-card reveal" data-category="fnb"><div class="project-image"><img src="{{ asset('assets/images/p-fnb-01.jpg') }}" alt="Kampung Burger restaurant interior" loading="lazy" /></div><div class="project-meta"><p>Kampung Burger</p><span>Depok · F&amp;B</span></div></article>
        <article class="project-card reveal" data-category="fnb"><div class="project-image"><img src="{{ asset('assets/images/p-fnb-02.jpg') }}" alt="KATA Kopi interior" loading="lazy" /></div><div class="project-meta"><p>KATA Kopi</p><span>PIK · F&amp;B</span></div></article>
        <article class="project-card reveal" data-category="fnb"><div class="project-image"><img src="{{ asset('assets/images/p-fnb-03.jpg') }}" alt="PanMee storefront" loading="lazy" /></div><div class="project-meta"><p>PanMee</p><span>Mangga Besar · F&amp;B</span></div></article>

        <article class="project-card reveal" data-category="booth"><div class="project-image"><img src="{{ asset('assets/images/p-booth-01.jpg') }}" alt="Bubee booth design" loading="lazy" /></div><div class="project-meta"><p>Bubee Booth</p><span>Tomang · Booth</span></div></article>
        <article class="project-card reveal" data-category="booth"><div class="project-image"><img src="{{ asset('assets/images/p-booth-02.jpg') }}" alt="G-Power exhibition booth" loading="lazy" /></div><div class="project-meta"><p>G-Power Booth</p><span>ICE BSD · Booth</span></div></article>

        <article class="project-card reveal" data-category="office"><div class="project-image"><img src="{{ asset('assets/images/p-office-01.jpg') }}" alt="Office lobby project" loading="lazy" /></div><div class="project-meta"><p>Lobby Lift DPR</p><span>Jakarta · Office</span></div></article>
        <article class="project-card reveal" data-category="office"><div class="project-image"><img src="{{ asset('assets/images/p-office-02.jpg') }}" alt="Office reception project" loading="lazy" /></div><div class="project-meta"><p>Reception</p><span>PT Momodis · Jakarta</span></div></article>
        <article class="project-card reveal" data-category="office"><div class="project-image"><img src="{{ asset('assets/images/p-office-03.jpg') }}" alt="Police lobby interior" loading="lazy" /></div><div class="project-meta"><p>Lobby Lift</p><span>DITTIPIDSIBER POLRI · Office</span></div></article>
        <article class="project-card reveal" data-category="office"><div class="project-image"><img src="{{ asset('assets/images/p-office-04.jpg') }}" alt="DITRESSIBER office project" loading="lazy" /></div><div class="project-meta"><p>DITRESSIBER Office</p><span>POLDA · Office</span></div></article>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 6. HOW WE WORK (Process)                                      --}}
    {{-- ============================================================ --}}
    <section class="process" id="process" aria-labelledby="process-title">
      <div class="process-image"><img src="{{ asset('assets/images/process.jpg') }}" alt="Office project used as process backdrop" loading="lazy" /></div>
      <div class="process-content">
        <div class="process-header reveal">
          <div class="process-section-index">09</div>
          <h2 id="process-title">How We Work</h2>
        </div>
        <ol class="process-steps">
          <li class="reveal">
            <span class="step-num">01</span>
            <div>
              <h3>Meet</h3>
              <p>We begin every project with a focused discovery session — listening to the client's vision, measuring the space, and understanding how the users will live and move within it. This stage sets the foundation for everything that follows.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">02</span>
            <div>
              <h3>Research</h3>
              <p>From the brief, we explore references, map the client's preferences, and identify spatial challenges. Brainstorming is done collaboratively so every decision is grounded in real needs — not assumption.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">03</span>
            <div>
              <h3>Concept</h3>
              <p>We define the design direction: visual style, atmosphere, material palette, and color language. The concept board gives the client a clear picture of the intended spatial character before any technical work begins.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">04</span>
            <div>
              <h3>Design</h3>
              <p>Space planning and layout are refined into detailed floor plans and preliminary 3D models. Every functional zone is considered — circulation, proportion, light, and the relationship between furniture and architecture.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">05</span>
            <div>
              <h3>Finalize</h3>
              <p>The approved design is developed into a full documentation package: photorealistic 3D renders, technical drawings, shop drawings, and a detailed bill of quantity — giving contractors and clients a complete reference for execution.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">06</span>
            <div>
              <h3>Create</h3>
              <p>Custom furniture and interior elements are produced through our own workshop. Quality is managed in-house — from raw material selection through finishing — ensuring every piece meets the agreed specifications.</p>
            </div>
          </li>
          <li class="reveal">
            <span class="step-num">07</span>
            <div>
              <h3>Install</h3>
              <p>Our team executes the full on-site installation with precision. After placement, we conduct a thorough quality check and attend to all final touches before handing the completed space over to the client.</p>
            </div>
          </li>
        </ol>
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
