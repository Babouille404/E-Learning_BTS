<?php
/* Template Name: École */
get_header();
?>

    <main class="ecole-page">
        <!-- Section Hero -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <img src="<?php echo get_asset_url('ecole/efrei logo.png'); ?>" alt="EFREI" class="hero-logo">
                    <h1 class="hero-title">Vous êtes le <span class="highlight">développeur de demain</span></h1>
                    <p class="hero-subtitle">Rejoindre l'EFREI, c'est faire le choix d'une formation d'excellence dans le numérique</p>
                    <a href="#content" class="btn btn-primary btn-discover">
                        En savoir plus
                        <svg class="arrow-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M7 13l3 3 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section Pourquoi EFREI -->
        <section id="content" class="why-efrei-section">
            <div class="container">
                <h2 class="section-title">Pourquoi s'inscrire à l'<span class="highlight">EFREI</span> ?</h2>

                <div class="features-grid">
                    <div class="feature-item">
                        <img src="<?php echo get_asset_url('ecole/Image 1.png'); ?>" alt="Diplômés" class="feature-icon">
                        <h3>25 000+</h3>
                        <p>Diplômés en activité</p>
                    </div>

                    <div class="feature-item">
                        <img src="<?php echo get_asset_url('ecole/Image 2.png'); ?>" alt="Accréditations" class="feature-icon">
                        <h3>Accréditations</h3>
                        <p>Accréditations et partenariats de qualité</p>
                    </div>

                    <div class="feature-item">
                        <img src="<?php echo get_asset_url('ecole/Image 3.png'); ?>" alt="Projets" class="feature-icon">
                        <h3>Projets concrets</h3>
                        <p>Projets concrets, stages en entreprise</p>
                    </div>

                    <div class="feature-item">
                        <img src="<?php echo get_asset_url('ecole/Image 4.png'); ?>" alt="Associations" class="feature-icon">
                        <h3>30+</h3>
                        <p>Associations, vie de campus dynamique</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Couverture internationale -->
        <section class="international-section">
            <div class="container">
                <h2 class="section-title">Couverture <span class="highlight">internationale</span></h2>
                <div class="international-content">
                    <h3>140+ Universités partenaires dans le monde</h3>
                    <ul class="international-list">
                        <li>Semestres à l'étranger</li>
                        <li>Double-diplômes internationaux</li>
                        <li>Programmes d'échange</li>
                        <li>Stages internationaux</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Section Lien avec les entreprises -->
        <section class="entreprises-section">
            <div class="container">
                <h2 class="section-title">Lien avec les <span class="highlight-green">entreprises</span></h2>

                <div class="entreprises-cards">
                    <div class="entreprise-card card-green">
                        <h3>1000+</h3>
                        <p>Partenariats avec plus de 1000 entreprises pour des stages et emplois</p>
                    </div>

                    <div class="entreprise-card card-blue">
                        <h3>Forums de recrutement</h3>
                        <p>Rencontres directes avec les recruteurs lors d'événements dédiés</p>
                    </div>

                    <div class="entreprise-card card-green">
                        <h3>Accompagnement carrière</h3>
                        <p>Accompagnement carrière et suivi personnalisé des étudiants</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenu de la page -->
        <section class="page-content">
            <div class="container">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>