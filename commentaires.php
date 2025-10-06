<?php
/* Template Name: Commentaires */
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
      <li><a href="<?php echo home_url('/cours-exo'); ?>" class="<?php if (is_page_template('cours-exo.php')) echo 'active'; ?>">
        <span>📝</span> Exercices et Quiz
      </a></li>
      <li><a href="<?php echo home_url('/cours-cal'); ?>" class="<?php if (is_page_template('calendrier.php')) echo 'active'; ?>">
        <span>📅</span> Calendrier
      </a></li>
      <li><a href="<?php echo home_url('/ressources'); ?>" class="<?php if (is_page_template('cours-ressources.php')) echo 'active'; ?>">
        <span>📖</span> Ressources Supplémentaires
      </a></li>
      <li class="active"><span>💬</span> Commentaires</li>
    </ul>
  </aside>


  <!-- Zone centrale -->
  <section class="cours-main">
    <h1>Commentaires</h1>
    <div class="progress-bar thin"><div class="progress" style="width:100%"></div></div>

    <div class="comments-container">

      <h2>Laissez un commentaire</h2>
      <?php
        // Affiche le formulaire de commentaires WordPress
        if (comments_open() || get_comments_number()) {
          comments_template();
        } else {
          echo "<p>Les commentaires sont fermés pour l’instant.</p>";
        }
      ?>
    </div>
  </section>

  <!-- Sidebar droite -->
  <aside class="sidebar-right">
    <h2>Derniers commentaires</h2>
    <ul class="chapitres panel-dashed">
      <?php
        $recent_comments = get_comments([
          'number' => 5,
          'status' => 'approve'
        ]);
        if ($recent_comments) {
          foreach ($recent_comments as $comment) {
            echo "<li><strong>" . esc_html($comment->comment_author) . ":</strong> ";
            echo wp_trim_words($comment->comment_content, 10, '...') . "</li>";
          }
        } else {
          echo "<li>Aucun commentaire pour l’instant.</li>";
        }
      ?>
    </ul>
  </aside>

</main>

<?php get_footer(); ?>
