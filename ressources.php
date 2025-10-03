<?php
/* Template Name: Ressources Supplémentaires */
get_header();
?>

<main class="cours-layout">

  <!-- Sidebar gauche -->
  <aside class="sidebar-left">
    <ul class="menu-categories panel-dashed">
      <li><a href="http://localhost/wordpress/cours-dashboard/" class="<?php if (is_page_template('cours-dashboard.php')) echo 'active'; ?>">
        <span>📊</span> Dashboard
      </a></li>
      <li><a href="http://localhost/wordpress/cours/" class="<?php if (is_page_template('cours.php')) echo 'active'; ?>">
        <span>📚</span> Cours et Leçon
      </a></li>
      <li><a href="http://localhost/wordpress/cours-exo/" class="<?php if (is_page_template('cours-exo.php')) echo 'active'; ?>">
        <span>📝</span> Exercices et Quiz
      </a></li>
      <li><a href="http://localhost/wordpress/cours-cal/" class="<?php if (is_page_template('calendrier.php')) echo 'active'; ?>">
        <span>📅</span> Calendrier
      </a></li>
      <li class="active"> <span>📖</span> Ressources Supplémentaires
      </a></li>
      <li><a href="http://localhost/wordpress/commentaire/" class="<?php if (is_page_template('cours-commentaires.php')) echo 'active'; ?>">
        <span>💬</span> Commentaires
      </a></li>
    </ul>
  </aside>

  <!-- Zone centrale -->
  <section class="cours-main">
    <h1>Ressources Supplémentaires</h1>
    <div class="progress-bar thin"><div class="progress" style="width:100%"></div></div>

    <div class="ressource-container">
      <h2>Vidéo d’introduction à la programmation</h2>

      <!-- Exemple avec YouTube -->
      <div class="video-wrapper">
        <iframe width="100%" height="500"
          src="https://www.youtube.com/embed/zOjov-2OZ0E"
          title="Cours de Programmation - Introduction"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>

    
    </div>
  </section>

    <!-- Sidebar droite -->
  <aside class="sidebar-right">
  <h2>Autres ressources</h2>
  <ul class="chapitres panel-dashed">
    <li><a href="https://www.w3schools.com/c/" target="_blank">📘 Documentation C</a></li>
    <li><a href="https://www.php.net/manual/fr/" target="_blank">🐘 Documentation PHP</a></li>
    <li><a href="https://www.youtube.com/watch?v=KJgsSFOSQv0" target="_blank">📺 Vidéo C pour débutants</a></li>
    <li><a href="https://www.youtube.com/watch?v=OK_JCtrrv-c" target="_blank">📺 Vidéo PHP pour débutants</a></li>
  </ul>
</aside>



</main>

<?php get_footer(); ?>
