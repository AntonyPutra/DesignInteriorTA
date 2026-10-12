(() => {
  const body = document.body;
  const toggle = document.querySelector('.menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  const siteHeader = document.querySelector('.site-header');
  const hero = document.querySelector('.hero');

  const setMenu = (open) => {
    body.classList.toggle('menu-open', open);
    toggle?.setAttribute('aria-expanded', String(open));
    mobileMenu?.setAttribute('aria-hidden', String(!open));
  };

  let ticking = false;

  const introSection = document.querySelector('#introduction');
  const tocSection = document.querySelector('#toc');
  const desktopNavLinks = document.querySelectorAll('.desktop-nav a');
  const sections = Array.from(desktopNavLinks).map(link => {
    const targetId = link.getAttribute('href');
    if (targetId && targetId.startsWith('#') && targetId.length > 1) {
      try {
        return document.querySelector(targetId);
      } catch (e) {
        return null;
      }
    }
    return null;
  }).filter(Boolean);

  const syncHeaderVisibility = () => {
    if (!siteHeader) return;

    const currentScrollY = window.scrollY;
    // Navbar only appears once user reaches Table of Contents (#toc)
    const triggerSection = tocSection || introSection;
    const triggerOffset = triggerSection ? triggerSection.offsetTop : window.innerHeight * 2;
    const threshold = triggerOffset - 80;

    if (currentScrollY >= threshold) {
      siteHeader.classList.add('is-visible');
      siteHeader.classList.remove('is-hidden');
    } else {
      siteHeader.classList.add('is-hidden');
      siteHeader.classList.remove('is-visible');
    }
  };

  const updateActiveNavLink = () => {
    const currentScrollY = window.scrollY;
    let activeSection = null;

    // Find the section that matches current scroll position
    sections.forEach(section => {
      const offsetTop = section.offsetTop - 120; // 120px offset to switch active nav slightly early
      if (currentScrollY >= offsetTop) {
        activeSection = section;
      }
    });

    if (activeSection) {
      const activeId = activeSection.getAttribute('id');
      desktopNavLinks.forEach(link => {
        const isCurrent = link.getAttribute('href') === `#${activeId}`;
        link.classList.toggle('active', isCurrent);
      });
    }
  };

  const handleScroll = () => {
    syncHeaderVisibility();
    updateActiveNavLink();
  };

  toggle?.addEventListener('click', () => setMenu(!body.classList.contains('menu-open')));
  mobileMenu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenu(false)));
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMenu(false);
  });

  /* ── Portfolio cards: staggered entrance when grid scrolls into view ── */
  const projects     = Array.from(document.querySelectorAll('.project-card'));
  const STAGGER      = 80; // ms delay between each card
  let portfolioTriggered = false;
  let pendingTimers = [];

  const clearPendingTimers = () => {
    pendingTimers.forEach((id) => clearTimeout(id));
    pendingTimers = [];
  };

  const animateCardsIn = (cards) => {
    clearPendingTimers();
    cards.forEach((card, i) => {
      card.classList.remove('card-visible', 'card-exit');
      void card.offsetWidth; // force reflow
      const id = setTimeout(() => card.classList.add('card-visible'), i * STAGGER);
      pendingTimers.push(id);
    });
  };

  /* ── Page-load: staggered entrance when grid scrolls into view ── */
  const portfolioGrid = document.querySelector('#portfolioGrid');

  if (portfolioGrid && 'IntersectionObserver' in window) {
    const gridObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !portfolioTriggered) {
          portfolioTriggered = true;
          animateCardsIn(projects);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });

    gridObserver.observe(portfolioGrid);
  } else {
    projects.forEach((c) => c.classList.add('card-visible'));
  }


  const revealItems = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  }

  /* Introduction and TOC scroll animations are handled dynamically in onScroll via applySectionScrollTransition */

  /* ── Contact Modal & Form Handling ── */
  const contactModal = document.querySelector('#contactModal');
  const openModalBtn = document.querySelector('#openContactModal');
  const closeModalBtn = document.querySelector('#closeContactModal');
  const triggerPrayerBtns = document.querySelectorAll('.trigger-contact-modal');
  const contactForm = document.querySelector('#contactForm');
  const formSuccessToast = document.querySelector('#formSuccessToast');

  const openModal = () => {
    if (!contactModal) return;
    if (typeof contactModal.showModal === 'function') {
      contactModal.showModal();
    } else {
      contactModal.setAttribute('open', '');
    }
  };

  const closeModal = () => {
    if (!contactModal) return;
    if (typeof contactModal.close === 'function') {
      contactModal.close();
    } else {
      contactModal.removeAttribute('open');
    }
  };

  openModalBtn?.addEventListener('click', openModal);
  closeModalBtn?.addEventListener('click', closeModal);
  triggerPrayerBtns.forEach((btn) => btn.addEventListener('click', (e) => {
    e.preventDefault();
    openModal();
  }));

  // Close when clicking on dialog backdrop
  contactModal?.addEventListener('click', (event) => {
    const rect = contactModal.getBoundingClientRect();
    const isInDialog = (
      rect.top <= event.clientY &&
      event.clientY <= rect.top + rect.height &&
      rect.left <= event.clientX &&
      event.clientX <= rect.left + rect.width
    );
    if (!isInDialog) {
      closeModal();
    }
  });

  contactForm?.addEventListener('submit', (event) => {
    event.preventDefault();
    if (formSuccessToast) {
      formSuccessToast.hidden = false;
      const submitBtn = contactForm.querySelector('.btn-modal-submit');
      if (submitBtn) submitBtn.style.display = 'none';
      setTimeout(() => {
        contactForm.reset();
        formSuccessToast.hidden = true;
        if (submitBtn) submitBtn.style.display = '';
        closeModal();
      }, 2500);
    }
  });

  /* ── Back to Top Button ── */
  const backToTopBtn = document.querySelector('#backToTop');
  const syncBackToTop = () => {
    if (!backToTopBtn) return;
    if (window.scrollY > 400) {
      backToTopBtn.classList.add('is-visible');
    } else {
      backToTopBtn.classList.remove('is-visible');
    }
  };

  backToTopBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* ══════════════════════════════════════════════════
     THEME MANAGER (Light / Dark Mode with Transition)
     ══════════════════════════════════════════════════ */
  const getStoredOrPreferredTheme = () => {
    try {
      const stored = localStorage.getItem('pratama_theme');
      if (stored === 'dark' || stored === 'light') return stored;
    } catch (e) {}
    return (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : 'light';
  };

  const setTheme = (theme, animate = false) => {
    const isDark = theme === 'dark';
    const root = document.documentElement;
    const body = document.body;

    if (animate) {
      root.classList.add('theme-in-transition');
      
      // Trigger a luxury transition ripple effect
      const ripple = document.createElement('div');
      ripple.className = 'theme-transition-ripple';
      body.appendChild(ripple);
      
      requestAnimationFrame(() => {
        ripple.classList.add('is-active');
      });

      setTimeout(() => {
        ripple.remove();
        root.classList.remove('theme-in-transition');
      }, 550);
    }

    if (isDark) {
      root.setAttribute('data-theme', 'dark');
      root.classList.add('dark-theme');
      body.setAttribute('data-theme', 'dark');
      body.classList.add('dark-theme');
    } else {
      root.setAttribute('data-theme', 'light');
      root.classList.remove('dark-theme');
      body.setAttribute('data-theme', 'light');
      body.classList.remove('dark-theme');
    }

    try {
      localStorage.setItem('pratama_theme', theme);
    } catch (e) {}

    const allButtons = document.querySelectorAll('.theme-toggle-btn');
    allButtons.forEach(btn => {
      btn.setAttribute('aria-pressed', String(isDark));
      btn.setAttribute('title', isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap');
      btn.classList.toggle('is-dark', isDark);
    });
  };

  window.toggleTheme = () => {
    const current = document.documentElement.getAttribute('data-theme') || 
                    (document.body.classList.contains('dark-theme') ? 'dark' : 'light');
    const target = current === 'dark' ? 'light' : 'dark';
    setTheme(target, true);
  };

  // Sync initial button states
  const currentTheme = getStoredOrPreferredTheme();
  setTheme(currentTheme, false);

  // Global event delegation for all theme toggle buttons
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.theme-toggle-btn');
    if (btn) {
      e.preventDefault();
      e.stopPropagation();
      window.toggleTheme();
    }
  });

  // Listen for system theme changes if user hasn't explicitly set preference
  if (window.matchMedia) {
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
      if (!localStorage.getItem('pratama_theme')) {
        setTheme(e.matches ? 'dark' : 'light', true);
      }
    });
  }

  /* ── Hero Scroll Fade-Out Transition ── */
  const heroContentWrapper = hero?.querySelector('.hero-content-wrapper');
  const heroImageOverlay = hero?.querySelector('.hero-image-overlay');
  const heroImageEl = hero?.querySelector('.hero-image > img');

  const updateHeroScrollEffects = () => {
    if (!hero) return;
    const scrollY = window.scrollY;

    if (scrollY <= 0) {
      if (heroContentWrapper) {
        heroContentWrapper.style.opacity = '';
        heroContentWrapper.style.transform = '';
      }
      if (heroImageOverlay) {
        heroImageOverlay.style.opacity = '';
        heroImageOverlay.style.transform = '';
      }
      if (heroImageEl) {
        heroImageEl.style.opacity = '';
        heroImageEl.style.transform = '';
      }
      return;
    }

    const heroHeight = hero.offsetHeight || window.innerHeight;
    // Fade out smoothly across the first 60% of the hero scroll
    const fadeDistance = heroHeight * 0.6;
    const progress = Math.min(Math.max(scrollY / fadeDistance, 0), 1);

    const opacity = (1 - progress).toFixed(3);
    const translateY = (-(progress * 35)).toFixed(1);

    if (heroContentWrapper) {
      heroContentWrapper.style.opacity = opacity;
      heroContentWrapper.style.transform = `translateY(${translateY}px)`;
    }
    if (heroImageOverlay) {
      heroImageOverlay.style.opacity = opacity;
      heroImageOverlay.style.transform = `translateY(${translateY}px)`;
    }
    if (heroImageEl) {
      heroImageEl.style.opacity = opacity;
      heroImageEl.style.transform = `scale(${(1 + progress * 0.05).toFixed(3)}) translateY(${translateY}px)`;
    }
  };

  /* ── Section Scroll Transitions (Fade-In on Approach, Fade-Out on Scroll Down) ── */
  const introBar = introSection?.querySelector('.intro-bar');
  const introPhoto = introSection?.querySelector('.intro-photo');
  const introElements = [introBar, introPhoto].filter(Boolean);

  const tocHeader = tocSection?.querySelector('.toc-header');
  const tocBody = tocSection?.querySelector('.toc-body');
  const tocElements = [tocHeader, tocBody].filter(Boolean);

  const applySectionScrollTransition = (sectionEl, elements) => {
    if (!sectionEl || !elements || !elements.length) return;
    const rect = sectionEl.getBoundingClientRect();
    const vh = window.innerHeight;
    const height = rect.height || vh;

    // 1. Entering from bottom (Fade IN)
    const enterRange = vh * 0.7;
    const enterProgress = Math.min(Math.max((vh - rect.top) / enterRange, 0), 1);

    // 2. Leaving out top (Fade OUT when scrolling further down past section)
    const exitRange = Math.max(height * 0.55, vh * 0.55);
    const exitProgress = rect.top < 0 ? Math.min(Math.max((-rect.top) / exitRange, 0), 1) : 0;

    elements.forEach((el, index) => {
      if (!el) return;
      const stagger = index * 0.08;

      let elIn = Math.min(Math.max((enterProgress - stagger) / (1 - stagger || 1), 0), 1);
      let elOut = Math.min(Math.max((exitProgress - stagger * 0.4) / (1 - stagger * 0.4 || 1), 0), 1);

      let opacity = 1;
      let translateY = 0;

      if (elOut > 0) {
        // Fading OUT upwards as user scrolls down past section
        opacity = 1 - elOut;
        translateY = -(elOut * 32);
      } else {
        // Fading IN upwards as user scrolls into section
        opacity = elIn;
        translateY = (1 - elIn) * 32;
      }

      el.style.opacity = Math.max(0, Math.min(1, opacity)).toFixed(3);
      el.style.transform = `translateY(${translateY.toFixed(1)}px)`;
    });
  };

  const onScroll = () => {
    handleScroll();
    syncBackToTop();
    updateHeroScrollEffects();
    applySectionScrollTransition(introSection, introElements);
    applySectionScrollTransition(tocSection, tocElements);
  };

  onScroll();
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        onScroll();
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });
  window.addEventListener('resize', onScroll);
})();
