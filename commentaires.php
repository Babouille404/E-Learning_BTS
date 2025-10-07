<?php
/* Template Name: Commentaires */
get_header();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $author = sanitize_text_field($_POST['author']);
    $email = sanitize_email($_POST['email']);
    $comment_content = sanitize_textarea_field($_POST['comment']);

    if (!empty($author) && !empty($email) && !empty($comment_content) && is_email($email)) {
        $log_file = get_template_directory() . '/commentaires_cours.txt';
        $date = date('Y-m-d H:i:s');
        $content = "\n\n========== NOUVEAU COMMENTAIRE ==========\n";
        $content .= "Date: $date\nAuteur: $author\nEmail: $email\nCommentaire:\n$comment_content\n";
        $content .= "=========================================\n";

        if (file_put_contents($log_file, $content, FILE_APPEND)) {
            $success_message = 'Votre commentaire a été enregistré avec succès !';
        } else {
            $error_message = 'Erreur lors de l\'enregistrement.';
        }
    } else {
        $error_message = 'Veuillez remplir tous les champs correctement.';
    }
}
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

            <?php if (isset($success_message)): ?>
                <div class="alert alert-success" style="padding: 15px; background: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 8px;">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-error" style="padding: 15px; background: #f8d7da; color: #721c24; margin-bottom: 20px; border-radius: 8px;">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <h2>Laissez un commentaire</h2>
            <form method="POST" class="comment-form">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nom *</label>
                    <input type="text" name="author" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email *</label>
                    <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Commentaire *</label>
                    <textarea name="comment" rows="5" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; resize: vertical;"></textarea>
                </div>
                <button type="submit" name="submit_comment" style="padding: 12px 24px; background: #75AA3C; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    Publier le commentaire
                </button>
            </form>

            <p style="margin-top: 30px; color: #666; font-style: italic;">Les commentaires sont enregistrés dans le fichier commentaires_cours.txt de votre thème.</p>
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
