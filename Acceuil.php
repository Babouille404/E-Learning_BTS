<?php
/* Template Name: École */
get_header();
?>
 <main class="accueil-page">
        <!-- Section Hero -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Acceuil/illustration.png" alt="Illustration apprentissage" class="hero-illustration">
                    </div>
                   
<div class="hero-right">
    <h1>Apprenez à <span style="color:#63B649;">votre rythme</span> sans pression</h1>
    <h2>
        Des cours flexibles, disponibles partout et à tout moment, adaptés à votre emploi du temps <span style="color:#63B649;"></span>
        
    </h2>
</div>

            </div>
        </section>

      
        <section class="features-section">
            <div class="container">
                <div class="features-wrapper">
                   
                    <div class="feature-bubble feature-left">
                        <div class="feature-icon-circle">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Acceuil/expert.png" alt="Instructeur expert" class="feature-icon">
                        </div>
                        <div class="feature-content">
                            <h3>Instructeurs experts</h3>
                            <p>Formez-vous avec des professionnels reconnus</p>
                        </div>
                    </div>

                 
                    <div class="feature-bubble feature-center">
                        <div class="feature-icon-circle">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Acceuil/flexible.png" alt="Apprentissage flexible" class="feature-icon">
                        </div>
                        <div class="feature-content">
                            <h3>Apprentissage flexible</h3>
                            <p>Apprenez quand et où vous voulez</p>
                        </div>
                    </div>

                    
                    <div class="feature-bubble feature-right">
                        <div class="feature-icon-circle">
                            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Acceuil/community.png" alt="Communauté en ligne" class="feature-icon">
                        </div>
                        <div class="feature-content">
                            <h3>Communauté en ligne</h3>
                            <p>Échangez et progressez ensemble</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
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