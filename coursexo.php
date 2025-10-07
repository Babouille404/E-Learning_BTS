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
  <h1>Exercices de Programmation</h1>
  <div class="progress-bar thin"><div class="progress" style="width:10%"></div></div>

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
      <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
      <pre class="output"></pre>
    </div>
    <div id="code1-php" class="code-block">
      <textarea class="editor">&lt;?php
Mets ton code en Php !
?&gt;</textarea>
      <input type="text" class="stdin" placeholder="Entrée optionnelle">
      <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
      <pre class="output"></pre>
    </div>
    <div class="exo-description"><h3>Description</h3><p>Lire longueur et largeur d’un rectangle et calculer surface et périmètre.</p></div>
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
      <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
      <pre class="output"></pre>
    </div>
    <div id="code2-php" class="code-block">
      <textarea class="editor">&lt;?php
Mets ton code en Php !
?&gt;</textarea>
      <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
      <pre class="output"></pre>
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
      <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
      <pre class="output"></pre>
    </div>
    <div id="code3-php" class="code-block">
      <textarea class="editor">&lt;?php
Mets ton code en Php !
?&gt;</textarea>
      <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
      <pre class="output"></pre>
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
      <button class="run-btn" data-lang="c">▶️ Exécuter en C</button>
      <pre class="output"></pre>
    </div>
    <div id="code4-php" class="code-block">
      <textarea class="editor">&lt;?php
Mets ton code en Php !
?&gt;</textarea>
      <button class="run-btn" data-lang="php">▶️ Exécuter en PHP</button>
      <pre class="output"></pre>
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
<?php get_footer(); ?>
