<?php
/* Template Name: Entreprises */
get_header();
?>

    <main class="entreprises-page">
        <!-- Section Hero -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Nos entreprises <span class="highlight">partenaires</span></h1>
                        <h2>Les entreprises au sein desquelles nos formateurs ont pu travailler avant de nous rejoindre</h2>
                        <a href="#entreprises-list" class="btn btn-primary">Les découvrir</a>
                    </div>
                    <div class="hero-image">
                        <img src="<?php echo get_asset_url('images/entrepriseIllu.png'); ?>" alt="Entreprises partenaires" id="entrepriseIllu">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Liste des entreprises -->
        <section id="entreprises-list" class="entreprises-list-section">
            <div class="container">
                <h2 class="section-title">Nos <span class="highlight">partenaires</span></h2>

                <!-- Grille des logos d'entreprises -->
                <div class="partners-grid">
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/google.png'); ?>" alt="Google">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/microsoft.png'); ?>" alt="Microsoft">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/apple.png'); ?>" alt="Apple">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/amazon.png'); ?>" alt="Amazon">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/meta.png'); ?>" alt="Meta">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/ibm.png'); ?>" alt="IBM">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/salesforce.png'); ?>" alt="Salesforce">
                    </div>
                    <div class="partner-logo">
                        <img src="<?php echo get_asset_url('images/partners/oracle.png'); ?>" alt="Oracle">
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Opportunités -->
        <section class="opportunities-section">
            <div class="container">
                <h2 class="section-title">Opportunités avec nos <span class="highlight">partenaires</span></h2>

                <div class="opportunities-grid">
                    <div class="opportunity-card">
                        <div class="card-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M20 6L9 17l-5-5" stroke="#75aa3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Stages en entreprise</h3>
                        <p>Des stages de 6 mois minimum dans nos entreprises partenaires pour une expérience professionnelle concrète.</p>
                    </div>

                    <div class="opportunity-card">
                        <div class="card-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="#75aa3c" stroke-width="2"/>
                                <circle cx="9" cy="7" r="4" stroke="#75aa3c" stroke-width="2"/>
                                <path d="m22 21-3-3m0 0L16 15m3 3h-3v-3" stroke="#75aa3c" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Recrutement direct</h3>
                        <p>Plus de 85% de nos diplômés trouvent un emploi avant la fin de leurs études grâce à notre réseau.</p>
                    </div>

                    <div class="opportunity-card">
                        <div class="card-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M12 2L2 7l10 5 10-5-10-5z" stroke="#75aa3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="m2 17 10 5 10-5" stroke="#75aa3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="m2 12 10 5 10-5" stroke="#75aa3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Projets collaboratifs</h3>
                        <p>Travaillez sur des projets réels avec nos partenaires dès la première année d'études.</p>
                    </div>

                    <div class="opportunity-card">
                        <div class="card-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="3" stroke="#75aa3c" stroke-width="2"/>
                                <path d="m12 1 3 6 6 3-6 3-3 6-3-6-6-3 6-3 3-6z" stroke="#75aa3c" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3>Mentorat professionnel</h3>
                        <p>Bénéficiez de l'accompagnement de professionnels expérimentés tout au long de votre parcours.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenu personnalisé de la page -->
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