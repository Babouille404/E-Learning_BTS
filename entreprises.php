<?php
/* Template Name: Entreprises */
get_header(); ?>
    <main class="container">
        <img src="<?php echo get_template_directory_uri(); ?>./Assets/entrepriseIllu.png" alt="Image" id="entrepriseIllu"/>
        <h1>Nos entreprises partenaires</h1>
        <h2>Les entreprises au sein desquelles nos formateurs ont pu travailler avant de nous rejoindre</h2>
        <button>Les découvrir</button>
        <?php the_content(); ?>
    </main>
<?php get_footer(); ?>