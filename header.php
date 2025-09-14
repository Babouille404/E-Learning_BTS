<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_asset_url('ecole/logo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </div>

            <!-- Navigation principale -->
            <nav class="main-navigation">
                <?php
                // Vérifier si l'utilisateur est connecté (via session)
                $is_logged_in = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

                if ($is_logged_in): ?>
                    <!-- Menu pour utilisateur connecté -->
                    <ul class="nav-menu">
                        <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                        <li><a href="<?php echo home_url('/ecole/'); ?>">École</a></li>
                        <li><a href="<?php echo home_url('/cours/'); ?>" class="cours-link">Cours</a></li>
                        <li><a href="<?php echo home_url('/entreprises/'); ?>">Entreprises</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                    </ul>
                <?php else: ?>
                    <!-- Menu standard -->
                    <?php
                    wp_nav_menu([
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'nav-menu',
                            'fallback_cb' => 'efrei_fallback_menu'
                    ]);
                    ?>
                <?php endif; ?>
            </nav>

            <!-- Boutons d'action -->
            <div class="header-actions">
                <?php if ($is_logged_in): ?>
                    <!-- Utilisateur connecté -->
                    <div class="user-info">
                        <span class="welcome-text">Bienvenue, <?php echo isset($_SESSION['user_name']) ? esc_html($_SESSION['user_name']) : 'Utilisateur'; ?></span>
                        <a href="#" class="btn btn-outline" onclick="logout(); return false;">Déconnexion</a>
                    </div>
                <?php else: ?>
                    <!-- Utilisateur non connecté -->
                    <a href="#" class="btn btn-outline" onclick="openPopup('connexion'); return false;">Se connecter</a>
                    <a href="#" class="btn btn-register" onclick="openPopup('inscription'); return false;">S'inscrire</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<?php if (!$is_logged_in): ?>
    <!-- Popup unique (seulement si non connecté) -->
    <div id="popupConnexion" class="popup-overlay">
        <div class="popup-content">
            <span class="popup-close">&times;</span>

            <!-- Logo -->
            <img src="<?php echo get_asset_url('ecole/logo.png'); ?>" class="logo-popup" alt="<?php bloginfo('name'); ?>">

            <!-- Formulaire Connexion -->
            <div class="form-connexion">
                <form id="loginForm">
                    <div class="input-group">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="Adresse e-mail" required>
                    </div>

                    <div class="input-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                    </div>

                    <div class="forgot-password">Mot de passe oublié ?</div>
                    <div class="switch-form">
                        Pas encore de compte ? <span class="switch-to-inscription">Inscris-toi</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>

            <!-- Formulaire Inscription -->
            <div class="form-inscription" style="display:none;">
                <form id="registerForm">
                    <div class="input-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" placeholder="Votre prénom" required>
                    </div>

                    <div class="input-group">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="Adresse e-mail" required>
                    </div>

                    <div class="input-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                    </div>

                    <div class="input-group">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                    </div>

                    <div class="already-account">
                        Tu as déjà un compte ? <span class="connect-link">Connecte-toi</span>
                    </div>

                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
// Menu de fallback si aucun menu n'est configuré
function efrei_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Accueil</a></li>';
    echo '<li><a href="' . home_url('/ecole/') . '">École</a></li>';
    echo '<li><a href="' . home_url('/entreprises/') . '">Entreprises</a></li>';
    echo '<li><a href="' . home_url('/contact/') . '">Contact</a></li>';
    echo '</ul>';
}
?>