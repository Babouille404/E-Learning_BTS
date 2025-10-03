document.addEventListener("DOMContentLoaded", () => {
  const API = {
    base: "https://ce.judge0.com",
    headers: { "Content-Type": "application/json" }
  };
  const LANG = { c: 50, php: 68 };

  async function runCode(source, lang, input = "") {
    const post = await fetch(`${API.base}/submissions?base64_encoded=false&wait=false`, {
      method: "POST",
      headers: API.headers,
      body: JSON.stringify({
        source_code: source,
        language_id: LANG[lang],
        stdin: input
      })
    });
    const { token } = await post.json();

    // Poll résultat
    let res, tries = 0;
    while (tries < 15) {
      const r = await fetch(`${API.base}/submissions/${token}`, { headers: API.headers });
      res = await r.json();
      if (res.status && res.status.id > 2) break;
      await new Promise(s => setTimeout(s, 1000));
      tries++;
    }
    return res;
  }

  // Tabs
  document.querySelectorAll(".code-tabs .tab").forEach(tab => {
    tab.addEventListener("click", () => {
      const parent = tab.closest(".cours-main");
      parent.querySelectorAll(".tab").forEach(t => t.classList.remove("active"));
      parent.querySelectorAll(".code-block").forEach(b => b.classList.remove("active"));
      tab.classList.add("active");
      parent.querySelector("#" + tab.dataset.target).classList.add("active");
    });
  });

  // Boutons Run
  document.querySelectorAll(".run-btn").forEach(btn => {
    btn.addEventListener("click", async () => {
      const block = btn.closest(".code-block");
      const editor = block.querySelector(".editor");
      const stdin = block.querySelector(".stdin")?.value || "";
      const out = block.querySelector(".output");

      out.textContent = "⏳ Compilation en cours...";
      try {
        const res = await runCode(editor.value, btn.dataset.lang, stdin);
        if (res.stdout) out.textContent = res.stdout;
        else if (res.stderr) out.textContent = "❌ " + res.stderr;
        else out.textContent = "⚠️ " + (res.status?.description || "Erreur inconnue");
      } catch (e) {
        out.textContent = "💥 Erreur : " + e.message;
      }
    });
  });

  // Gestion de la sidebar droite
  document.querySelectorAll(".sidebar-right .chapitres li").forEach(li => {
    li.addEventListener("click", () => {
      // désactiver tout
      document.querySelectorAll(".sidebar-right .chapitres li").forEach(x => x.classList.remove("active"));
      document.querySelectorAll(".exo-block").forEach(block => block.classList.remove("active"));

      // activer celui cliqué
      li.classList.add("active");
      const target = li.dataset.exo;
      document.getElementById(target).classList.add("active");
    });
  });
}); // ✅ une seule fermeture
