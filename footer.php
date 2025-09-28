<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Liens rapides -->
            <div class="footer-section">
                <h3>École</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                    <li><a href="<?php echo home_url('/presentation'); ?>">Présentation</a></li>
                    <li><a href="<?php echo home_url('/ecole'); ?>">L'école</a></li>
<!--                    <li><a href="--><?php //echo home_url('/nos-cours/'); ?><!--">Nos cours</a></li>-->
                    <li><a href="<?php echo home_url('/entreprises'); ?>">Entreprises</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                </ul>
            </div>

            <!-- Contacts -->
            <div class="footer-section">
                <h3>Contacts</h3>
                <div class="contact-info">
                    <p><strong>École EFREI</strong></p>
                    <p>30-32 avenue de la République<br>94800 Villejuif</p>
                    <p><strong>Admissions :</strong><br>
                        Tel: 01 46 77 46 77<br>
                        Email: admissions@efrei.fr</p>
                </div>
            </div>

            <!-- Mentions légales -->
            <div class="footer-section">
                <h3>Mentions légales</h3>
                <ul class="footer-links">
                    <li><a href="#">Index égalité professionnelle</a></li>
                    <li><a href="#">Données personnelles</a></li>
                    <li><a href="#">Conditions de vente</a></li>
                    <li><a href="#">Règlement</a></li>
                    <li><a href="#">Charte informatique</a></li>
                </ul>
            </div>

            <!-- Réseaux sociaux -->
            <div class="footer-section">
                <h3>Suivez-nous</h3>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/images/facebook.svg" alt="Facebook">
                    </a>
                    <a href="#" class="social-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/images/instagram.svg" alt="Instagram">
                    </a>
                    <a href="#" class="social-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/Assets/images/linkedin.svg" alt="LinkedIn">
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> EFREI - École d'ingénieurs. Tous droits réservés.</p>
            <p class="warning-text">Ne vous inscrivez pas si vous n'êtes pas sûr de vouloir apprendre !</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>