
<?php
/* Template Name: Entreprises */
get_header();

// Données des entreprises
$entreprises = [
    ['image' => 'locauxEDF.png', 'nom' => 'EDF', 'personne' => 'Nour Mesbahi', 'description' => 'Société de production et de fourniture d\'électricité'],
    ['image' => 'locauxCorum.png', 'nom' => 'Corum', 'personne' => 'Anissa Dahabi', 'description' => 'Société de gestion d\'épargne et d\'investissement immobilier'],
    ['image' => 'locauxHachette.png', 'nom' => 'Hachette', 'personne' => 'Lina Karouche', 'description' => 'Éditeur et distributeur de jeux de société'],
    ['image' => 'locauxApicil.png', 'nom' => 'Apicil', 'personne' => 'Bao-Long Le', 'description' => 'Leader français de la protection sociale et patrimoniale']
];
?>

<main class="container">
    <div class="header">
        <div class="headerContent">
            <div class="header-left">
                <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/entrepriseIllu.png" alt="Illustration entreprise" />
            </div>
            <div class="header-right">
                <h1>Nos <span style="color:#63B649;">entreprises</span> partenaires</h1>
                <h2>
                    Les entreprises au sein desquelles nos <span style="color:#63B649;">formateurs</span>
                    ont pu travailler avant de nous rejoindre
                </h2>
            </div>
        </div>
        <button>Les découvrir</button>
    </div>

    <div class="alternance">
        <div class="content-left">
            <h3>
                A la recherche d'un <span style="color:#63B649;">stage</span> ou d'une
                <span style="color:#63B649;">alternance</span>?
            </h3>
            <p>
                Adressez-vous au référent de l'entreprise de votre choix pour obtenir un
                <span style="color:#63B649;">premier entretien RH</span>.
            </p>
        </div>
        <div class="content-right">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/alternance.png" alt="Illustration alternance"/>
        </div>
    </div>

    <!-- CARROUSEL SIMPLE -->
    <div class="carousel">
        <h2>Parcourez nos entreprises:</h2>

        <button class="arrow left" onclick="prevSlide()">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/arrowLeft.png" alt="Précédent">
        </button>

        <div class="slides-container" id="slides-container">
            <div class="slides" id="slides">
                <?php foreach($entreprises as $e): ?>
                    <div class="slide-wrapper">
                        <div class="slide-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/logos/<?= $e['nom'] ?>.png" alt="<?= $e['nom'] ?> Logo">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/<?= $e['image'] ?>" alt="<?= $e['nom'] ?>">
                            <div class="slide-content">
                                <p class="slide-person">→ <?= $e['personne'] ?></p>
                                <h3><?= $e['nom'] ?></h3>
                                <p class="slide-description"><?= $e['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <button class="arrow left" onclick="prevSlide()">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/arrowLeft.png" alt="Précédent">
        </button>

        <button class="arrow right" onclick="nextSlide()">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Entreprises/arrowRight.png" alt="Suivant">
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slidesContainer = document.getElementById('slides-container');
            const slides = document.getElementById('slides');
            const slideWidth = slides.querySelector('.slide').offsetWidth + 24; // gap 24px

            // Dupliquer les slides pour l'infini
            slides.innerHTML += slides.innerHTML;

            let position = 0;

            window.nextSlide = function() {
                position += slideWidth;
                slidesContainer.scrollTo({ left: position, behavior: 'smooth' });
                if(position >= slides.scrollWidth / 2) {
                    // Reset pour boucle infinie
                    setTimeout(() => {
                        position = 0;
                        slidesContainer.scrollLeft = position;
                    }, 300); // attendre la fin du scroll
                }
            }

            window.prevSlide = function() {
                position -= slideWidth;
                if(position < 0) {
                    position = slides.scrollWidth / 2 - slideWidth;
                    slidesContainer.scrollLeft = position;
                }
                slidesContainer.scrollTo({ left: position, behavior: 'smooth' });
            }
        });
    </script>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>




<?php get_footer(); ?>