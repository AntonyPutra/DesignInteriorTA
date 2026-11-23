{{-- Pratama Design Studio - Canonical Footer & Consultation Modal Component --}}

{{-- Interactive Consultation Modal --}}
<dialog id="contactModal" class="contact-modal" aria-labelledby="modalTitle">
  <div class="modal-dialog">
    <button type="button" class="modal-close" id="closeContactModal" aria-label="Close dialog">&times;</button>
    <div class="modal-header">
      <div class="card-kicker">
        <svg class="kicker-diamond" width="12" height="12" viewBox="0 0 12 12" fill="currentColor" aria-hidden="true">
          <path d="M6 0L12 6L6 12L0 6Z" />
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
        <select id="formSubject" name="subject" required>
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
        <textarea id="formMessage" name="message" rows="4"
          placeholder="Ceritakan ukuran lokasi, konsep yang diinginkan, atau estimasi jadwal..." required></textarea>
      </div>
      <button type="submit" class="btn-modal-submit">
        <span>Kirim Pesan Konsultasi</span>
        <span aria-hidden="true">&rarr;</span>
      </button>
    </form>
    <div id="formSuccessToast" class="form-toast" hidden>
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
      <span>Terima kasih! Pesan Anda telah terkirim. Tim Pratama akan segera menghubungi Anda.</span>
    </div>
  </div>
</dialog>

{{-- 4-Column Luxury Footer --}}
<footer class="contact-footer" id="contact" aria-labelledby="contact-title">
  <div class="contact-footer-inner">

    <!-- Column 1: Brand Info & Social Media -->
    <div class="footer-col footer-col-brand reveal">
      <div class="brand-badge-row">
        <span class="brand-icon-sm">
          <img src="{{ asset('assets/images/logo-mark.png') }}"
            onerror="this.onerror=null; this.src='/assets/images/logo-mark.png';"
            alt="Pratama Design Studio"
            class="w-5 h-auto object-contain">
        </span>
        <div class="brand-title-wrap">
          <strong id="contact-title" class="brand-main-title">Pratama Design Studio</strong>
          <span class="brand-sub-title">PT Pratama Berkah Utama</span>
        </div>
      </div>
      <p class="brand-desc">
        Pratama Design Studio &amp; Build spesialis konsultasi interior dan eksterior, desain arsitektur, perencanaan
        tata ruang, produksi custom workshop, dan renovasi di Jakarta.
      </p>
      <div class="social-icon-row" aria-label="Media Sosial & Portofolio Pratama">
        <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener noreferrer"
          class="social-circle-btn" aria-label="Instagram Pratama">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
          </svg>
        </a>
        <a href="https://pratamadesign.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn"
          aria-label="Website Resmi Pratama">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
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
        <li><a href="{{ route('home') }}"><span class="menu-chevron">&gt;</span> Home</a></li>
        <li><a href="{{ route('about') }}"><span class="menu-chevron">&gt;</span> About Us</a></li>
        <li><a href="{{ route('services.index') }}"><span class="menu-chevron">&gt;</span> Services</a></li>
        <li><a href="{{ route('portfolio.index') }}"><span class="menu-chevron">&gt;</span> Portfolio</a></li>
        <li><a href="{{ route('estimator.index') }}"><span class="menu-chevron">&gt;</span> Cost Estimator</a></li>
        <li><a href="{{ route('ai-portfolio.index') }}"><span class="menu-chevron">&gt;</span> Cari AI Portofolio</a>
        </li>
        <li><a href="{{ route('ai-estimator.index') }}"><span class="menu-chevron">&gt;</span> AI Estimator</a></li>
        <li><a href="{{ route('contact') }}"><span class="menu-chevron">&gt;</span> Konsultasi Form</a></li>
      </ul>
    </div>

    <!-- Column 3: Hubungi Kami -->
    <div class="footer-col footer-col-contact reveal">
      <h3 class="footer-col-title">Hubungi Kami</h3>
      <div class="footer-title-bar"></div>
      <div class="contact-info-list">
        <div class="contact-info-item">
          <span class="info-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </span>
          <div class="info-content">
            <span>Puri Orchard Apt. Orange Grove 21/09, Jakarta Barat 11740</span>
          </div>
        </div>

        <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer"
          class="contact-info-item contact-info-link">
          <span class="info-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
              </path>
            </svg>
          </span>
          <div class="info-content">
            <span>WhatsApp / Telepon: +62 822 1364 1995</span>
          </div>
        </a>

        <a href="mailto:pratamadsb@gmail.com" class="contact-info-item contact-info-link">
          <span class="info-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </span>
          <div class="info-content">
            <span>Email: pratamadsb@gmail.com</span>
          </div>
        </a>

        <div class="contact-info-item">
          <span class="info-icon" aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
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
        <a href="https://maps.google.com/?q=Puri+Orchard+Apartment+Jakarta" target="_blank" rel="noopener noreferrer"
          class="map-open-badge">
          <span>Open In Maps</span>
          <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
            <polyline points="15 3 21 3 21 9"></polyline>
            <line x1="10" y1="14" x2="21" y2="3"></line>
          </svg>
        </a>
        <iframe src="https://maps.google.com/maps?q=Puri+Orchard+Apartment+Jakarta&t=&z=14&ie=UTF8&iwloc=&output=embed"
          class="map-frame" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
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
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
      stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="19" x2="12" y2="5"></line>
      <polyline points="5 12 12 5 19 12"></polyline>
    </svg>
  </a>
</footer>