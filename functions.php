<?php
// Démarrer la session si elle n'est pas déjà active
if (!session_id()) {
    session_start();
}

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

add_action('wp_enqueue_scripts', function() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Style principal
    $style_path = $theme_dir . '/style.css';
    wp_enqueue_style('efrei-style', $theme_uri . '/style.css', [], file_exists($style_path) ? filemtime($style_path) : null);

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap', [], null);

    // Pages spécifiques
    if (is_page_template('ecole.php')) {
        wp_enqueue_style('ecole-style', $theme_uri . '/style_ecole.css', ['efrei-style'], filemtime($theme_dir.'/style_ecole.css'));
    }
    if (is_page_template('Présentation.php')) {
        wp_enqueue_style('presentation-style', $theme_uri . '/style_presentation.css', ['efrei-style'], filemtime($theme_dir.'/style_presentation.css'));
    }
    if (is_page_template('entreprises.php')) {
        wp_enqueue_style('entreprises-style', $theme_uri . '/style_entreprises.css', ['efrei-style'], filemtime($theme_dir.'/style_entreprises.css'));
    }
    if (is_page_template('contact.php')) {
        wp_enqueue_style('contact-style', $theme_uri . '/style_contact.css', ['efrei-style'], filemtime($theme_dir.'/style_contact.css'));
    }
    if (is_page_template('index.php')) {
        wp_enqueue_style('accueil-style', $theme_uri . '/style_Acceuil.css', ['efrei-style'], filemtime($theme_dir.'/style_Acceuil.css'));
    }

    // === Cours, Exos, Dashboard, Calendrier, Ressources, Commentaires
    if (
        is_page_template('cours.php') ||
        is_page_template('coursexo.php') ||
        is_page_template('cours-dashboard.php') ||
        is_page_template('calendrier.php') ||
        is_page_template('ressources.php') ||
        is_page_template('commentaires.php')
    ) {
        wp_enqueue_style('elearning-cours', $theme_uri . '/cours.css', ['efrei-style'], filemtime($theme_dir.'/cours.css'));
    }

    if (is_page_template('cours.php')) {
        wp_enqueue_script('elearning-quiz', $theme_uri . '/assets/js/quiz.js', [], filemtime($theme_dir.'/assets/js/quiz.js'), true);
    }
    if (is_page_template('coursexo.php')) {
        wp_enqueue_script('elearning-coursexo', $theme_uri . '/assets/js/coursexo.js', [], filemtime($theme_dir.'/assets/js/coursexo.js'), true);
    }
    if (is_page_template('cours-dashboard.php')) {
        wp_enqueue_script('elearning-coursdash', $theme_uri . '/assets/js/coursdash.js', [], filemtime($theme_dir.'/assets/js/coursdash.js'), true);
    }
    if (is_page_template('calendrier.php')) {
        wp_enqueue_script('elearning-calendrier', $theme_uri . '/assets/js/calendrier.js', [], filemtime($theme_dir.'/assets/js/calendrier.js'), true);
    }
    if (is_page_template('ressources.php')) {
        wp_enqueue_script('elearning-ressources', $theme_uri . '/assets/js/ressources.js', [], filemtime($theme_dir.'/assets/js/ressources.js'), true);
    }

    // JS commun
    $header_js = $theme_dir . '/assets/js/header-ui.js';
    if (file_exists($header_js)) {
        wp_enqueue_script('elearning-header-ui', $theme_uri . '/assets/js/header-ui.js', [], filemtime($header_js), true);
    }
}, 20);

// =======================
// Injection JS inline (popup, darkmode, carousel…)
// =======================
add_action('wp_footer', function() { ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // JS pour popup / login / logout / theme / carousel ici
});
</script>
<?php });


// Gestion de l'authentification via AJAX
add_action('wp_ajax_user_login', 'handle_user_login');
add_action('wp_ajax_nopriv_user_login', 'handle_user_login');

add_action('wp_ajax_user_register', 'handle_user_register');
add_action('wp_ajax_nopriv_user_register', 'handle_user_register');

add_action('wp_ajax_user_logout', 'handle_user_logout');
add_action('wp_ajax_nopriv_user_logout', 'handle_user_logout');

function handle_user_login() {
    if (!wp_verify_nonce($_POST['nonce'], 'user_auth_nonce')) {
        wp_die('Action non autorisée');
    }

    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    $valid_users = [
            'test@test.fr' => ['password' => 'test', 'name' => 'caca'],
            'prout@prout.fr' => ['password' => 'prout', 'name' => 'Neuille'],
            'bipbip@bipbip.fr' => ['password' => 'bipbip', 'name' => 'Bipbip']
    ];

    if (isset($valid_users[$email]) && $valid_users[$email]['password'] === $password) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $valid_users[$email]['name'];

        wp_send_json_success([
                'message' => 'Connexion réussie',
                'name' => $valid_users[$email]['name']
        ]);
    } else {
        wp_send_json_error(['message' => 'Email ou mot de passe incorrect']);
    }
}

function handle_user_register() {
    if (!wp_verify_nonce($_POST['nonce'], 'user_auth_nonce')) {
        wp_die('Action non autorisée');
    }

    $prenom = sanitize_text_field($_POST['prenom']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($prenom) || empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Tous les champs sont requis']);
    }

    if ($password !== $confirm_password) {
        wp_send_json_error(['message' => 'Les mots de passe ne correspondent pas']);
    }

    if (strlen($password) < 6) {
        wp_send_json_error(['message' => 'Le mot de passe doit contenir au moins 6 caractères']);
    }

    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $prenom;

    wp_send_json_success([
            'message' => 'Inscription réussie',
            'name' => $prenom
    ]);
}

function handle_user_logout() {
    session_destroy();
    wp_send_json_success(['message' => 'Déconnexion réussie']);
}

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

// Injection du JS dans le footer
add_action('wp_footer', function() { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Authentification & popup ---
            const popup = document.getElementById('popupConnexion');
            const closeBtn = document.querySelector('.popup-close');
            const formConnexion = document.querySelector('.form-connexion');
            const formInscription = document.querySelector('.form-inscription');
            const switchToInscription = document.querySelector('.switch-to-inscription');
            const connectLink = document.querySelector('.connect-link');

            window.openPopup = function(type) {
                if (!popup) return;
                popup.classList.add('show');
                if(type === 'inscription') {
                    formConnexion.style.display = 'none';
                    formInscription.style.display = 'flex';
                } else {
                    formConnexion.style.display = 'flex';
                    formInscription.style.display = 'none';
                }
            }

            window.closePopup = function() {
                if (!popup) return;
                popup.classList.remove('show');
                resetForms();
            }

            function resetForms() {
                if (formConnexion) formConnexion.querySelectorAll('input').forEach(input => input.value = '');
                if (formInscription) formInscription.querySelectorAll('input').forEach(input => input.value = '');
            }

            if (closeBtn) closeBtn.addEventListener('click', closePopup);
            if (popup) popup.addEventListener('click', e => { if(e.target === popup) closePopup(); });
            if (switchToInscription) switchToInscription.addEventListener('click', () => {
                resetForms();
                formConnexion.style.display='none';
                formInscription.style.display='flex';
            });
            if (connectLink) connectLink.addEventListener('click', () => {
                resetForms();
                formInscription.style.display='none';
                formConnexion.style.display='flex';
            });

            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData();
                    formData.append('action', 'user_login');
                    formData.append('nonce', '<?php echo wp_create_nonce("user_auth_nonce"); ?>');
                    formData.append('email', this.email.value);
                    formData.append('password', this.password.value);

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: formData })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                alert('Connexion réussie ! Rechargement...');
                                location.reload();
                            } else {
                                alert(data.data.message || 'Erreur de connexion');
                            }
                        });
                });
            }

            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData();
                    formData.append('action', 'user_register');
                    formData.append('nonce', '<?php echo wp_create_nonce("user_auth_nonce"); ?>');
                    formData.append('prenom', this.prenom.value);
                    formData.append('email', this.email.value);
                    formData.append('password', this.password.value);
                    formData.append('confirm_password', this.confirm_password.value);

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: formData })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                alert('Inscription réussie ! Rechargement...');
                                location.reload();
                            } else {
                                alert(data.data.message || 'Erreur d\'inscription');
                            }
                        });
                });
            }

            window.logout = function() {
                if (confirm('Voulez-vous vraiment vous déconnecter ?')) {
                    const formData = new FormData();
                    formData.append('action', 'user_logout');
                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: formData })
                        .then(r => r.json())
                        .then(data => {
                            if (data.success) {
                                alert('Déconnexion réussie');
                                location.reload();
                            }
                        });
                }
            }

            // --- Carousel ---
            const slidesContainer = document.getElementById('slides-container');
            const slides = document.getElementById('slides');
            if(slidesContainer && slides) {
                const slideWidth = slides.querySelector('.slide').offsetWidth + 24;
                slides.innerHTML += slides.innerHTML;
                let position = 0;

                window.nextSlide = function() {
                    position += slideWidth;
                    slidesContainer.scrollTo({ left: position, behavior: 'smooth' });
                    if(position >= slides.scrollWidth/2) {
                        setTimeout(() => { position=0; slidesContainer.scrollLeft=0; }, 300);
                    }
                }
                window.prevSlide = function() {
                    position -= slideWidth;
                    if(position < 0) { position=slides.scrollWidth/2 - slideWidth; slidesContainer.scrollLeft=position; }
                    slidesContainer.scrollTo({ left: position, behavior: 'smooth' });
                }
            }

            // --- Logos & Thème ---
            const toggleColorBtn = document.getElementById('toggleColor');
            const body = document.body;
            const header = document.getElementById('siteHeader');
            const logoImg = document.querySelector('.site-logo img');
            const logoPopup = document.querySelector('.logo-popup');
            const logoContact = document.querySelector('.contact-logo');

            function changeLogoColor(isDark) {
                if (logoImg) {
                    logoImg.src = logoImg.src.replace(
                        isDark ? 'logoViolet.png' : 'logoVert.png',
                        isDark ? 'logoVert.png' : 'logoViolet.png'
                    );
                }
                if (logoPopup) {
                    logoPopup.src = logoPopup.src.replace(
                        isDark ? 'logoViolet.png' : 'logoVert.png',
                        isDark ? 'logoVert.png' : 'logoViolet.png'
                    );
                }
                if (logoContact) {
                    logoContact.src = logoContact.src.replace(
                        isDark ? 'logoViolet.png' : 'logoVert.png',
                        isDark ? 'logoVert.png' : 'logoViolet.png'
                    );
                }
            }

            function updateHeaderBackground(isDark) {
                if (!header) return;
                header.style.background = isDark
                    ? 'url(<?php echo get_template_directory_uri(); ?>/Assets/backgroundNight.png) no-repeat center bottom'
                    : 'url(<?php echo get_template_directory_uri(); ?>/Assets/background.png) no-repeat center bottom';
                header.style.backgroundSize = 'cover';
            }

            const currentTheme = localStorage.getItem('theme') || 'light';
            if (currentTheme === 'dark') {
                body.setAttribute('data-theme', 'dark');
                changeLogoColor(true);
                updateHeaderBackground(true);
                if (toggleColorBtn) {
                    toggleColorBtn.src = toggleColorBtn.src.replace('moon.png', 'sun.png');
                    toggleColorBtn.alt = 'Passer au mode jour';
                }
            } else {
                changeLogoColor(false);
                updateHeaderBackground(false);
            }

            if (toggleColorBtn) {
                toggleColorBtn.addEventListener('click', function() {
                    const isDark = body.getAttribute('data-theme') === 'dark';
                    if (isDark) {
                        body.removeAttribute('data-theme');
                        localStorage.setItem('theme', 'light');
                        changeLogoColor(false);
                        updateHeaderBackground(false);
                        this.src = this.src.replace('sun.png', 'moon.png');
                        this.alt = 'Passer au mode nuit';
                    } else {
                        body.setAttribute('data-theme', 'dark');
                        localStorage.setItem('theme', 'dark');
                        changeLogoColor(true);
                        updateHeaderBackground(true);
                        this.src = this.src.replace('moon.png', 'sun.png');
                        this.alt = 'Passer au mode jour';
                    }
                });
            }
        });
    </script>
<?php }); ?>