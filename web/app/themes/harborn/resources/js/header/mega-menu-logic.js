export function initMegaMenu(hamburger, megaMenuOverlay, megaMenuClose) {
  if (!hamburger || !megaMenuOverlay || !megaMenuClose) {
    return;
  }

  hamburger.addEventListener('click', function () {
    megaMenuOverlay.classList.add('is-active');
    document.body.classList.add('mega-menu-open');
    document.querySelectorAll('.hamburger-toggle').forEach(btn => btn.classList.remove('is-active'));
    hamburger.classList.add('is-active');
  });

  megaMenuClose.addEventListener('click', function () {
    megaMenuOverlay.classList.remove('is-active');
    document.body.classList.remove('mega-menu-open');
    document.querySelectorAll('.hamburger-toggle').forEach(btn => btn.classList.remove('is-active'));
  });

  megaMenuOverlay.addEventListener('click', function (e) {
    if (e.target === megaMenuOverlay || e.target.closest('.mega-menu-close')) {
      megaMenuOverlay.classList.remove('is-active');
      document.body.classList.remove('mega-menu-open');
      document.querySelectorAll('.hamburger-toggle').forEach(btn => btn.classList.remove('is-active'));
    }
  });
}
