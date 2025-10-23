<?php
/* Template Name: Cours Exo */
get_header();
?>

<main class="cours-layout">

  <!-- Sidebar gauche -->
  <aside class="sidebar-left">
    <ul class="menu-categories panel-dashed">
      <li><a href="<?php echo home_url('/cours-dashboard'); ?>" class="<?php if (is_page_template('cours-dashboard.php')) echo 'active'; ?>">
        <span>📊</span> Dashboard
      </a></li>
      <li><a href="<?php echo home_url('/cours'); ?>" class="<?php if (is_page_template('cours.php')) echo 'active'; ?>">
        <span>📚</span> Cours et Leçon

      </a></li>
      <li class="active">
        <span>📝</span> Exercices et Quiz
      </a></li>
      <li><a href="<?php echo home_url('/cours-cal'); ?>" class="<?php if (is_page_template('calendrier.php')) echo 'active'; ?>">
        <span>📅</span> Calendrier
      </a></li>
      <li><a href="<?php echo home_url('/ressources'); ?>" class="<?php if (is_page_template('cours-ressources.php')) echo 'active'; ?>">
        <span>📖</span> Ressources Supplémentaires
      </a></li>
      <li><a href="<?php echo home_url('/commentaire'); ?>" class="<?php if (is_page_template('cours-commentaires.php')) echo 'active'; ?>">
        <span>💬</span> Commentaires
      </a></li>
    </ul>
  </aside>


  <!-- Zone centrale -->
<section class="cours-main">
  <h1 class="cours-title">Exercices de Programmation en C et PHP</h1>
  
  <div class="global-controls">
    <button id="show-all-solutions-btn">🧠 Afficher toutes les réponses</button>
  </div>

  <!-- Exercice 1 -->
  <div class="exo-block active" id="exo1">
    <h2 class="exo-title">Exercice 1 : Surface et Périmètre</h2>
    <div class="code-tabs">
      <button class="tab active" data-target="code1-c">C</button>
      <button class="tab" data-target="code1-php">PHP</button>
    </div>
    <div id="code1-c" class="code-block active">
      <textarea class="editor">
      Mets ton code en C !
      </textarea>
      <input type="text" class="stdin" placeholder="Entrée ex: 5 3">
      <div class="buttons">
        <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>
      <pre class="output"></pre>

      <div class="solution hidden">
        <h4>✅ Solution proposée :</h4>
        <pre>#include &lt;stdio.h&gt;
      int main() {
        float longueur, largeur, surface, perimetre;
        scanf("%f %f", &longueur, &largeur);
        surface = longueur * largeur;
        perimetre = 2 * (longueur + largeur);
        printf("Surface = %.2f\nPerimetre = %.2f", surface, perimetre);
        return 0;
      }</pre>
      </div>

    </div>
    <div id="code1-php" class="code-block">
      <textarea class="editor">&lt;?php
    Mets ton code en Php !
    ?&gt;</textarea>
      <input type="text" class="stdin" placeholder="Entrée optionnelle">

      <div class="buttons">
        <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>

      <pre class="output"></pre>

      <div class="solution hidden">
        <h4>✅ Solution PHP :</h4>
        <pre>&lt;?php
    $longueur = readline("Donner la longueur : ");
    $largeur = readline("Donner la largeur : ");
    $surface = $longueur * $largeur;
    $perimetre = 2 * ($longueur + $largeur);
    echo "Surface = $surface\n";
    echo "Perimetre = $perimetre\n";
    ?&gt;</pre>
      </div>
    </div>

    <div class="exo-description">
      <h3>Description</h3>
      <p>Lire longueur et largeur d’un rectangle et calculer surface et périmètre.</p>
    </div>
  </div>

  <!-- Exercice 2 -->
  <div class="exo-block" id="exo2">
    <h2 class="exo-title">Exercice 2 : Prix TTC et TVA</h2>
    <div class="code-tabs">
      <button class="tab active" data-target="code2-c">C</button>
      <button class="tab" data-target="code2-php">PHP</button>
    </div>
    <div id="code2-c" class="code-block active">
      <textarea class="editor">
        Mets ton code en C !
      </textarea>
      <input type="text" class="stdin" placeholder="Entrée ex: 100 20">
      <div class="buttons">
        <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>
      <pre class="output"></pre>

      <div class="solution hidden">
        <h4>✅ Solution :</h4>
        <pre>#include &lt;stdio.h&gt;
        int main() {
          float prixU, qte, tva, prixHT, valeurTVA, prixTTC;
          scanf("%f %f %f", &prixU, &qte, &tva);
          prixHT = prixU * qte;
          valeurTVA = prixHT * tva / 100;
          prixTTC = prixHT + valeurTVA;
          printf("Prix TTC = %.2f\n", prixTTC);
          return 0;
        }</pre>
        </div>

    </div>
    <div id="code2-php" class="code-block">
        <textarea class="editor">&lt;?php
      Mets ton code en Php !
      ?&gt;</textarea>

        <input type="text" class="stdin" placeholder="Entrée ex: 100 2 20">

        <div class="buttons">
          <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
          <button class="show-solution-btn">💡 Afficher la solution</button>
        </div>

        <pre class="output"></pre>

        <div class="solution hidden">
          <h4>✅ Solution PHP :</h4>
          <pre>&lt;?php
      $prixU = readline("Donner le prix unitaire : ");
      $qte = readline("Donner la quantite : ");
      $tva = readline("Donner le taux de TVA (%) : ");
      $prixHT = $prixU * $qte;
      $valeurTVA = $prixHT * $tva / 100;
      $prixTTC = $prixHT + $valeurTVA;
      echo "Prix HT = $prixHT\n";
      echo "Valeur TVA = $valeurTVA\n";
      echo "Prix TTC = $prixTTC\n";
      ?&gt;</pre>
        </div>
      </div>

      <div class="exo-description">
        <h3>Description</h3>
        <p>Lire le prix unitaire, la quantité et le taux de TVA d’un produit et calculer son prix TTC.</p>
      </div>

    <div class="exo-description"><h3>Description</h3><p>Lire un prix HT et un taux de TVA et calculer le prix TTC.</p></div>
  </div>

  <!-- Exercice 3 -->
  <div class="exo-block" id="exo3">
    <h2 class="exo-title">Exercice 3 : Équation du 1er degré</h2>
    <div class="code-tabs">
      <button class="tab active" data-target="code3-c">C</button>
      <button class="tab" data-target="code3-php">PHP</button>
    </div>
    <div id="code3-c" class="code-block active">
      <textarea class="editor">
Mets ton code en C !
      </textarea>
      <input type="text" class="stdin" placeholder="Entrée ex: 2 -4">
      <div class="buttons">
        <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>
      <pre class="output"></pre>
      <div class="solution hidden">
        <h4>✅ Solution :</h4>
        <pre>#include &lt;stdio.h&gt;
        int main() {
          float a, b, x;
          scanf("%f %f", &a, &b);
          if (a == 0) {
            if (b == 0) printf("Solution: R\n");
            else printf("Pas de solution.\n");
          } else {
            x = -b / a;
            printf("x = %.2f\n", x);
          }
          return 0;
        }</pre>
        </div>

    </div>
          <div id="code3-php" class="code-block">
        <textarea class="editor">&lt;?php
      Mets ton code en Php !
      ?&gt;</textarea>

        <input type="text" class="stdin" placeholder="Entrée ex: 2 -4">

        <div class="buttons">
          <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
          <button class="show-solution-btn">💡 Afficher la solution</button>
        </div>

        <pre class="output"></pre>

        <div class="solution hidden">
          <h4>✅ Solution PHP :</h4>
          <pre>&lt;?php
      $a = readline("Donner le coefficient a : ");
      $b = readline("Donner le coefficient b : ");
      if ($a == 0) {
        if ($b == 0) {
          echo "L’ensemble des solutions est R\n";
        } else {
          echo "Pas de solution.\n";
        }
      } else {
        $x = -$b / $a;
        echo "La solution est : $x\n";
      }
      ?&gt;</pre>
        </div>
      </div>

      <div class="exo-description">
        <h3>Description</h3>
        <p>Résoudre dans R l’équation du premier degré a×x + b = 0.</p>
      </div>

    </div>
    <div class="exo-description"><h3>Description</h3><p>Résoudre une équation du 1er degré ax+b=0 avec entrée des coefficients.</p></div>
  </div>

  <!-- Exercice 4 -->
  <div class="exo-block" id="exo4">
    <h2 class="exo-title">Exercice 4 : Dates valides</h2>
    <div class="code-tabs">
      <button class="tab active" data-target="code4-c">C</button>
      <button class="tab" data-target="code4-php">PHP</button>
    </div>
    <div id="code4-c" class="code-block active">
      <textarea class="editor">
Mets ton code en C !
      </textarea>
      <input type="text" class="stdin" placeholder="Entrée ex: 28 02 2024">
      <div class="buttons">
        <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>
      <pre class="output"></pre>
      <div class="solution hidden">
        <h4>✅ Solution :</h4>
        <pre>#include &lt;stdio.h&gt;
      #include &lt;time.h&gt;
      int main() {
        int jour, mois, annee;
        scanf("%d %d %d", &jour, &mois, &annee);
        struct tm date = {0};
        date.tm_mday = jour; date.tm_mon = mois-1; date.tm_year = annee-1900;
        if (mktime(&date) == -1) printf("Date invalide\n");
        else printf("Date valide\n");
        return 0;
      }</pre>
      </div>

    </div>
    <div id="code4-php" class="code-block">
      <textarea class="editor">&lt;?php
    Mets ton code en Php !
    ?&gt;</textarea>

      <input type="text" class="stdin" placeholder="Entrée ex: 28 02 2024">

      <div class="buttons">
        <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
        <button class="show-solution-btn">💡 Afficher la solution</button>
      </div>

      <pre class="output"></pre>

      <div class="solution hidden">
        <h4>✅ Solution PHP :</h4>
        <pre>&lt;?php
    $jour = readline("Donner le jour : ");
    $mois = readline("Donner le mois : ");
    $annee = readline("Donner l’annee : ");

    if (!checkdate($mois, $jour, $annee)) {
      echo "Date invalide\n";
    } else {
      echo "Date valide : $jour/$mois/$annee\n";

      $date = new DateTime("$annee-$mois-$jour");
      $hier = clone $date;
      $hier->modify("-1 day");
      $demain = clone $date;
      $demain->modify("+1 day");

      echo "Hier : " . $hier->format("d/m/Y") . "\n";
      echo "Demain : " . $demain->format("d/m/Y") . "\n";
    }
    ?&gt;</pre>
      </div>
    </div>

    <div class="exo-description">
      <h3>Description</h3>
      <p>Lire une date, vérifier sa validité, afficher la date d’hier et celle de demain.</p>
    </div>

    <div class="exo-description"><h3>Description</h3><p>Vérifier si une date est valide (jour, mois, année).</p></div>
  </div>

</section>



  <!-- Sidebar droite -->
<aside class="sidebar-right">
  <h2>Exercices de Programmation</h2>
  <ul class="chapitres panel-dashed">
    <li class="active" data-exo="exo1"><span>Exercice 1 : Surface et Périmètre</span></li>
    <li data-exo="exo2"><span>Exercice 2 : Prix TTC et TVA</span></li>
    <li data-exo="exo3"><span>Exercice 3 : Équation du 1er degré</span></li>
    <li data-exo="exo4"><span>Exercice 4 : Dates valides</span></li>
  </ul>
</aside>



</main>
<script src="<?php echo get_template_directory_uri(); ?>/Assets/js/coursexo.js?ver=<?php echo time(); ?>"></script>
<?php include get_template_directory() . '/commentaires-cours.php'; ?>

<?php get_footer(); ?>
