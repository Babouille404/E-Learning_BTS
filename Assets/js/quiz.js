// Quiz minimal fonctionnel
(function () {
  const questions = [
    {
      q: "Calcule: 2 + 3 × 4",
      options: ["20", "14", "24", "18"],
      ans: 1 // 14
    },
    {
      q: "Résoudre: 2x + 6 = 10",
      options: ["x = 1", "x = 2", "x = 3", "x = 4"],
      ans: 1 // x=2
    },
    {
      q: "Priorité opératoire",
      options: ["Addition avant multiplication", "Multiplication avant addition", "Gauche vers droite sans règle", "Toujours les parenthèses en dernier"],
      ans: 1
    }
  ];

  const $q = document.getElementById('quiz-question');
  const $opts = document.getElementById('quiz-options');
  const $next = document.getElementById('quiz-next');
  const $feedback = document.getElementById('quiz-feedback');
  const $bar = document.getElementById('quiz-progressbar')?.querySelector('span');
  const $timer = document.getElementById('quiz-timer');

  if (!$q || !$opts || !$next || !$bar || !$timer) return;

  let i = 0, selected = null, time = 30, timerId = null;

  function render() {
    const cur = questions[i];
    $q.textContent = `Q${i + 1}. ${cur.q}`;
    $opts.innerHTML = '';
    cur.options.forEach((opt, idx) => {
      const li = document.createElement('li');
      li.textContent = opt;
      li.setAttribute('role', 'option');
      li.addEventListener('click', () => { select(idx); });
      $opts.appendChild(li);
    });
    $feedback.textContent = '';
    selected = null;
    $next.disabled = true;
    time = 30;
    $timer.textContent = time + 's';
    if (timerId) clearInterval(timerId);
    timerId = setInterval(tick, 1000);
    updateBar();
  }

  function select(idx) {
    selected = idx;
    [...$opts.children].forEach((li, j) => {
      li.setAttribute('aria-selected', j === idx ? 'true' : 'false');
    });
    $next.disabled = false;
  }

  function tick() {
    time--;
    if (time <= 0) {
      clearInterval(timerId);
      validate(true);
      return;
    }
    $timer.textContent = time + 's';
  }

  function validate(timeout = false) {
    const cur = questions[i];
    const correct = cur.ans;
    const children = [...$opts.children];
    children.forEach((li, idx) => {
      li.style.borderColor = idx === correct ? '#75AA3C' : '#D6DCF2';
      if (idx === selected && selected !== correct) {
        li.style.background = '#ffecec';
        li.style.borderColor = '#ff6b6b';
      }
    });
    $feedback.textContent = timeout
      ? 'Temps écoulé. Réponse correcte: ' + cur.options[correct]
      : (selected === correct ? 'Correct ✅' : 'Incorrect ❌');
    $next.disabled = false;
  }

  function updateBar() {
    const pct = ((i) / questions.length) * 100;
    $bar.style.width = pct + '%';
  }

  $next.addEventListener('click', () => {
    clearInterval(timerId);
    if (selected === null && $feedback.textContent === '') {
      validate(); // si on clique sans choisir, on valide quand même
      return;
    }
    i++;
    if (i >= questions.length) {
      $q.textContent = 'Terminé 🎉';
      $opts.innerHTML = '';
      $feedback.textContent = 'Bravo !';
      $bar.style.width = '100%';
      $timer.textContent = '—';
      $next.disabled = true;
      return;
    }
    render();
  });

  render();
})();
