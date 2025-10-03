/* -------- Scroll fluide liens ancre -------- */
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

// --- Ouverture CV PDF / HTML (délégation + support .cv-btn & .prof-card__btn)
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".cv-btn, .prof-card__btn");
  if (!btn) return;

  const modal = document.getElementById("cv-modal");
  const frame = document.getElementById("cv-frame");
  const htmlBox = document.getElementById("cv-html");
  const downloadBtn = document.getElementById("cv-download");
  if (!modal || !frame || !htmlBox || !downloadBtn) return;

  modal.setAttribute("aria-hidden", "false");
  document.documentElement.classList.add("no-scroll");

  if (btn.dataset.type === "pdf") {
    frame.style.display = "block";
    htmlBox.style.display = "none";
    frame.src = btn.dataset.cv || "";
    downloadBtn.href = btn.dataset.cv || "#";
    downloadBtn.style.display = "inline-block";
  } else if (btn.dataset.type === "html") {
    frame.style.display = "none";
    htmlBox.style.display = "block";
    downloadBtn.style.display = "none";

    const name = btn.dataset.name || "Étudiant";
    const email = (name || "")
      .toLowerCase()
      .replace(/\s+/g, ".") + "@efrei.fr";

    // CV HTML par défaut
    htmlBox.innerHTML = `
      <h2>CV – ${name}</h2>
      <p><strong>Email :</strong> ${email}</p>
      <p><strong>Formation :</strong> Étudiant(e) en informatique – EFREI Paris</p>
      <h3>Compétences</h3>
      <div class="progress-item"><span>PHP</span><div class="progress"><div style="width:75%"></div></div></div>
      <div class="progress-item"><span>C</span><div class="progress"><div style="width:70%"></div></div></div>
      <div class="progress-item"><span>SQL</span><div class="progress"><div style="width:65%"></div></div></div>
      <div class="progress-item"><span>Gestion de projet</span><div class="progress"><div style="width:60%"></div></div></div>
    `;
  }
});

// Fermeture modale (backdrop + bouton)
document.addEventListener("click", (e) => {
  if (e.target.matches("[data-close-modal]")) {
    const modal = document.getElementById("cv-modal");
    if (modal) {
      modal.setAttribute("aria-hidden", "true");
      document.documentElement.classList.remove("no-scroll");
      // Nettoyage iframe pour stopper le PDF
      const frame = document.getElementById("cv-frame");
      if (frame) frame.src = "";
    }
  }
});
document.addEventListener("DOMContentLoaded", () => {
  if (window.Swiper) {
    new Swiper(".cv-carousel", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      centeredSlides: true,
      pagination: { el: ".swiper-pagination", clickable: true },
      navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      breakpoints: { 768: { slidesPerView: 2 }, 1200: { slidesPerView: 3 } }
    });
  }
});
document.addEventListener("DOMContentLoaded", () => {
  if (window.Swiper) {
    new Swiper(".cv-carousel", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      centeredSlides: true,
      autoHeight: true,
      pagination: { el: ".swiper-pagination", clickable: true },
      navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      breakpoints: {
        768: { slidesPerView: 2 },
        1200: { slidesPerView: 3 }
      }
    });
  }
});
