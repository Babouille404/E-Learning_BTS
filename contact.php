<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);
    

    if (!empty($email) && !empty($message) && is_email($email)) {
        
     
        $log_file = get_template_directory() . '/messages_contact.txt';
        $date = date('Y-m-d H:i:s');
        $content = "\n\n========== NOUVEAU MESSAGE ==========\n";
        $content .= "Date: $date\n";
        $content .= "Email: $email\n";
        $content .= "Message:\n$message\n";
        $content .= "=====================================\n";
        
        if (file_put_contents($log_file, $content, FILE_APPEND)) {
            $success_message = 'Votre message a été envoyé Youpii <3';
        } else {
            $error_message = 'Erreur lors de l\'enregistrement du message.';
        }
    } else {
        $error_message = 'Veuillez remplir tous les champs correctement.';
    }
}

get_header();
?>

<main>
    <main>
        <div class="contact-container">
            <img src="<?php echo get_template_directory_uri(); ?>/Assets/logoViolet.png" alt="Logo" class="contact-logo">
            <div class="contact-content">
                <div class="contact-left">
                    <h2>Nous contacter:</h2>
                    <p>
                        Vous avez une question sur nos cours, un problème technique ou une suggestion? N'hésitez pas à nous écrire, notre équipe vous répondra rapidement
                    </p>
                    
                    <?php if (isset($success_message)): ?>
                        <div class="alert alert-success" style="padding: 15px; background: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 4px;">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-error" style="padding: 15px; background: #f8d7da; color: #721c24; margin-bottom: 20px; border-radius: 4px;">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form class="contact-form" method="POST">
                        <label for="email">Adresse e-mail:</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                        
                        <label for="message">Votre message:</label>
                        <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>
                        
                        <button type="submit" name="contact_submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div class="contact-right">
                    <h2>Nous trouver:</h2>
                    <p>30-32 Av. de la République, 94800 Villejuif</p>
                    <div class="contact-map">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.095!2d2.363764!3d48.788710!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6720c1f4c4c4f%3A0x123456789abcdef!2s30-32%20Avenue%20de%20la%20R%C3%A9publique%2C%2094800%20Villejuif%2C%20France!5e0!3m2!1sfr!2sfr!4v1700000000000"
                            width="100%" 
                            height="400" 
                            style="border:0; border-radius: 8px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
</main>

<?php get_footer(); ?>