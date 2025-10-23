<?php
// Récupération du slug de la page courante (ex: cours, cours-exo, etc.)
global $post;
$page_slug = $post ? $post->post_name : 'general';

// Nom du fichier de stockage par page
$log_file = WP_CONTENT_DIR . '/uploads/commentaires_' . $page_slug . '.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    if (
        isset($_POST['comment_form_nonce']) &&
        wp_verify_nonce($_POST['comment_form_nonce'], 'comment_form_action')
    ) {
        $author = sanitize_text_field($_POST['author']);
        $email = sanitize_email($_POST['email']);
        $comment_content = sanitize_textarea_field($_POST['comment']);

        if (!empty($author) && !empty($email) && !empty($comment_content) && is_email($email)) {
            $date = date('Y-m-d H:i:s');
            $content = "\n\n========== NOUVEAU COMMENTAIRE ==========\n";
            $content .= "Page: $page_slug\n";
            $content .= "Date: $date\nAuteur: $author\nEmail: $email\nCommentaire:\n$comment_content\n";
            $content .= "=========================================\n";

            if (file_put_contents($log_file, $content, FILE_APPEND)) {
                $success_message = '✅ Votre commentaire a été enregistré avec succès !';
            } else {
                $error_message = '❌ Erreur lors de l\'enregistrement.';
            }
        } else {
            $error_message = '⚠️ Veuillez remplir tous les champs correctement.';
        }
    } else {
        $error_message = 'Erreur de sécurité. Veuillez réessayer.';
    }
}

// Lecture des commentaires récents
$recent_comments = [];

if (file_exists($log_file)) {
    $content = file_get_contents($log_file);
    $blocks = explode('========== NOUVEAU COMMENTAIRE ==========', $content);

    foreach (array_slice($blocks, 1) as $block) {
        preg_match('/Date: (.+)/', $block, $date);
        preg_match('/Auteur: (.+)/', $block, $author);
        preg_match('/Commentaire:\n(.+)/s', $block, $comment);

        if (!empty($date) && !empty($author) && !empty($comment)) {
            $recent_comments[] = [
                'date' => trim($date[1]),
                'author' => trim($author[1]),
                'comment' => trim(str_replace('=========================================', '', $comment[1]))
            ];
        }
    }

    $recent_comments = array_reverse($recent_comments);
    $recent_comments = array_slice($recent_comments, 0, 5);
}
?>

<div class="comments-container">
    <h2>💬 Laissez un commentaire</h2>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success"><?php echo esc_html($success_message); ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="alert alert-error"><?php echo esc_html($error_message); ?></div>
    <?php endif; ?>

    <form method="POST" class="comment-form">
        <?php wp_nonce_field('comment_form_action', 'comment_form_nonce'); ?>
        <input type="text" name="author" placeholder="Votre nom *" required>
        <input type="email" name="email" placeholder="Votre email *" required>
        <textarea name="comment" rows="4" placeholder="Votre commentaire *" required></textarea>
        <button type="submit" name="submit_comment">Envoyer</button>
    </form>

    <hr>

    <h3>🕐 Derniers commentaires</h3>
    <?php if (!empty($recent_comments)): ?>
        <ul class="comment-list">
            <?php foreach ($recent_comments as $comment): ?>
                <li>
                    <strong><?php echo esc_html($comment['author']); ?></strong>
                    <span class="date"><?php echo esc_html(date('d/m/Y H:i', strtotime($comment['date']))); ?></span>
                    <p><?php echo esc_html(wp_trim_words($comment['comment'], 20, '...')); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun commentaire pour l’instant.</p>
    <?php endif; ?>
</div>

<style>
.comment-form input, .comment-form textarea {
  width: 100%; padding: 10px; margin-bottom: 10px;
  border: 1px solid #ccc; border-radius: 6px;
}
.comment-form button {
  background: #75aa3c; color: #fff;
  padding: 10px 20px; border: none;
  border-radius: 6px; cursor: pointer; font-weight: 600;
}
.comment-form button:hover { background: #5b8c2f; }
.alert-success { background:#d4edda; color:#155724; padding:10px; border-radius:6px; margin-bottom:10px; }
.alert-error { background:#f8d7da; color:#721c24; padding:10px; border-radius:6px; margin-bottom:10px; }
.comment-list { list-style:none; padding-left:0; }
.comment-list li { margin-bottom:10px; border-bottom:1px dashed #ccc; padding-bottom:5px; }
.comment-list .date { display:block; font-size:12px; color:#666; }
</style>
