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
                wp_nav_menu([
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'fallback_cb' => 'efrei_fallback_menu'
                ]);
                ?>
            </nav>

            <!-- Boutons d'action -->
            <div class="header-actions">
                <!-- Ouvre directement le formulaire connexion -->
                <a href="#" class="btn btn-outline" onclick="openPopup('connexion'); return false;">Se connecter</a>

                <!-- Ouvre directement le formulaire inscription -->
                <a href="#" class="btn btn-register" onclick="openPopup('inscription'); return false;">S'inscrire</a>
            </div>
        </div>
    </div>
</header>

<!-- Popup unique -->
<div id="popupConnexion" class="popup-overlay">
    <div class="popup-content">
        <span class="popup-close">&times;</span>

        <!-- Logo -->
        <img src="<?php echo get_asset_url('ecole/logo.png'); ?>" class="logo-popup" alt="<?php bloginfo('name'); ?>">

        <!-- Formulaire Connexion -->
        <div class="form-connexion">
            <div class="input-group">
                <label>E-mail</label>
                <input type="text" placeholder="Adresse e-mail">
            </div>

            <div class="input-group">
                <label>Mot de passe</label>
                <input type="password" placeholder="Mot de passe">
            </div>

            <div class="forgot-password">Mot de passe oublié ?</div>
            <div class="switch-form">
                Pas encore de compte ? <span class="switch-to-inscription">Inscris-toi</span>
            </div>

            <button class="btn btn-primary">Se connecter</button>


        </div>

        <!-- Formulaire Inscription -->
        <div class="form-inscription" style="display:none;">
            <div class="input-group">
                <label>Prénom</label>
                <input type="text" placeholder="Votre prénom">
            </div>

            <div class="input-group">
                <label>E-mail</label>
                <input type="email" placeholder="Adresse e-mail">
            </div>

            <div class="input-group">
                <label>Mot de passe</label>
                <input type="password" placeholder="Mot de passe">
            </div>

            <div class="input-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" placeholder="Confirmer le mot de passe">
            </div>

            <div class="already-account">
                Tu as déjà un compte ? <span class="connect-link">Connecte-toi</span>
            </div>

            <button class="btn btn-primary">S'inscrire</button>
        </div>
    </div>
</div>

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