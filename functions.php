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
    if (is_page_template('page-ecole.php')) {
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

// Injection du JS pour popup dans le footer
add_action('wp_footer', function() { ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ---------------- Popup Connexion / Inscription ----------------
            const popup = document.getElementById('popupConnexion');
            const closeBtn = document.querySelector('.popup-close');
            const formConnexion = document.querySelector('.form-connexion');
            const formInscription = document.querySelector('.form-inscription');
            const switchToInscription = document.querySelector('.switch-to-inscription');
            const connectLink = document.querySelector('.connect-link');

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

            window.closePopup = function() {
                popup.classList.remove('show');
                resetForms();
            }

            function resetForms() {
                formConnexion?.querySelectorAll('input').forEach(input => input.value = '');
                formInscription?.querySelectorAll('input').forEach(input => input.value = '');
            }

            closeBtn?.addEventListener('click', closePopup);
            popup?.addEventListener('click', e => { if(e.target === popup) closePopup(); });
            switchToInscription?.addEventListener('click', () => { resetForms(); formConnexion.style.display='none'; formInscription.style.display='flex'; });
            connectLink?.addEventListener('click', () => { resetForms(); formInscription.style.display='none'; formConnexion.style.display='flex'; });

            // ---------------- Carousel & Popup Slides ----------------
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
<?php });
?>
