document.addEventListener('DOMContentLoaded', () => {
  /* -------- Scroll fluide vers les ancres -------- */
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a[href^="#"]');
    if (!a) return;
    const id = a.getAttribute('href');
    if (id && id.length > 1) {
      const el = document.querySelector(id);
      if (el) {
        e.preventDefault();
        const header = document.querySelector('.site-header.is-sticky');
        const offset = header ? header.offsetHeight : 0;
        const top = el.getBoundingClientRect().top + window.scrollY - offset - 8;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    }
  });

  /* -------- SLIDER PRINCIPAL -------- */
  const track = document.querySelector('.carousel-track');
  const slides = track ? Array.from(track.children) : [];
  const next = document.querySelector('.carousel-btn.next');
  const prev = document.querySelector('.carousel-btn.prev');
  let index = 0;
  let isTransitioning = false;
  let autoSlide;

  if (track && slides.length > 0) {
    // Largeur exacte d’un slide visible (sans marge/gap)
    const slideWidth = slides[0].offsetWidth;

    track.style.display = 'flex';
    track.style.transition = 'transform 0.6s ease';
    track.style.willChange = 'transform';

    // Clones pour effet infini
    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);
    track.appendChild(firstClone);
    track.insertBefore(lastClone, slides[0]);

    const allSlides = Array.from(track.children);
    index = 1; // on commence au vrai premier slide
    updatePosition(false);

    function updatePosition(animate = true) {
      track.style.transition = animate ? 'transform 0.6s ease' : 'none';
      const offset = index * slideWidth;
      track.style.transform = `translateX(-${offset}px)`;
    }

    function moveToNext() {
      if (isTransitioning) return;
      isTransitioning = true;
      index++;
      updatePosition();
    }

    function moveToPrev() {
      if (isTransitioning) return;
      isTransitioning = true;
      index--;
      updatePosition();
    }

    track.addEventListener('transitionend', () => {
      if (index === 0) {
        index = slides.length;
        updatePosition(false);
      } else if (index === slides.length + 1) {
        index = 1;
        updatePosition(false);
      }
      isTransitioning = false;
    });

    next?.addEventListener('click', moveToNext);
    prev?.addEventListener('click', moveToPrev);

    // Auto slide
    function startAutoSlide() {
      autoSlide = setInterval(moveToNext, 4000);
    }
    function stopAutoSlide() {
      clearInterval(autoSlide);
    }
    track.addEventListener('mouseenter', stopAutoSlide);
    track.addEventListener('mouseleave', startAutoSlide);

    // Swipe tactile
    let startX = 0;
    let endX = 0;
    track.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    });
    track.addEventListener('touchmove', (e) => {
      endX = e.touches[0].clientX;
    });
    track.addEventListener('touchend', () => {
      const diff = startX - endX;
      if (Math.abs(diff) > 50) {
        if (diff > 0) moveToNext();
        else moveToPrev();
      }
    });

    // Navigation clavier
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') moveToNext();
      if (e.key === 'ArrowLeft') moveToPrev();
    });

    startAutoSlide();

    // Dots (pagination)
    const dotsContainer = document.querySelector('.carousel-dots');
    if (dotsContainer) {
      slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
          index = i + 1;
          updatePosition();
          document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
          dot.classList.add('active');
        });
        dotsContainer.appendChild(dot);
      });
    }
  }

  /* -------- POPUP CV (PDF / HTML) -------- */
  const modal = document.getElementById("cv-modal");
  const frame = document.getElementById("cv-frame");
  const htmlBox = document.getElementById("cv-html");
  const downloadBtn = document.getElementById("cv-download");

  const CV_HTML = {
    anissa: `
      <h2>Anissa Dahabi</h2>
      <p><strong>Développeuse Web – EFREI Paris</strong></p>
      <p>Étudiante passionnée de développement web, appétente pour le PHP et les systèmes embarqués.</p>
      <h3>Compétences</h3>
      <div class="progress-item"><span>PHP</span><div class="progress"><div style="width:80%"></div></div></div>
      <div class="progress-item"><span>C</span><div class="progress"><div style="width:70%"></div></div></div>
      <div class="progress-item"><span>SQL</span><div class="progress"><div style="width:65%"></div></div></div>
      <h3>Formation</h3>
      <ul><li>EFREI Paris – Informatique</li></ul>
    `
  };

  document.addEventListener("click", (e) => {
    const btn = e.target.closest(".cv-btn, .prof-card__btn");
    if (!btn) return;
    if (!modal || !frame || !htmlBox || !downloadBtn) return;

    modal.setAttribute("aria-hidden", "false");
    document.documentElement.classList.add("no-scroll");

    const type = btn.dataset.type || (btn.dataset.html ? "html" : "pdf");
    if (type === "pdf") {
      frame.style.display = "block";
      htmlBox.style.display = "none";
      const src = btn.dataset.cv || "";
      frame.src = src;
      downloadBtn.href = src;
      downloadBtn.style.display = "inline-block";
    } else if (type === "html") {
      frame.style.display = "none";
      htmlBox.style.display = "block";
      downloadBtn.style.display = "none";
      const key = btn.dataset.html || "anissa";
      htmlBox.innerHTML = CV_HTML[key] || "<p>CV non disponible.</p>";
    }
  });

  /* -------- Fermeture du popup -------- */
  document.addEventListener("click", (e) => {
    if (e.target.matches("[data-close-modal], .cv-modal__backdrop")) {
      modal.setAttribute("aria-hidden", "true");
      document.documentElement.classList.remove("no-scroll");
      frame.src = "";
    }
  });
});
document.addEventListener("DOMContentLoaded", () => {
  // Swiper pour la section "Apprendre"
  new Swiper(".apprendre-slider", {
    slidesPerView: 1,
    loop: true,
    centeredSlides: true,
    pagination: {
      el: ".apprendre-slider .swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    effect: "fade",
    fadeEffect: { crossFade: true },
    speed: 800,
  });
});
  /* -------- SLIDER PRINCIPAL -------- */
  const track = document.querySelector('.carousel-track');
  const slides = track ? Array.from(track.children) : [];
  const next = document.querySelector('.carousel-btn.next');
  const prev = document.querySelector('.carousel-btn.prev');
  let index = 0;
  let isTransitioning = false;