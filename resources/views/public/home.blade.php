@extends('layouts.app')

@section('title', 'pratamaid.')
@section('meta_description', 'Pratama Design Studio â€” studio desain interior & eksterior profesional di Jakarta, spesialis hunian, komersial, dan renovasi.')

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
    <nav class="desktop-nav" aria-label="Navigasi utama">
      <a class="active" href="#home" data-i18n="nav.home">Beranda</a>
      <a href="{{ route('about') }}" data-i18n="nav.about">Tentang</a>
      <a href="#services" data-i18n="nav.services">Layanan</a>
      <a href="#portfolio" data-i18n="nav.portfolio">Portofolio</a>
      <a href="#contact" data-i18n="nav.contact">Kontak</a>
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
      <a href="#home" data-i18n="nav.home">Beranda</a>
      <a href="{{ route('about') }}" data-i18n="nav.about">Tentang Kami</a>
      <a href="#services" data-i18n="nav.services">Layanan</a>
      <a href="#portfolio" data-i18n="nav.portfolio">Portofolio</a>
      <a href="#contact" data-i18n="nav.contact">Kontak</a>
    </nav>
  </div>

  <main>
    {{-- ============================================================ --}}
    {{-- HERO SECTION â€” Split Screen                                   --}}
    {{-- ============================================================ --}}
    <section class="hero" id="home" aria-labelledby="hero-title">

      {{-- LEFT PANEL: olive background --}}
      <div class="hero-copy">
        <div class="hero-content-wrapper">
          
          <div class="hero-header">
            <img class="hero-mark" src="{{ asset('assets/images/logo-mark.png') }}" alt="Pratamaid geometric mark" />
          </div>

          <div class="hero-main-copy">
            <p class="hero-eyebrow" data-i18n="hero.eyebrow">PT Pratama Berkah Utama</p>
            <h1 id="hero-title">Pratama<br><span data-i18n="hero.title_sub">Design Studio</span></h1>
            <p class="hero-desc" data-i18n="hero.desc">Mewujudkan ruang yang harmonis â€” menyatukan estetika yang indah dengan fungsi yang nyaman untuk kehidupan sehari-hari.</p>
          </div>

          <div class="hero-footer">
            <span data-i18n="hero.footer_profile">Profil Perusahaan</span>
            <span data-i18n="hero.footer_est">Berdiri 2021</span>
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
    {{-- 2. ABOUT US SECTION                                           --}}
    {{-- ============================================================ --}}
    <section class="about section-pad" id="about" aria-labelledby="about-title">
      <div class="about-heading reveal">
        <div class="section-index">01</div>
        <h2 id="about-title" data-i18n="about.title">Tentang Kami</h2>
      </div>

      <div class="about-grid">
        <div class="about-copy reveal">
          <p class="lead" data-i18n="about.lead">Pratama Design Studio &amp; Build adalah studio desain interior dan eksterior yang berfokus pada konsultasi, perencanaan, produksi, fit-out, hingga renovasi.</p>
          <p data-i18n="about.desc">Kami hadir untuk menciptakan ruang yang mendukung kebutuhan dan gaya hidup pengguna — memadukan karakter visual yang kuat dengan fungsi yang praktis. Berbasis di Jakarta, tim kami menangani proyek residensial, ritel, F&amp;B, dan perkantoran, didukung oleh workshop dan fasilitas produksi milik sendiri.</p>
          <div class="about-values">
            <span data-i18n="about.v1">Profesionalisme</span>
            <span data-i18n="about.v2">Integritas</span>
            <span data-i18n="about.v3">Inovasi</span>
            <span data-i18n="about.v4">Perhatian pada Detail</span>
          </div>
        </div>
        <figure class="image-frame reveal">
          <img src="{{ asset('assets/images/about.jpg') }}" alt="Interior project with warm wood, lighting and furniture" loading="lazy" />
          <figcaption data-i18n="about.caption">Pratamaid / Desain dan bangun interior &amp; eksterior</figcaption>
        </figure>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 3. WHAT WE DO / SERVICES                                      --}}
    {{-- ============================================================ --}}
    <section class="services section-pad" id="services" aria-labelledby="services-title">
      <div class="section-heading reveal">
        <div class="section-index">02</div>
        <h2 id="services-title" data-i18n="services.title">Layanan Kami</h2>
        <p data-i18n="services.subtitle">Dukungan proyek menyeluruh, dari diskusi awal di lokasi hingga instalasi dan sentuhan akhir.</p>
      </div>

      <div class="service-list reveal">
        <article><span>01</span><h3 data-i18n="services.s1_title">Konsultasi Fit-Out</h3><p data-i18n="services.s1_desc">Perencanaan ruang berdasarkan kebutuhan pengguna, anggaran, dan pengukuran lokasi sebelum eksekusi.</p></article>
        <article><span>02</span><h3 data-i18n="services.s2_title">Rencana &amp; Jadwal Proyek</h3><p data-i18n="services.s2_desc">Konsep desain, spesifikasi, dan perencanaan teknis yang disusun dalam jalur eksekusi yang jelas dan terstruktur.</p></article>
        <article><span>03</span><h3 data-i18n="services.s3_title">Anggaran Proyek</h3><p data-i18n="services.s3_desc">Pengendalian biaya yang bertujuan menghadirkan kualitas terbaik dalam anggaran proyek yang telah disepakati.</p></article>
        <article><span>04</span><h3 data-i18n="services.s4_title">Render Digital 3D</h3><p data-i18n="services.s4_desc">Visualisasi 3D untuk menyamakan ekspektasi desain sebelum proses konstruksi dan produksi dimulai.</p></article>
        <article><span>05</span><h3 data-i18n="services.s5_title">Produksi</h3><p data-i18n="services.s5_desc">Elemen interior custom diproduksi melalui workshop mandiri dan diselaraskan dengan spesifikasi proyek.</p></article>
        <article><span>06</span><h3 data-i18n="services.s6_title">Fit-Out &amp; Renovasi</h3><p data-i18n="services.s6_desc">Eksekusi lapangan yang mengubah desain yang telah disetujui menjadi ruang yang fungsional dan terselesaikan.</p></article>
      </div>

      <div class="service-gallery reveal" aria-label="Karya interior pilihan">
        <img src="{{ asset('assets/images/service-01.jpg') }}" alt="Interior kamar dan ruang santai" loading="lazy" />
        <img src="{{ asset('assets/images/service-02.jpg') }}" alt="Interior ruang tamu kontemporer gelap" loading="lazy" />
        <img src="{{ asset('assets/images/service-03.jpg') }}" alt="Interior kamar terang" loading="lazy" />
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 4. STATEMENT BANNER                                           --}}
    {{-- ============================================================ --}}
    <section class="statement" aria-label="Pernyataan merek">
      <img src="{{ asset('assets/images/statement.jpg') }}" alt="Ruang tamu cerah yang elegan" loading="lazy" />
      <div class="statement-shade"></div>
      <p class="reveal" data-i18n="statement.text"><span>Mengubah Ide</span> menjadi Ruang yang Hidup</p>
    </section>

    {{-- ============================================================ --}}
    {{-- 5. PROJECT PORTFOLIO                                          --}}
    {{-- ============================================================ --}}
    <section class="portfolio section-pad" id="portfolio" aria-labelledby="portfolio-title">
      <div class="portfolio-top reveal">
        <div class="portfolio-top-left">
          <p class="portfolio-eyebrow" data-i18n="portfolio.eyebrow">Portofolio Proyek</p>
          <h2 id="portfolio-title" data-i18n="portfolio.title">Karya Kami</h2>
        </div>
        <a href="/portfolio" class="btn-lihat-semua" aria-label="Lihat semua proyek">
          <span data-i18n="portfolio.btn_all">Lihat Semua Proyek</span>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>

      <div class="portfolio-grid" id="portfolioGrid">
        @if(isset($portfolios) && $portfolios->count() > 0)
          @foreach($portfolios as $p)
            <a href="{{ route('portfolio.show', $p->slug) }}" class="project-card card-visible" aria-label="{{ $p->title }}">
              <div class="project-image">
                <img src="{{ $p->image_url }}" alt="{{ $p->title }}" loading="lazy" />
                @if($p->category)
                  <div class="card-badges">
                    <span class="card-badge-cat">{{ $p->category->name }}</span>
                    @if($p->year)
                      <span class="card-badge-year">{{ $p->year }}</span>
                    @endif
                  </div>
                @endif
                <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
              </div>
              <div class="project-meta">
                <p>{{ $p->title }}</p>
                <span>{{ $p->location ? $p->location . ' Â· ' : '' }}{{ $p->category->name ?? 'Portfolio' }}</span>
              </div>
            </a>
          @endforeach
        @else
          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="Full House Jelambar">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-landed-05.jpg') }}" alt="Full House Jelambar" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>Full House</p><span>Jelambar Â· Landed House</span></div>
          </a>

          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="Master Bedroom Cengkareng">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-landed-03.jpg') }}" alt="Master Bedroom Cengkareng" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>Master Bedroom</p><span>Cengkareng Â· Landed House</span></div>
          </a>

          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="Pent House Karawaci">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-apartment-03.jpg') }}" alt="Pent House Karawaci" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>Pent House</p><span>Karawaci Â· Apartment</span></div>
          </a>

          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="KATA Kopi PIK">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-fnb-02.jpg') }}" alt="KATA Kopi PIK" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>KATA Kopi</p><span>PIK Â· F&amp;B</span></div>
          </a>

          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="G-Power Exhibition Booth">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-booth-02.jpg') }}" alt="G-Power Exhibition Booth" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>G-Power Booth</p><span>ICE BSD Â· Booth</span></div>
          </a>

          <a href="{{ route('portfolio.index') }}" class="project-card card-visible" aria-label="Lobby Lift DPR Jakarta">
            <div class="project-image">
              <img src="{{ asset('assets/images/p-office-01.jpg') }}" alt="Lobby Lift DPR Jakarta" loading="lazy" />
              <div class="card-overlay"><span class="card-overlay-label" data-i18n="portfolio.overlay">Selengkapnya</span></div>
            </div>
            <div class="project-meta"><p>Lobby Lift DPR</p><span>Jakarta Â· Office</span></div>
          </a>
        @endif
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 6. CARA KAMI BEKERJA (Alur Proses - Timeline Roadmap)         --}}
    {{-- ============================================================ --}}
    <section class="process-section section-pad" id="process" aria-labelledby="process-title">
      {{-- Subtle Ambient Room Backdrop --}}
      <div class="process-ambient-backdrop" aria-hidden="true">
        <img src="{{ asset('assets/images/hero-living.jpg') }}?v={{ filemtime(public_path('assets/images/hero-living.jpg')) }}" alt="" loading="lazy" />
        <div class="process-ambient-overlay"></div>
      </div>

      <div class="process-inner">
        {{-- Section Header --}}
        <div class="process-header reveal">
          <p class="process-eyebrow" data-i18n="process.eyebrow">Alur Kerja Kami</p>
          <h2 class="process-title" id="process-title" data-i18n="process.title">Cara Kerja Kami</h2>
          <div class="process-header-line"></div>
          <p class="process-subtitle" data-i18n="process.subtitle">Tahapan terstruktur, transparan, dan terarah dari awal konsultasi hingga instalasi interior berkualitas tinggi.</p>
        </div>

        {{-- Vertical Alternating Timeline (Minimalist Text-Only) --}}
        <div class="process-timeline reveal">
          {{-- Central Vertical Dashed Line --}}
          <div class="timeline-line" aria-hidden="true"></div>

          {{-- Tahap 01 (Text Kiri, Badge Tengah, Spacer Kanan) --}}
          <div class="timeline-row row-left-text">
            <div class="timeline-col timeline-text">
              <span class="timeline-step-tag" data-i18n="process.step1_tag">Tahap 01</span>
              <h3 class="timeline-heading" data-i18n="process.step1_title">Konsultasi Awal</h3>
              <p class="timeline-desc" data-i18n="process.step1_desc">Diskusi mendalam mengenai kebutuhan ruang, preferensi gaya, pengukuran lokasi langsung, dan estimasi rencana anggaran secara transparan.</p>
            </div>
            <div class="timeline-node">
              <span class="timeline-badge">01</span>
            </div>
            <div class="timeline-col timeline-spacer" aria-hidden="true"></div>
          </div>

          {{-- Tahap 02 (Spacer Kiri, Badge Tengah, Text Kanan) --}}
          <div class="timeline-row row-right-text">
            <div class="timeline-col timeline-spacer" aria-hidden="true"></div>
            <div class="timeline-node">
              <span class="timeline-badge">02</span>
            </div>
            <div class="timeline-col timeline-text">
              <span class="timeline-step-tag" data-i18n="process.step2_tag">Tahap 02</span>
              <h3 class="timeline-heading" data-i18n="process.step2_title">Perencanaan &amp; Konsep</h3>
              <p class="timeline-desc" data-i18n="process.step2_desc">Penyusunan denah tata letak (layout), kurasi material &amp; palet warna (moodboard), serta penjadwalan pengerjaan proyek yang jelas.</p>
            </div>
          </div>

          {{-- Tahap 03 (Text Kiri, Badge Tengah, Spacer Kanan) --}}
          <div class="timeline-row row-left-text">
            <div class="timeline-col timeline-text">
              <span class="timeline-step-tag" data-i18n="process.step3_tag">Tahap 03</span>
              <h3 class="timeline-heading" data-i18n="process.step3_title">Visualisasi 3D</h3>
              <p class="timeline-desc" data-i18n="process.step3_desc">Penyajian render 3D fotorealistis dan gambar teknis kerja (shop drawing) agar Anda melihat hasil nyata sebelum tahap produksi dimulai.</p>
            </div>
            <div class="timeline-node">
              <span class="timeline-badge">03</span>
            </div>
            <div class="timeline-col timeline-spacer" aria-hidden="true"></div>
          </div>

          {{-- Tahap 04 (Spacer Kiri, Badge Tengah, Text Kanan) --}}
          <div class="timeline-row row-right-text">
            <div class="timeline-col timeline-spacer" aria-hidden="true"></div>
            <div class="timeline-node">
              <span class="timeline-badge">04</span>
            </div>
            <div class="timeline-col timeline-text">
              <span class="timeline-step-tag" data-i18n="process.step4_tag">Tahap 04</span>
              <h3 class="timeline-heading" data-i18n="process.step4_title">Produksi &amp; Fit-Out</h3>
              <p class="timeline-desc" data-i18n="process.step4_desc">Fabrikasi custom furniture di workshop mandiri dengan material pilihan, serta instalasi on-site presisi hingga ruang siap dihuni.</p>
            </div>
          </div>

        </div>

        {{-- Filosofi Desain --}}
        <div class="process-philosophy reveal">
          <p class="philosophy-eyebrow" data-i18n="process.philosophy_eyebrow">Filosofi Desain</p>
          <blockquote class="philosophy-quote" data-i18n="process.philosophy_quote">&ldquo;Setiap sudut ruang memiliki cerita. Kami merancang harmoni antara keindahan estetika dan kenyamanan fungsi hunian.&rdquo;</blockquote>
        </div>

      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 7. TESTIMONIALS â€” Kata Klien Kami                             --}}
    {{-- ============================================================ --}}
    <section class="testimonials-section section-pad" id="testimonials" aria-labelledby="testi-title">
      <div class="testi-inner">

        <div class="testi-header reveal">
          <p class="testi-eyebrow" data-i18n="testi.eyebrow">Kata Klien Kami</p>
          <h2 class="testi-title" id="testi-title" data-i18n="testi.title">Kepercayaan Mereka,<br>Kebanggaan Kami</h2>
        </div>

        {{-- Masonry 3-Column Grid --}}
        <div class="testi-grid reveal">

          {{-- Col 1 --}}
          <div class="testi-col">

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q1">"Kami sangat puas dengan hasil desain ruang tamu kami. Tim Pratama benar-benar memahami keinginan kami dan menghadirkan ruang yang elegan, nyaman, dan fungsional sesuai budget yang disepakati."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Budi &amp; Rini Santoso</span>
                <span class="testi-service">Full House Â· Landed House</span>
                <span class="testi-date">Februari 2024</span>
              </div>
            </article>

            <article class="testi-card testi-card-featured">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q2">"Prosesnya sangat terstruktur dari awal hingga akhir. Visualisasi 3D yang diberikan sangat membantu kami membayangkan hasilnya sebelum konstruksi dimulai. Hasilnya melebihi ekspektasi!"</blockquote>
              <div class="testi-author">
                <span class="testi-name">Hendri Kurniawan</span>
                <span class="testi-service">Master Bedroom Â· Cengkareng</span>
                <span class="testi-date">Mei 2024</span>
              </div>
            </article>

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q3">"Komunikasi tim sangat baik dan responsif. Mereka selalu memberikan laporan perkembangan pekerjaan setiap harinya. Sangat puas dengan hasilnya!"</blockquote>
              <div class="testi-author">
                <span class="testi-name">Anita Wijaya</span>
                <span class="testi-service">Coffee Shop Â· F&amp;B</span>
                <span class="testi-date">Agustus 2024</span>
              </div>
            </article>

          </div>

          {{-- Col 2 --}}
          <div class="testi-col">

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q4">"Pratama Design Studio mengubah ruang kantor kami menjadi tempat yang produktif dan representatif. Desainnya modern dan profesional, sangat sesuai dengan identitas perusahaan kami."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Direktur PT Sarana Maju</span>
                <span class="testi-service">Office Renovation Â· Jakarta</span>
                <span class="testi-date">Oktober 2023</span>
              </div>
            </article>

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q5">"Saya rekomendasikan Pratama untuk siapa saja yang mencari interior premium dengan harga yang masuk akal. Material yang digunakan berkualitas tinggi dan finishing-nya sangat rapi."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Kevin Tandjaya</span>
                <span class="testi-service">Pent House Â· Apartment</span>
                <span class="testi-date">Januari 2024</span>
              </div>
            </article>

            <article class="testi-card testi-card-featured">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q6">"Workshop mandiri mereka adalah nilai tambah yang besar! Furnitur custom yang diproduksi sangat presisi dan sesuai gambar teknis. Tidak ada celah antara desain dan hasil akhirnya."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Melissa Hartono</span>
                <span class="testi-service">Full House Â· Jelambar</span>
                <span class="testi-date">Maret 2024</span>
              </div>
            </article>

          </div>

          {{-- Col 3 --}}
          <div class="testi-col">

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q7">"Stand pameran kami di ICE BSD mendapat perhatian luar biasa berkat desain Pratama yang menonjol dan fungsional. Mereka sangat profesional dalam mengelola proyek dengan tenggat waktu yang ketat."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Tim G-Power Indonesia</span>
                <span class="testi-service">Exhibition Booth Â· ICE BSD</span>
                <span class="testi-date">September 2023</span>
              </div>
            </article>

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q8">"Detail perhatian mereka luar biasa. Setiap sudut ruangan diperhatikan dengan baik. Dari pemilihan warna hingga pencahayaan, semuanya kohesif dan menciptakan suasana yang hangat."</blockquote>
              <div class="testi-author">
                <span class="testi-name">Sari Dewi Rahayu</span>
                <span class="testi-service">Residential Â· Karawaci</span>
                <span class="testi-date">Juli 2024</span>
              </div>
            </article>

            <article class="testi-card">
              <div class="testi-stars" aria-label="5 bintang">
                â˜…â˜…â˜…â˜…â˜…
              </div>
              <blockquote class="testi-quote" data-i18n="testi.q9">"Mulai dari konsultasi hingga serah terima kunci, semuanya berjalan lancar. Tim yang ramah, berpengalaman, dan sangat mendengarkan keinginan klien. Akan menggunakan jasa mereka lagi!"</blockquote>
              <div class="testi-author">
                <span class="testi-name">Bagas Prasetyo</span>
                <span class="testi-service">Dining Room &amp; Living Area</span>
                <span class="testi-date">November 2023</span>
              </div>
            </article>

          </div>

        </div>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 8. CTA / KONSULTASI (Siap Mewujudkan Ruang Impian Anda?)      --}}
    {{-- ============================================================ --}}
    <section class="cta-consult-section section-pad" id="cta-consult" aria-labelledby="cta-title">
      <div class="cta-consult-container reveal">
        {{-- Top Customer Service / Consultation Badge Icon --}}
        <div class="cta-icon-badge" aria-hidden="true">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
            <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
          </svg>
        </div>

        {{-- Heading --}}
        <h2 id="cta-title" class="cta-title" data-i18n="cta.title">Siap Mewujudkan Ruang Impian Anda?</h2>

        {{-- Description --}}
        <p class="cta-desc" data-i18n="cta.desc">Konsultasikan kebutuhan desain interior Anda bersama tim kami.<br>Gratis pre-layout concept dan estimasi awal.</p>

        {{-- Action Buttons --}}
        <div class="cta-actions">
          {{-- WhatsApp Button --}}
          <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio,%20saya%20ingin%20konsultasi%20desain%20interior" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="btn-cta-wa"
             aria-label="Chat via WhatsApp">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
            <span data-i18n="cta.btn_wa">CHAT VIA WHATSAPP</span>
          </a>

          {{-- Consultation Form Button (triggers modal) --}}
          <button type="button" class="btn-cta-form trigger-contact-modal" aria-label="Isi Form Konsultasi">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
              <polyline points="14 2 14 8 20 8"></polyline>
              <line x1="16" y1="13" x2="8" y2="13"></line>
              <line x1="16" y1="17" x2="8" y2="17"></line>
              <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <span data-i18n="cta.btn_form">ISI FORM KONSULTASI</span>
          </button>
        </div>

        {{-- Contact Meta Line --}}
        <div class="cta-contact-meta">
          <a href="tel:+6282213641995" class="cta-meta-item">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
            </svg>
            <span>+62 822 1364 1995</span>
          </a>
          <span class="cta-meta-sep" aria-hidden="true">&middot;</span>
          <a href="mailto:pratamadsb@gmail.com" class="cta-meta-item">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span>pratamadsb@gmail.com</span>
          </a>
          <span class="cta-meta-sep" aria-hidden="true">&middot;</span>
          <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener noreferrer" class="cta-meta-item">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
            <span>@pratamaid.studio</span>
          </a>
        </div>
      </div>
    </section>
  </main>

  {{-- ============================================================ --}}
  {{-- 9. INTERACTIVE CONTACT & CONSULTATION MODAL                   --}}
  {{-- ============================================================ --}}
  <dialog id="contactModal" class="contact-modal" aria-labelledby="modalTitle">
    <div class="modal-dialog">
      <button type="button" class="modal-close" id="closeContactModal" aria-label="Tutup dialog">&times;</button>
      <div class="modal-header">
        <div class="card-kicker">
          <svg class="kicker-diamond" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" aria-hidden="true">
            <path d="M6 0L12 6L6 12L0 6Z"/>
          </svg>
          <span data-i18n="modal.kicker">KONSULTASI DESAIN</span>
        </div>
        <h3 id="modalTitle" data-i18n="modal.title">Mulai Proyek Anda</h3>
        <p data-i18n="modal.desc">Diskusikan kebutuhan interior atau eksterior Anda dengan tim desainer dan kontraktor Pratama.</p>
      </div>
      <form id="contactForm" class="contact-form" action="{{ route('consultation.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="formName" data-i18n="modal.name">Nama Lengkap</label>
          <input type="text" id="formName" name="name" placeholder="Nama Anda" data-i18n-placeholder="modal.name_placeholder" required />
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="formEmail" data-i18n="modal.email">Email</label>
            <input type="email" id="formEmail" name="email" placeholder="nama@email.com" data-i18n-placeholder="modal.email_placeholder" required />
          </div>
          <div class="form-group">
            <label for="formPhone" data-i18n="modal.phone">Nomor WhatsApp / HP</label>
            <input type="tel" id="formPhone" name="phone" placeholder="+62 8..." data-i18n-placeholder="modal.phone_placeholder" required />
          </div>
        </div>
        <div class="form-group">
          <label for="formSubject" data-i18n="modal.service">Jenis Layanan</label>
          <select id="formSubject" name="subject">
            <option value="residential" data-i18n="modal.opt_res">Interior Rumah Tinggal (Landed House)</option>
            <option value="apartment" data-i18n="modal.opt_apt">Interior Apartemen</option>
            <option value="commercial" data-i18n="modal.opt_com">Komersial / F&amp;B / Cafe / Resto</option>
            <option value="office" data-i18n="modal.opt_off">Kantor / Office &amp; Reception</option>
            <option value="booth" data-i18n="modal.opt_bth">Booth Pameran</option>
            <option value="consultation" data-i18n="modal.opt_cns">Konsultasi &amp; Estimasi Biaya</option>
          </select>
        </div>
        <div class="form-group">
          <label for="formMessage" data-i18n="modal.msg">Detail Proyek / Pesan</label>
          <textarea id="formMessage" name="message" rows="4" placeholder="Ceritakan ukuran lokasi, konsep yang diinginkan, atau estimasi jadwal..." data-i18n-placeholder="modal.msg_placeholder" required></textarea>
        </div>
        <button type="submit" class="btn-modal-submit">
          <span data-i18n="modal.submit">Kirim Pesan Konsultasi</span>
          <span aria-hidden="true">â†’</span>
        </button>
      </form>
      <div id="formSuccessToast" class="form-toast" hidden>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
          <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
        <span data-i18n="modal.success">Terima kasih! Pesan Anda telah terkirim. Tim Pratama akan segera menghubungi Anda.</span>
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
          <li><a href="#home"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_home">Beranda</span></a></li>
          <li><a href="{{ route('about') }}"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_about">Tentang Kami</span></a></li>
          <li><a href="#services"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_services">Layanan</span></a></li>
          <li><a href="#portfolio"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_portfolio">Portofolio</span></a></li>
          <li><a href="#process"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_process">Cara Kerja Kami</span></a></li>
          <li><a href="#testimonials"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_testimonials">Kata Klien Kami</span></a></li>
          <li><a href="#cta-consult"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_principal">Konsultasi Desain</span></a></li>
          <li><a href="#contact" class="trigger-contact-modal"><span class="menu-chevron">&gt;</span> <span data-i18n="footer.nav_consult">Form Konsultasi</span></a></li>
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
              <span data-i18n="footer.hours">Jam Kerja: Senin â€“ Sabtu 08:30 â€“ 17:30</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Column 4: Lokasi Kami (Map) -->
      <div class="footer-col footer-col-location reveal">
        <h3 class="footer-col-title" data-i18n="footer.location_title">Lokasi Kami</h3>
        <div class="footer-title-bar"></div>
        <div class="map-card-container">
          <a href="https://maps.google.com/?q=Puri+Orchard+Apartment+Jakarta" target="_blank" rel="noopener noreferrer" class="map-open-badge">
            <span data-i18n="footer.map_badge">Buka di Maps</span>
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
      <p class="copyright-text" data-i18n="footer.copyright">&copy; 2026 PT Pratama Berkah Utama. Seluruh hak cipta dilindungi.</p>
      <p class="tagline-text" data-i18n="footer.tagline">Desain &amp; Bangun Interior dan Eksterior &middot; Jakarta</p>
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
