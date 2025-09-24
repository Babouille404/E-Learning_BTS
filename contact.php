<?php
/* Template Name: Contact */
get_header();
?>

<main>
    <main>
        <div class="contact-container">
            <img src="<?php echo get_asset_url('logoViolet.png'); ?>" alt="Logo" class="contact-logo">
            <div class="contact-content">
                <div class="contact-left">
                    <h2>Nous contacter:</h2>
                    <p>
                        Vous avez une question sur nos cours, un problème technique ou une suggestion? N'hésitez pas à nous écrire, notre équipe vous répondra rapidement
                    </p>
                    <form class="contact-form">
                        <label for="email">Adresse e-mail:</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                        <label for="message">Votre message:</label>
                        <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div class="contact-right">
                    <h2>Nous trouver:</h2>
                    <p>30-32 Av. de la République, 94800 Villejuif</p>
                    <div class="contact-map">
                        <?php echo do_shortcode('[vsgmap address="30-32 Av. de la République, 94800 Villejuif"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

</main>

<?php get_footer(); ?>


