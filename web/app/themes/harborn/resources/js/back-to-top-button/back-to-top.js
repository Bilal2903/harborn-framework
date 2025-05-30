export function initBackToTopButton() {
  const backToTopButton = document.getElementById('backToTopBtn');

  if (!backToTopButton) {
    return;
  }

  function toggleBackToTopButton() {
    if (window.scrollY > 200) {
      backToTopButton.classList.add('is-visible');
    } else {
      backToTopButton.classList.remove('is-visible');
    }
  }

  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        toggleBackToTopButton();
        ticking = false;
      });
      ticking = true;
    }
  });

  backToTopButton.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  toggleBackToTopButton();
}