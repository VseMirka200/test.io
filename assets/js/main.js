(function () {
  const burger = document.querySelector('[data-burger]');
  const nav = document.querySelector('[data-nav]');
  const dropdownBtn = document.querySelector('[data-dropdown-btn]');
  const dropdown = document.querySelector('[data-dropdown]');

  // mobile menu
  if (burger && nav) {
    burger.addEventListener('click', () => {
      nav.classList.toggle('open');
      burger.setAttribute('aria-expanded', nav.classList.contains('open') ? 'true' : 'false');
    });
  }

  // dropdown
  if (dropdownBtn && dropdown) {
    dropdownBtn.addEventListener('click', (e) => {
      e.preventDefault();
      dropdown.classList.toggle('open');
      dropdownBtn.setAttribute('aria-expanded', dropdown.classList.contains('open') ? 'true' : 'false');
    });

    // close dropdown on outside click
    document.addEventListener('click', (e) => {
      const inside = dropdown.contains(e.target);
      if (!inside) dropdown.classList.remove('open');
    });
  }

  // reveal animations
  const revealTargets = document.querySelectorAll(
    '.page-title, .subtitle, .section, .row, .tile, .hero, .portrait, .badge, .btn'
  );

  revealTargets.forEach((el, idx) => {
    el.classList.add('reveal');
    const delay = Math.min(idx * 60, 300);
    el.style.transitionDelay = `${delay}ms`;
  });

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReduced) {
    revealTargets.forEach((el) => el.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { rootMargin: '0px 0px -10% 0px', threshold: 0.1 }
  );

  revealTargets.forEach((el) => observer.observe(el));
})();
