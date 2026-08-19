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

  const aboutSection = document.querySelector('#about');
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
    const aboutOffset = aboutSection ? aboutSection.offsetTop : window.innerHeight;
    const threshold = aboutOffset - 80; // Triggers slightly before the About section starts

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

  const filterButtons = document.querySelectorAll('.filter-button');
  const projects     = document.querySelectorAll('.project-card');
  const STAGGER      = 60; // ms delay between each card

  /* ── Timer registry — cancel old timers before starting new animation ── */
  let pendingTimers = [];

  const clearPendingTimers = () => {
    pendingTimers.forEach((id) => clearTimeout(id));
    pendingTimers = [];
  };

  /* ── Staggered entrance for a set of cards ── */
  const animateCardsIn = (cards) => {
    clearPendingTimers();
    cards.forEach((card, i) => {
      // Reset to invisible start state
      card.classList.remove('card-visible', 'card-exit');
      void card.offsetWidth; // force reflow so CSS transition fires fresh
      const id = setTimeout(() => {
        card.classList.add('card-visible');
      }, i * STAGGER);
      pendingTimers.push(id);
    });
  };

  /* ── Fast staggered exit, then call done() ── */
  const animateCardsOut = (cards, done) => {
    clearPendingTimers();
    if (!cards.length) { done(); return; }
    cards.forEach((card) => {
      card.classList.remove('card-visible');
      card.classList.add('card-exit');
    });
    const id = setTimeout(done, 280);
    pendingTimers.push(id);
  };

  /* ── Filter button handler ── */
  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;
      filterButtons.forEach((item) => item.classList.toggle('active', item === button));

      const toShow = [];
      const toHide = [];

      projects.forEach((project) => {
        const match = filter === 'all' || project.dataset.category === filter;
        if (match) {
          toShow.push(project);
        } else {
          toHide.push(project);
        }
      });

      // 1. Exit currently-visible cards that don't belong to new filter
      animateCardsOut(toHide, () => {
        // 2. Hide exited cards, reset incoming cards to invisible state
        toHide.forEach((card) => {
          card.classList.add('is-hidden');
          card.classList.remove('card-exit');
        });
        toShow.forEach((card) => {
          card.classList.remove('is-hidden');
          card.classList.remove('card-visible', 'card-exit');
          void card.offsetWidth; // force layout before transition
        });
        // 3. Stagger-in the new cards
        animateCardsIn(toShow);
      });
    });
  });

  /* ── Page-load: staggered entrance when grid scrolls into view ── */
  const portfolioGrid = document.querySelector('#portfolioGrid');

  const triggerPortfolioEntrance = () => {
    const visibleCards = Array.from(projects).filter(
      (c) => !c.classList.contains('is-hidden')
    );
    animateCardsIn(visibleCards);
  };

  if (portfolioGrid && 'IntersectionObserver' in window) {
    const gridObserver = new IntersectionObserver((entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          triggerPortfolioEntrance();
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.05, rootMargin: '0px 0px -60px 0px' });

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

  const onScroll = () => {
    handleScroll();
    syncBackToTop();
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
