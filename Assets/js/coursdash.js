document.addEventListener("DOMContentLoaded", () => {
  // Accordéon
  document.querySelectorAll(".accordion").forEach(acc => {
    const list = acc.nextElementSibling;
    if (!list || !list.classList.contains("chapitres")) return;
    acc.addEventListener("click", () => {
      acc.classList.toggle("open");
      list.classList.toggle("show");
    });
  });

  // Navigation via les cartes
  document.querySelectorAll(".cards .card").forEach((card, i) => {
    card.addEventListener("click", () => {
      const chapitre = card.querySelector(".card-title").innerText.toLowerCase();
      // redirige vers page cours avec un paramètre GET
      window.location.href = "http://localhost/wordpress/cours/?chapitre=" + encodeURIComponent(chapitre);
    });
  });

  // Navigation via la sidebar
  document.querySelectorAll(".sidebar-right .chapitres li").forEach(li => {
    li.addEventListener("click", () => {
      const chapitre = li.innerText.split(":")[1].trim().toLowerCase();
      window.location.href = "http://localhost/wordpress/cours/?chapitre" + encodeURIComponent(chapitre);
    });
  });
});
