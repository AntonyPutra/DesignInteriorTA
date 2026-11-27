@extends('layouts.app')

@section('title', $portfolio->title . ' — Portfolio')
@section('meta_description', Str::limit($portfolio->description ?? $portfolio->title . ' — Proyek desain interior oleh Pratama Design Studio di Jakarta.', 160))

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

  <main class="portfolio-detail-main">
    {{-- ============================================================ --}}
    {{-- PANORAMIC DETAIL HERO                                        --}}
    {{-- ============================================================ --}}
    <section class="detail-hero" aria-label="{{ $portfolio->title }}">
      <div class="detail-hero-backdrop">
        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="detail-hero-bg-img" />
        <div class="detail-hero-overlay"></div>
      </div>

      <div class="detail-hero-content">
        <nav class="page-breadcrumb light-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ route('home') }}">Home</a>
          <span class="breadcrumb-sep" aria-hidden="true">›</span>
          <a href="{{ route('portfolio.index') }}">Portfolio</a>
          <span class="breadcrumb-sep" aria-hidden="true">›</span>
          <span class="breadcrumb-current">{{ Str::limit($portfolio->title, 26) }}</span>
        </nav>

        <div class="detail-hero-badges">
          @if($portfolio->category)
            <span class="badge-cat-tag">{{ $portfolio->category->name }}</span>
          @endif
          @if($portfolio->year)
            <span class="badge-year-tag">{{ $portfolio->year }}</span>
          @endif
        </div>

        <h1 class="detail-hero-title">{{ $portfolio->title }}</h1>

        <div class="detail-hero-meta-row">
          @if($portfolio->location)
            <span class="hero-meta-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              {{ $portfolio->location }}
            </span>
          @endif
          @if($portfolio->design_style)
            <span class="hero-meta-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
              {{ $portfolio->design_style }}
            </span>
          @endif
          @if($portfolio->room_type)
            <span class="hero-meta-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
              {{ $portfolio->room_type }}
            </span>
          @endif
        </div>
      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- DETAIL CONTENT & SIDEBAR SECTION                             --}}
    {{-- ============================================================ --}}
    <section class="detail-content-section section-pad">
      <div class="detail-container">
        
        <div class="detail-grid">
          
          {{-- Left Column: Narrative, Gallery & CTA --}}
          <div class="detail-main-col">
            
            <div class="detail-block">
              <div class="block-heading-wrap">
                <span class="block-eyebrow">Deskripsi Proyek</span>
                <h2 class="block-heading">Tentang Proyek</h2>
                <div class="block-divider"></div>
              </div>

              @if($portfolio->description)
                <div class="detail-prose">
                  {!! nl2br(e($portfolio->description)) !!}
                </div>
              @else
                <p class="prose-empty">Deskripsi dan rincian teknis untuk proyek ini sedang dalam penyusunan oleh tim desain kami.</p>
              @endif
            </div>

            {{-- Gallery Showcase --}}
            @if($portfolio->images && $portfolio->images->count())
              <div class="detail-block gallery-block">
                <div class="block-heading-wrap">
                  <span class="block-eyebrow">Visual Gallery</span>
                  <h3 class="block-heading">Galeri Foto Proyek</h3>
                  <div class="block-divider"></div>
                </div>

                <div class="gallery-grid">
                  @foreach($portfolio->images as $img)
                    <div class="gallery-item" onclick="openLightbox('{{ Storage::url($img->image) }}', '{{ addslashes($img->caption ?? $portfolio->title) }}')">
                      <img src="{{ Storage::url($img->image) }}" alt="{{ $img->caption ?? $portfolio->title }}" loading="lazy" />
                      <div class="gallery-item-overlay">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 3 21 3 21 9"></polyline><polyline points="9 21 3 21 3 15"></polyline><line x1="21" y1="3" x2="14" y2="10"></line><line x1="3" y1="21" x2="10" y2="14"></line></svg>
                        <span>Perbesar</span>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            {{-- Similar Project CTA Card --}}
            <div class="detail-cta-card">
              <div class="cta-card-content">
                <span class="cta-tag">Konsultasi Eksklusif</span>
                <h3>Tertarik dengan Konsep Desain Serupa?</h3>
                <p>Tim Pratama Design Studio siap mendiskusikan kebutuhan ruang, estimasi budget, dan konsep 3D sesuai lokasi Anda.</p>
              </div>
              <div class="cta-card-buttons">
                <a href="#contactModal" class="btn-primary-action trigger-contact-modal">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11Z"/></svg>
                  <span>Konsultasi Sekarang</span>
                </a>
                <a href="{{ route('portfolio.index') }}" class="btn-secondary-action">
                  <span>Semua Portofolio</span>
                  <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
              </div>
            </div>

          </div>

          {{-- Right Column: Sticky Project Specs --}}
          <div class="detail-sidebar-col">
            <div class="spec-card">
              <div class="spec-card-header">
                <h3>Detail Spesifikasi</h3>
                <span>Project Fact Sheet</span>
              </div>
              
              <div class="spec-list">
                @php
                  $specItems = [
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>', 'label' => 'Kategori', 'val' => $portfolio->category?->name],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>', 'label' => 'Jenis Proyek', 'val' => $portfolio->project_type],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>', 'label' => 'Jenis Ruangan', 'val' => $portfolio->room_type],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><line x1="2" y1="12" x2="22" y2="12"></line></svg>', 'label' => 'Design Style', 'val' => $portfolio->design_style],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>', 'label' => 'Lokasi', 'val' => $portfolio->location],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>', 'label' => 'Klien', 'val' => $portfolio->public_client_name],
                    ['icon' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>', 'label' => 'Tahun', 'val' => $portfolio->year],
                  ];
                @endphp

                @foreach($specItems as $item)
                  @if(!empty($item['val']))
                    <div class="spec-row">
                      <div class="spec-row-icon">{!! $item['icon'] !!}</div>
                      <div class="spec-row-content">
                        <span class="spec-label">{{ $item['label'] }}</span>
                        <strong class="spec-val">{{ $item['val'] }}</strong>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>

              {{-- WhatsApp Quick Action --}}
              <div class="spec-card-action">
                <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($portfolio->title) }}."
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn-whatsapp-direct">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                  </svg>
                  <span>Chat Tim via WhatsApp</span>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    {{-- ============================================================ --}}
    {{-- RELATED PORTFOLIOS SECTION                                   --}}
    {{-- ============================================================ --}}
    @if(isset($related) && $related->count())
      <section class="related-portfolio-section section-pad">
        <div class="portfolio-container">
          <div class="related-section-header">
            <div>
              <p class="section-eyebrow">Explore More</p>
              <h2 class="section-title">Karya Terkait Lainnya</h2>
            </div>
            <a href="{{ route('portfolio.index') }}" class="btn-view-all-link">
              <span>Semua Portofolio</span>
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8H13M13 8L8.5 3.5M13 8L8.5 12.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>

          <div class="portfolio-grid">
            @foreach($related as $rel)
              <x-portfolio-card :portfolio="$rel" />
            @endforeach
          </div>
        </div>
      </section>
    @endif
  </main>

  {{-- Lightbox Dialog Modal --}}
  <div id="lightboxModal" class="lightbox-dialog" onclick="closeLightbox()">
    <div class="lightbox-dialog-inner" onclick="event.stopPropagation()">
      <button class="lightbox-close-btn" type="button" aria-label="Tutup foto" onclick="closeLightbox()">&times;</button>
      <img id="lightboxImg" src="" alt="" class="lightbox-main-img" />
      <p id="lightboxCaption" class="lightbox-caption-text"></p>
    </div>
  </div>

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
  function openLightbox(src, caption) {
    const modal = document.getElementById('lightboxModal');
    const img = document.getElementById('lightboxImg');
    const cap = document.getElementById('lightboxCaption');
    if (modal && img) {
      img.src = src;
      cap.textContent = caption || '';
      modal.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeLightbox() {
    const modal = document.getElementById('lightboxModal');
    if (modal) {
      modal.classList.remove('is-open');
      document.body.style.overflow = '';
    }
  }

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
  });

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
