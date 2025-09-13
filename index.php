<?php get_header(); ?>

    <main class="home-main">
        <div class="container">
            <h1>Hello EFREI 🚀</h1>
            <p>Ceci est notre premier thème WordPress pour l'école EFREI.</p>
            <p>Découvrez nos pages dédiées :</p>

            <div class="home-links">
                <a href="<?php echo esc_url(home_url('/entreprises/')); ?>">
                    Nos Entreprises Partenaires
                </a>
                <a href="<?php echo esc_url(home_url('/ecole/')); ?>">
                    Notre École
                </a>
            </div>

            <!-- Affichage du contenu si c'est une page statique -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="page-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>

<?php get_footer(); ?>