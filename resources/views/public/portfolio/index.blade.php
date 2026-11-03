@extends('layouts.app')

@section('title', 'Portfolio — Karya Kami')
@section('meta_description', 'Portfolio proyek Pratama Design Studio: Landed House, Apartment, F&B, Booth, Office. Lihat karya desain interior dan exterior terbaik kami di Jakarta.')

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
    <nav class="desktop-nav" aria-label="Main navigation">
      <a href="{{ route('home') }}#home">Home</a>
      <a href="{{ route('home') }}#about">About</a>
      <a href="{{ route('home') }}#services">Services</a>
      <a class="active" href="{{ route('portfolio.index') }}">Portfolio</a>
      <a href="{{ route('home') }}#contact">Contact</a>
    </nav>
    <div class="header-actions">
      {{-- Theme Switcher --}}
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
      <a href="{{ route('home') }}#home">Home</a>
      <a href="{{ route('home') }}#about">About</a>
      <a href="{{ route('home') }}#services">Services</a>
      <a class="active" href="{{ route('portfolio.index') }}">Portfolio</a>
      <a href="{{ route('home') }}#contact">Contact</a>
    </nav>
  </div>

  <main class="portfolio-page-main">
    {{-- ============================================================ --}}
    {{-- PAGE HERO (Minimalist & Luxury Editorial)                    --}}
    {{-- ============================================================ --}}
    <section class="page-hero" aria-labelledby="page-hero-title">
      <div class="page-hero-inner">
        <nav class="page-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ route('home') }}">Home</a>
          <span class="breadcrumb-sep" aria-hidden="true">›</span>
          <span class="breadcrumb-current">Portfolio</span>
        </nav>
        
        <p class="page-hero-eyebrow">Project Portfolio</p>
        <h1 class="page-hero-title" id="page-hero-title">Karya Kami</h1>
        <p class="page-hero-desc">
          Setiap proyek adalah cerminan dari kolaborasi kami dengan klien — menciptakan ruang yang fungsional, estetis, dan penuh makna.
        </p>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- PORTFOLIO CONTENT & FILTER SECTION                            --}}
    {{-- ============================================================ --}}
    <section class="portfolio-content-section section-pad">
      <div class="portfolio-container">
        
        {{-- Category Filter Bar --}}
        <div class="portfolio-filter-wrap">
          <div class="portfolio-filter-bar" role="tablist" aria-label="Kategori Portfolio">
            <a href="{{ route('portfolio.index') }}"
               class="filter-pill {{ $activeCategory === 'all' ? 'is-active' : '' }}"
               role="tab"
               aria-selected="{{ $activeCategory === 'all' ? 'true' : 'false' }}">
              <span class="filter-pill-icon">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
              </span>
              Semua
            </a>
            @foreach($categories as $category)
            <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}"
               class="filter-pill {{ $activeCategory === $category->slug ? 'is-active' : '' }}"
               role="tab"
               aria-selected="{{ $activeCategory === $category->slug ? 'true' : 'false' }}">
              {{ $category->name }}
            </a>
            @endforeach
          </div>

          {{-- Filter Counter --}}
          <div class="portfolio-count-meta">
            <span>Menampilkan <strong>{{ $portfolios->total() }}</strong> proyek</span>
            @if($activeCategory !== 'all')
              <span class="count-category-badge">Kategori: <em>{{ $categories->firstWhere('slug', $activeCategory)?->name }}</em></span>
            @endif
          </div>
        </div>

        {{-- Portfolio Grid --}}
        @if($portfolios->count())
          <div class="portfolio-grid" id="portfolioGalleryGrid">
            @foreach($portfolios as $portfolio)
              <x-portfolio-card :portfolio="$portfolio" />
            @endforeach
          </div>

          {{-- Custom Minimalist Pagination --}}
          @if($portfolios->hasPages())
            <div class="portfolio-pagination-wrap">
              {{ $portfolios->links() }}
            </div>
          @endif
        @else
          {{-- Clean Empty State --}}
          <div class="portfolio-empty-state">
            <div class="empty-state-icon">
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <polyline points="21 15 16 10 5 21"></polyline>
              </svg>
            </div>
            <h3>Belum Ada Proyek</h3>
            <p>Proyek dalam kategori ini belum tersedia saat ini.</p>
            <a href="{{ route('portfolio.index') }}" class="btn-return-all">
              <span>Lihat Semua Proyek</span>
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        @endif

        {{-- Consultation Callout Strip --}}
        <div class="portfolio-callout-strip">
          <div class="callout-copy">
            <p class="callout-eyebrow">Konsultasi Desain &amp; Build</p>
            <h3>Tertarik Mewujudkan Ruang Impian Anda?</h3>
            <p class="callout-desc">Diskusikan ide, ukuran ruang, dan preferensi estetika Anda bersama tim arsitek dan desainer interior Pratama.</p>
          </div>
          <div class="callout-action">
            <a href="#contactModal" class="btn-callout-consult trigger-contact-modal">
              <span>Konsultasikan Proyek</span>
              <svg width="15" height="15" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </div>

      </div>
    </section>
  </main>

  {{-- ============================================================ --}}
  {{-- KONSULTASI / CONTACT MODAL DIALOG                            --}}
  {{-- ============================================================ --}}
  <dialog class="contact-modal" id="contactModal">
    <div class="contact-modal-backdrop" onclick="document.getElementById('contactModal').close()"></div>
    <div class="contact-modal-box">
      <button class="modal-close-btn" type="button" aria-label="Tutup form" onclick="document.getElementById('contactModal').close()">&times;</button>
      <div class="modal-header">
        <span class="modal-brand-badge">P</span>
        <h3 class="modal-title">Konsultasi Proyek</h3>
        <p class="modal-subtitle">Ceritakan rencana interior atau renovasi Anda. Tim Pratama akan merespons dalam waktu 1x24 jam.</p>
      </div>
      <form class="modal-form" id="consultationModalForm" action="{{ route('consultation.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group">
            <label for="formName">Nama Lengkap</label>
            <input type="text" id="formName" name="name" placeholder="Nama Anda" required />
          </div>
          <div class="form-group">
            <label for="formEmail">Alamat Email</label>
            <input type="email" id="formEmail" name="email" placeholder="nama@email.com" required />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="formPhone">Nomor WhatsApp / HP</label>
            <input type="tel" id="formPhone" name="phone" placeholder="+62 8..." required />
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
    </div>
  </dialog>

  {{-- ============================================================ --}}
  {{-- 4-COLUMN CONTACT & FOOTER SECTION                             --}}
  {{-- ============================================================ --}}
  <footer class="contact-footer" id="contact" aria-labelledby="footer-title">
    <div class="contact-footer-inner">
      
      <!-- Column 1: Brand Info & Social Media -->
      <div class="footer-col footer-col-brand">
        <div class="brand-badge-row">
          <span class="brand-icon-sm">P</span>
          <div class="brand-title-wrap">
            <strong id="footer-title" class="brand-main-title">Pratama Design Studio</strong>
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
      <div class="footer-col footer-col-menu">
        <h3 class="footer-col-title">Menu Utama</h3>
        <div class="footer-title-bar"></div>
        <ul class="footer-menu-list">
          <li><a href="{{ route('home') }}#home"><span class="menu-chevron">&gt;</span> Home</a></li>
          <li><a href="{{ route('home') }}#about"><span class="menu-chevron">&gt;</span> About Us</a></li>
          <li><a href="{{ route('home') }}#services"><span class="menu-chevron">&gt;</span> Services</a></li>
          <li><a href="{{ route('portfolio.index') }}"><span class="menu-chevron">&gt;</span> Portfolio</a></li>
          <li><a href="{{ route('home') }}#process"><span class="menu-chevron">&gt;</span> How We Work</a></li>
          <li><a href="#contactModal" class="trigger-contact-modal"><span class="menu-chevron">&gt;</span> Konsultasi Form</a></li>
        </ul>
      </div>

      <!-- Column 3: Hubungi Kami -->
      <div class="footer-col footer-col-contact">
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
      <div class="footer-col footer-col-location">
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
      <p class="copyright-text">&copy; {{ date('Y') }} PT Pratama Berkah Utama. All rights reserved.</p>
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

@section('scripts')
<script>
  // Subpage script for modal triggering and active header
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
