<?php
/* Template Name: Cours Dashboard */
get_header();
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/cours.css?ver=<?php echo time(); ?>">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/Assets/js/coursdash.js?ver=<?php echo time(); ?>" defer></script>
<main class="cours-layout">

  <!-- Sidebar gauche -->
  <aside class="sidebar-left">
    <ul class="menu-categories panel-dashed">
      <li class="active">
        <span>📊</span> Dashboard
      </a></li>
      <li><a href="<?php echo home_url('/cours'); ?>" class="<?php if (is_page_template('cours.php')) echo 'active'; ?>">
        <span>📚</span> Cours et Leçon

      </a></li>
      <li><a href="<?php echo home_url('/cours-exo'); ?>" class="<?php if (is_page_template('cours-exo.php')) echo 'active'; ?>">
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
    <h1>Dashboard</h1>

    <!-- Section Programmation -->
    <div class="dashboard-section">
      <h2>Programmation</h2>
      <div class="progress-bar thin"><div class="progress" style="width:15%"></div></div>

      <div class="cards">
        <div class="card active">
          <div class="card-index">1</div>
          <div class="card-title">Variables</div>
        </div>
        <div class="card">
          <div class="card-index">2</div>
          <div class="card-title">Conditions</div>
        </div>
        <div class="card">
          <div class="card-index">3</div>
          <div class="card-title">Boucles</div>
        </div>
        <div class="card">
          <div class="card-index">4</div>
          <div class="card-title">Fonctions</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sidebar droite -->
  <aside class="sidebar-right">
    <h2 class="accordion open">Programmation</h2>
    <ul class="chapitres panel-dashed">
      <li class="active"><span>Chapitre 1 : Variables</span><span class="badge">0/5</span></li>
      <li><span>Chapitre 2 : Conditions</span><span class="badge">0/5</span></li>
      <li><span>Chapitre 3 : Boucles</span><span class="badge">0/5</span></li>
      <li><span>Chapitre 4 : Fonctions</span><span class="badge">0/5</span></li>
    </ul>
  </aside>

</main>

<?php get_footer(); ?>
