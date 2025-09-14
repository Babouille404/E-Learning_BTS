<?php
// Configuration du thème
add_action('after_setup_theme', function() {
    // Support des images à la une
    add_theme_support('post-thumbnails');

    // Support du titre automatique
    add_theme_support('title-tag');

    // Support HTML5
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

    // Enregistrement des menus
    register_nav_menus([
        'primary' => 'Menu principal',
        'footer' => 'Menu footer'
    ]);
});

// Chargement des styles et scripts
add_action('wp_enqueue_scripts', function() {
    // Style principal
    wp_enqueue_style(
        'efrei-style',
        get_template_directory_uri() . '/style.css',
        [],
        filemtime(get_template_directory() . '/style.css')
    );

    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Style spécifique pour la page École
    if (is_page_template('page-ecole.php')) {
        wp_enqueue_style(
            'ecole-style',
            get_template_directory_uri() . '/style_ecole.css',
            ['efrei-style'],
            filemtime(get_template_directory() . '/style_ecole.css')
        );
    }

    // CSS spécifique pour la page Entreprises
    if (is_page_template('entreprises.php')) {
        wp_enqueue_style(
            'entreprises-style',
            get_template_directory_uri() . '/style_entreprises.css',
            ['theme-style'],
            '1.0'
        );
    }
});

// Nettoyage du head WordPress
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Fonction utilitaire pour obtenir l'URL des assets
function get_asset_url($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

// Fonction pour afficher le menu de navigation
function efrei_nav_menu($location = 'primary', $class = 'nav-menu') {
    wp_nav_menu([
        'theme_location' => $location,
        'container' => 'nav',
        'container_class' => $class,
        'menu_class' => 'menu-list',
        'fallback_cb' => false
    ]);
}


add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    register_nav_menus(['primary' => 'Menu principal']);
});

// Charger les styles avec ordre garanti
add_action('wp_enqueue_scripts', function () {
    // Global
    $global_path = get_stylesheet_directory() . '/style.css';
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_directory_uri() . '/style.css',
        [],
        file_exists($global_path) ? filemtime($global_path) : null
    );
}, 10);

// Spécifique au template École, après le global
add_action('wp_enqueue_scripts', function () {
    if (is_singular() && get_page_template_slug() === 'ecole.php') {
        $ecole_path = get_stylesheet_directory() . '/style_ecole.css';
        wp_enqueue_style(
            'ecole-style',
            get_stylesheet_directory_uri() . '/style_ecole.css',
            ['theme-style'], // dépend de style.css -> sera chargé après
            file_exists($ecole_path) ? filemtime($ecole_path) : null
        );
    }
}, 20);

// Injection du JS pour popup dans le footer
add_action('wp_footer', function() { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('popupConnexion');
            const closeBtn = document.querySelector('.popup-close');
            const formConnexion = document.querySelector('.form-connexion');
            const formInscription = document.querySelector('.form-inscription');
            const switchToInscription = document.querySelector('.switch-to-inscription');
            const connectLink = document.querySelector('.connect-link');

            // Fonction pour ouvrir popup
            window.openPopup = function(type) {
                popup.classList.add('show');
                if(type === 'inscription') {
                    formConnexion.style.display = 'none';
                    formInscription.style.display = 'flex';
                } else {
                    formConnexion.style.display = 'flex';
                    formInscription.style.display = 'none';
                }
            }

            // Fonction pour fermer popup et reset
            window.closePopup = function() {
                popup.classList.remove('show');
                resetForms();
            }

            // Reset des formulaires
            function resetForms() {
                formConnexion.querySelectorAll('input').forEach(input => input.value = '');
                formInscription.querySelectorAll('input').forEach(input => input.value = '');
            }

            // Fermer au clic sur croix
            closeBtn?.addEventListener('click', closePopup);

            // Fermer au clic autour du popup
            popup?.addEventListener('click', function(e) {
                if(e.target === popup) closePopup();
            });

            // Switch vers inscription (reset les inputs avant)
            switchToInscription?.addEventListener('click', function() {
                resetForms();
                formConnexion.style.display = 'none';
                formInscription.style.display = 'flex';
            });

            // Switch vers connexion (reset les inputs avant)
            connectLink?.addEventListener('click', function() {
                resetForms();
                formInscription.style.display = 'none';
                formConnexion.style.display = 'flex';
            });
        });

    </script>
<?php });

