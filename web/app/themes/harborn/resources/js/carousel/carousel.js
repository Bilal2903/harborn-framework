import gsap from 'gsap';

export function initCarousel() {
  const carousel = document.querySelector('swiper-container.mySwiper');
  if (carousel) {
    const cursor = document.createElement('div');
    cursor.className = 'carousel-cursor';
    cursor.innerHTML = '<span class="carousel-cursor__text">sleep<br>klik</span>';
    document.body.appendChild(cursor);

    cursor.style.display = 'none';

    const xTo = gsap.quickTo(cursor, 'x', { duration: 0.18, ease: 'power2.out' });
    const yTo = gsap.quickTo(cursor, 'y', { duration: 0.18, ease: 'power2.out' });

    function moveCursor(e) {
      xTo(e.clientX - cursor.offsetWidth / 2);
      yTo(e.clientY - cursor.offsetHeight / 2);
    }

    carousel.addEventListener('mouseenter', () => {
      cursor.style.display = 'flex';
      document.addEventListener('mousemove', moveCursor);
    });
    carousel.addEventListener('mouseleave', () => {
      cursor.style.display = 'none';
      document.removeEventListener('mousemove', moveCursor);
    });
  }
}