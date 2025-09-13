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
                <a href="#" class="btn btn-outline">Se connecter</a>
                <a href="#" class="btn btn-primary">S'inscrire</a>
            </div>
        </div>
    </div>
</header>

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