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

// Chargement des styles et scripts
add_action('wp_enqueue_scripts', function() {
    // Style principal
    $style_path = get_template_directory() . '/style.css';
    wp_enqueue_style(
        'efrei-style',
        get_template_directory_uri() . '/style.css',
        [],
        file_exists($style_path) ? filemtime($style_path) : null
    );

    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Style spécifique pour la page École
    if (is_page_template('ecole.php')) {
        $ecole_path = get_template_directory() . '/style_ecole.css';
        wp_enqueue_style(
            'ecole-style',
            get_template_directory_uri() . '/style_ecole.css',
            ['efrei-style'],
            file_exists($ecole_path) ? filemtime($ecole_path) : null
        );
    }

    // Style spécifique pour la page Entreprises
    if (is_page_template('entreprises.php')) {
        $entreprises_path = get_template_directory() . '/style_entreprises.css';
        wp_enqueue_style(
            'entreprises-style',
            get_template_directory_uri() . '/style_entreprises.css',
            ['efrei-style'],
            file_exists($entreprises_path) ? filemtime($entreprises_path) : null
        );
    }

    // Style spécifique pour la page Cours
    if (is_page_template('cours.php')) {
        $cours_path = get_template_directory() . '/cours.css';
        wp_enqueue_style(
            'cours-style',
            get_template_directory_uri() . '/cours.css',
            ['efrei-style'],
            file_exists($cours_path) ? filemtime($cours_path) : null
        );
    }
});

// Gestion de l'authentification via AJAX
add_action('wp_ajax_user_login', 'handle_user_login');
add_action('wp_ajax_nopriv_user_login', 'handle_user_login');

add_action('wp_ajax_user_register', 'handle_user_register');
add_action('wp_ajax_nopriv_user_register', 'handle_user_register');

add_action('wp_ajax_user_logout', 'handle_user_logout');
add_action('wp_ajax_nopriv_user_logout', 'handle_user_logout');

function handle_user_login() {
    // Vérifier le nonce pour la sécurité
    if (!wp_verify_nonce($_POST['nonce'], 'user_auth_nonce')) {
        wp_die('Action non autorisée');
    }

    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    // Validation simple (en production, utiliser une vraie base de données)
    $valid_users = [
        'test@test.fr' => ['password' => 'test', 'name' => 'caca'],
        'prout@prout.fr' => ['password' => 'prout', 'name' => 'Neuille'],
        'bipbip@bipbip.fr' => ['password' => 'bipbip', 'name' => 'Bipbip']
    ];

    if (isset($valid_users[$email]) && $valid_users[$email]['password'] === $password) {
        // Connexion réussie
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
    // Vérifier le nonce pour la sécurité
    if (!wp_verify_nonce($_POST['nonce'], 'user_auth_nonce')) {
        wp_die('Action non autorisée');
    }

    $prenom = sanitize_text_field($_POST['prenom']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($prenom) || empty($email) || empty($password)) {
        wp_send_json_error(['message' => 'Tous les champs sont requis']);
    }

    if ($password !== $confirm_password) {
        wp_send_json_error(['message' => 'Les mots de passe ne correspondent pas']);
    }

    if (strlen($password) < 6) {
        wp_send_json_error(['message' => 'Le mot de passe doit contenir au moins 6 caractères']);
    }

    // Simulation de l'enregistrement (en production, sauvegarder en BDD)
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $prenom;

    wp_send_json_success([
        'message' => 'Inscription réussie',
        'name' => $prenom
    ]);
}

function handle_user_logout() {
    // Détruire la session
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

// Injection du JS pour l'authentification et popup dans le footer
add_action('wp_footer', function() { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Variables globales
            const popup = document.getElementById('popupConnexion');
            const closeBtn = document.querySelector('.popup-close');
            const formConnexion = document.querySelector('.form-connexion');
            const formInscription = document.querySelector('.form-inscription');
            const switchToInscription = document.querySelector('.switch-to-inscription');
            const connectLink = document.querySelector('.connect-link');

            // Fonctions popup
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
                if (formConnexion) {
                    formConnexion.querySelectorAll('input').forEach(input => input.value = '');
                }
                if (formInscription) {
                    formInscription.querySelectorAll('input').forEach(input => input.value = '');
                }
            }

            // Event listeners pour popup
            if (closeBtn) closeBtn.addEventListener('click', closePopup);
            if (popup) popup.addEventListener('click', e => { if(e.target === popup) closePopup(); });
            if (switchToInscription) {
                switchToInscription.addEventListener('click', () => {
                    resetForms();
                    formConnexion.style.display='none';
                    formInscription.style.display='flex';
                });
            }
            if (connectLink) {
                connectLink.addEventListener('click', () => {
                    resetForms();
                    formInscription.style.display='none';
                    formConnexion.style.display='flex';
                });
            }

            // Gestion des formulaires d'authentification
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

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Connexion réussie ! Rechargement de la page...');
                                location.reload();
                            } else {
                                alert(data.data.message || 'Erreur de connexion');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            alert('Erreur de connexion');
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

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Inscription réussie ! Rechargement de la page...');
                                location.reload();
                            } else {
                                alert(data.data.message || 'Erreur d\'inscription');
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                            alert('Erreur d\'inscription');
                        });
                });
            }

            // Fonction de déconnexion
            window.logout = function() {
                if (confirm('Voulez-vous vraiment vous déconnecter ?')) {
                    const formData = new FormData();
                    formData.append('action', 'user_logout');

                    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Déconnexion réussie');
                                location.reload();
                            }
                        })
                        .catch(error => {
                            console.error('Erreur:', error);
                        });
                }
            }

            // ---------------- Carousel & Popup Slides (code existant) ----------------
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

                // Popup pour chaque slide avec data-popup
                slides.querySelectorAll('.slide-wrapper .slide').forEach(slide => {
                    slide.addEventListener('click', () => {
                        const popupSrc = slide.dataset.popup;
                        if(!popupSrc) return;

                        let popupDiv = document.getElementById('slidePopup');
                        if(!popupDiv) {
                            popupDiv = document.createElement('div');
                            popupDiv.id = 'slidePopup';
                            popupDiv.style.position='fixed';
                            popupDiv.style.top='0';
                            popupDiv.style.left='0';
                            popupDiv.style.width='100%';
                            popupDiv.style.height='100%';
                            popupDiv.style.background='rgba(0,0,0,0.9)';
                            popupDiv.style.display='flex';
                            popupDiv.style.justifyContent='center';
                            popupDiv.style.alignItems='center';
                            popupDiv.style.zIndex='9999';
                            popupDiv.innerHTML = '<img style="max-width:90%; max-height:90%;" src="" /><span id="closeSlidePopup" style="position:absolute; top:20px; right:30px; font-size:2em; color:white; cursor:pointer;">&times;</span>';
                            document.body.appendChild(popupDiv);

                            document.getElementById('closeSlidePopup').addEventListener('click', () => {
                                popupDiv.style.display='none';
                            });
                            popupDiv.addEventListener('click', e => { if(e.target===popupDiv) popupDiv.style.display='none'; });
                        }

                        popupDiv.querySelector('img').src = popupSrc;
                        popupDiv.style.display='flex';
                    });
                });
            }
        });
    </script>
<?php }); ?>