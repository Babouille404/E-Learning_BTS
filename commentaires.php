<?php
/* Template Name: Commentaires */
get_header();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $author = sanitize_text_field($_POST['author']);
    $email = sanitize_email($_POST['email']);
    $comment_content = sanitize_textarea_field($_POST['comment']);

    // DEBUG : Afficher les valeurs reçues
    $debug_info = [];
    $debug_info[] = "Auteur: " . (!empty($author) ? 'OK' : 'VIDE');
    $debug_info[] = "Email: " . (!empty($email) ? 'OK' : 'VIDE') . " - Valide: " . (is_email($email) ? 'OUI' : 'NON');
    $debug_info[] = "Commentaire: " . (!empty($comment_content) ? 'OK' : 'VIDE');

    if (!empty($author) && !empty($email) && !empty($comment_content) && is_email($email)) {
        $log_file = get_template_directory() . '/commentaires_cours.txt';

        // DEBUG : Vérifier le chemin du fichier
        $debug_info[] = "Chemin fichier: " . $log_file;
        $debug_info[] = "Fichier existe: " . (file_exists($log_file) ? 'OUI' : 'NON');
        $debug_info[] = "Dossier parent existe: " . (is_dir(dirname($log_file)) ? 'OUI' : 'NON');
        $debug_info[] = "Permissions dossier: " . (is_writable(dirname($log_file)) ? 'ÉCRITURE OK' : 'PAS D\'ÉCRITURE');

        if (file_exists($log_file)) {
            $debug_info[] = "Permissions fichier: " . (is_writable($log_file) ? 'ÉCRITURE OK' : 'PAS D\'ÉCRITURE');
        }

        $date = date('Y-m-d H:i:s');
        $content = "\n\n========== NOUVEAU COMMENTAIRE ==========\n";
        $content .= "Date: $date\nAuteur: $author\nEmail: $email\nCommentaire:\n$comment_content\n";
        $content .= "=========================================\n";

        $result = @file_put_contents($log_file, $content, FILE_APPEND);

        if ($result !== false) {
            $success_message = 'Votre commentaire a été enregistré avec succès !';
            $debug_info[] = "Écriture réussie: " . $result . " octets";
        } else {
            $error_message = 'Erreur lors de l\'enregistrement.';
            $debug_info[] = "Écriture ÉCHOUÉE";
            $debug_info[] = "Erreur PHP: " . (error_get_last()['message'] ?? 'Aucune erreur capturée');
        }
    } else {
        $error_message = 'Veuillez remplir tous les champs correctement.';
    }

    // Stocker les infos de debug
    $debug_message = implode('<br>', $debug_info);
}

// Lecture des commentaires récents
$log_file = get_template_directory() . '/commentaires_cours.txt';
$recent_comments = [];

if (file_exists($log_file)) {
    $content = file_get_contents($log_file);
    $blocks = explode('========== NOUVEAU COMMENTAIRE ==========', $content);

    foreach (array_slice($blocks, 1) as $block) {
        preg_match('/Date: (.+)/', $block, $date);
        preg_match('/Auteur: (.+)/', $block, $author);
        preg_match('/Commentaire:\n(.+)/s', $block, $comment);

        if (!empty($date) && !empty($author) && !empty($comment)) {
            $clean_comment = trim($comment[1]);
            $clean_comment = str_replace('=========================================', '', $clean_comment);

            $recent_comments[] = [
                    'date' => trim($date[1]),
                    'author' => trim($author[1]),
                    'comment' => trim($clean_comment)
            ];
        }
    }

    $recent_comments = array_reverse($recent_comments);
    $recent_comments = array_slice($recent_comments, 0, 5);
}
?>

<main class="cours-layout">
    <!-- Sidebar gauche -->
    <aside class="sidebar-left">
        <ul class="menu-categories panel-dashed">
            <li><a href="<?php echo home_url('/cours-dashboard'); ?>">
                    <span>📊</span> Dashboard
                </a></li>
            <li><a href="<?php echo home_url('/cours'); ?>">
                    <span>📚</span> Cours et Leçon
                </a></li>
            <li><a href="<?php echo home_url('/cours-exo'); ?>">
                    <span>📝</span> Exercices et Quiz
                </a></li>
            <li><a href="<?php echo home_url('/cours-cal'); ?>">
                    <span>📅</span> Calendrier
                </a></li>
            <li><a href="<?php echo home_url('/ressources'); ?>">
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

            <?php if (isset($debug_message)): ?>
                <div class="alert alert-info" style="padding: 15px; background: #d1ecf1; color: #0c5460; margin-bottom: 20px; border-radius: 8px; font-size: 12px; font-family: monospace;">
                    <strong>DEBUG INFO:</strong><br>
                    <?php echo $debug_message; ?>
                </div>
            <?php endif; ?>

            <h2>Laissez un commentaire</h2>
            <form method="POST" class="comment-form">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nom *</label>
                    <input type="text" name="author" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; background-color: var(--color-input); color: var(--color-text);">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email *</label>
                    <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; background-color: var(--color-input); color: var(--color-text);">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Commentaire *</label>
                    <textarea name="comment" rows="5" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; resize: vertical; background-color: var(--color-input); color: var(--color-text);"></textarea>
                </div>
                <button type="submit" name="submit_comment" style="padding: 12px 24px; background: #75AA3C; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">
                    Publier le commentaire
                </button>
            </form>
        </div>
    </section>

    <!-- Sidebar droite -->
    <aside class="sidebar-right">
        <h2>Derniers commentaires</h2>
        <ul class="chapitres panel-dashed">
            <?php if (!empty($recent_comments)): ?>
                <?php foreach ($recent_comments as $comment): ?>
                    <li style="display: flex; flex-direction: column; gap: 5px; padding: 12px; word-wrap: break-word; overflow-wrap: break-word;">
                        <strong style="color: var(--color-green); font-size: 14px; word-break: break-word;">
                            <?php echo esc_html($comment['author']); ?>
                        </strong>
                        <span style="font-size: 12px; color: var(--color-text); line-height: 1.4; word-break: break-word; max-width: 100%;">
                            <?php
                            $text = wp_trim_words($comment['comment'], 15, '...');
                            echo esc_html($text);
                            ?>
                        </span>
                        <span class="badge" style="font-size: 10px; align-self: flex-start;">
                            <?php echo date('d/m H:i', strtotime($comment['date'])); ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Aucun commentaire pour l'instant.</li>
            <?php endif; ?>
        </ul>
    </aside>
</main>



<?php get_footer(); ?>
