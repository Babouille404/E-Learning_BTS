document.addEventListener('DOMContentLoaded', () => {
  const propositions = document.querySelectorAll('.rponse .proposition-a');
  const bouton = document.querySelector('.valider');
  const jauge = document.querySelector('.jauge-avancement');

  let selected = null;
  let score = 0;
  let total = 1; // nb questions (à rendre dynamique plus tard)

  // Sélection d’une réponse
  propositions.forEach(prop => {
    prop.addEventListener('click', () => {
      propositions.forEach(p => p.classList.remove('selected'));
      prop.classList.add('selected');
      selected = prop;
    });
  });

  // Validation
  bouton.addEventListener('click', () => {
    if (!selected) {
      alert('Choisis une réponse !');
      return;
    }

    const text = selected.innerText.trim();
    if (text.includes('Paris')) {
      selected.classList.add('correct');
      score++;
    } else {
      selected.classList.add('wrong');
    }

    // Met à jour la jauge
    const percent = Math.round((score / total) * 100);
    jauge.style.width = percent + '%';

    // Change bouton
    bouton.innerText = "Question suivante ➡️";
    bouton.disabled = true;
  });
});
document.addEventListener('DOMContentLoaded', () => {
  const reponses = document.querySelectorAll('.reponse');
  const bouton = document.querySelector('.valider');
  const progress = document.querySelector('.progress');
  let selected = null;

  reponses.forEach(r => {
    r.addEventListener('click', () => {
      reponses.forEach(r2 => r2.classList.remove('selected'));
      r.classList.add('selected');
      selected = r;
    });
  });

  bouton.addEventListener('click', () => {
    if (!selected) return alert('Choisis une réponse !');

    if (selected.dataset.correct === "true") {
      selected.classList.add('correct');
      progress.style.width = "100%"; // exemple
    } else {
      selected.classList.add('wrong');
    }

    bouton.innerText = "Question suivante ➡️";
    bouton.disabled = true;
  });
});
document.addEventListener("DOMContentLoaded", () => {
  // Progression sidebar droite
  document.querySelectorAll(".chapitres li").forEach(li => {
    const progressText = li.querySelector(".progress");
    if (progressText) {
      const [done, total] = progressText.textContent.split("/").map(Number);
      if (done && total) {
        const percent = Math.min(100, (done / total) * 100);
        progressText.style.background = `linear-gradient(to right, #75AA3C ${percent}%, #EFF3FC ${percent}%)`;
        progressText.style.padding = "2px 8px";
        progressText.style.borderRadius = "6px";
        progressText.style.fontWeight = "600";
        progressText.style.fontSize = "12px";
      }
    }
  });

  // Validation des réponses du quiz
  const button = document.querySelector(".valider");
  if (button) {
    button.addEventListener("click", () => {
      document.querySelectorAll(".reponse").forEach(rep => {
        if (rep.dataset.correct === "true") {
          rep.style.background = "#d4edda";
          rep.style.borderColor = "#28a745";
        } else {
          rep.style.opacity = "0.6";
        }
      });
    });
  }
});
