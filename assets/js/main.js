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
})();
