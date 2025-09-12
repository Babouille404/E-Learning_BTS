<?php
/* Template Name: Ecole */
get_header();

$uri = get_template_directory_uri(); // base URL du thème: .../wp-content/themes/ton-theme
?>
<div class="ecole">
    <div class="footer">
        <img class="background2-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/background2.png' ); ?>">
        <img class="background-icon"  alt="" src="<?php echo esc_url( $uri . '/assets/ecole/Background.png' ); ?>">

        <div class="liens-rapides">
            <a class="accueil"     href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a>
            <a class="a-propos"    href="<?php echo esc_url( home_url('/a-propos/') ); ?>">A propos</a>
            <a class="entreprises" href="<?php echo esc_url( home_url('/entreprises/') ); ?>">Entreprises</a>
            <a class="lecole"      href="<?php echo esc_url( home_url('/ecole/') ); ?>">L’Ecole</a>
            <a class="nos-cours"   href="<?php echo esc_url( home_url('/cours/') ); ?>">Nos cours</a>
            <a class="contact"     href="<?php echo esc_url( home_url('/contact/') ); ?>">Contact</a>
            <b class="ecole-liens-rapides">Liens rapides:</b>
        </div>

        <div class="mentions-lgales">
            <div class="index-galit-professionnelle">Index égalité professionnelle</div>
            <div class="rglement">Règlement</div>
            <div class="donnes-personnelles">Données personnelles</div>
            <div class="conditions-de-vente">Conditions de vente</div>
            <div class="charte-informatique">Charte informatique</div>
            <b class="ecole-mentions-lgales">Mentions légales:</b>
        </div>

        <div class="rseaux-sociaux">
            <b class="logos-insta-fb">[logos insta fb linkedin etc]</b>
            <b class="suivez-nous">SUIVEZ NOUS:</b>
        </div>

        <div class="contacts">
            <div class="accueil-33-container"><span class="ecole-accueil">Accueil</span><span class="span"> : +33 188 289 000</span></div>
            <div class="admissions-33-container"><span class="ecole-accueil">Admissions</span><span class="span"> : +33 188 289 001</span></div>
            <div class="email-admissionsefreifr"><span class="ecole-accueil">Email</span><span class="span"> : admissions@efrei.fr</span></div>
            <b class="ecole-contacts">CONTACTS:</b>
        </div>
    </div>

    <div class="ne-vous-inscrivez">NE VOUS INSCRIVEZ SURTOUT PAS</div>

    <div class="content">
        <div class="entreprise-cards">
            <div class="card-3">
                <div class="card"></div>
                <div class="accompagnement-carrire-et">Accompagnement carrière et insertion professionnelle.</div>
            </div>
            <div class="card-2">
                <div class="ecole-card"></div>
                <div class="forums-de-recrutement">Forums de recrutement et rencontres professionnelles.</div>
            </div>
            <div class="card-1">
                <div class="card"></div>
                <div class="partenariats-avec-plus">Partenariats avec plus de 200 entreprises du secteur numérique.</div>
            </div>
        </div>

        <b class="lien-avec-les-container">
            <span>Lien avec les </span><span class="ecole-entreprises">entreprises</span>
        </b>

        <div class="universits-partenaires-dans-container">
            <ul class="universits-partenaires-dans-l">
                <li class="ecole-universits-partenaires-dans-l"><b>+100 universités partenaires</b><span class="dans-le-monde"> dans le monde</span></li>
                <li class="ecole-universits-partenaires-dans-l"><b class="semestres-ltranger">Semestres à l’étranger</b><span class="dans-le-monde"> possibles</span></li>
                <li><span class="dans-le-monde">Accueil d’</span><b class="semestres-ltranger">étudiants internationaux</b><span class="dans-le-monde"> sur le campus</span></li>
            </ul>
        </div>

        <b class="couverture-internationnale"><span>Couverture </span><span class="ecole-entreprises">internationnale</span></b>

        <div class="pourquoi-efrei">
            <div class="associations-vie-de-container">
                <p class="associations">Associations,</p>
                <p class="associations">vie de campus, événements</p>
            </div>
            <img class="image-4-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/image 4.png' ); ?>">
            <div class="projets-concrets-stage">Projets concrets, stage, alternance</div>
            <img class="image-3-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/image 3.png' ); ?>">
            <div class="accrditations-et-partenariats">Accréditations et partenariats avec de grandes universités</div>
            <img class="image-2-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/image 2.png' ); ?>">
            <div class="diplms-en-activit">12 000 diplômés en activité partout dans le monde</div>
            <img class="image-1-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/image 1.png' ); ?>">
            <b class="pourquoi-sinscrire-container"><span>Pourquoi s’inscrire à l’</span><span class="ecole-entreprises">EFREI</span><span> ?</span></b>
        </div>
    </div>

    <div class="header">
        <img class="section-background-2"  alt="" src="<?php echo esc_url( $uri . '/assets/ecole/section background 2.png' ); ?>">
        <img class="section-background-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/section background.png' ); ?>">

        <div class="bouton-dcouverte">
            <img class="flche-bas-icon" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/flèche bas.png' ); ?>">
            <div class="bouton-dcouverte-child"></div>
            <div class="en-savoir-plus">En savoir plus</div>
        </div>

        <b class="vous-tes-le-container">
            <span>Vous êtes le </span><span class="ecole-entreprises">futur</span><span> du numérique</span>
        </b>
    </div>

    <img class="output-onlinepngtools-1-1" alt="" src="<?php echo esc_url( $uri . '/assets/ecole/efrei logo.png' ); ?>">

    <div class="navbar">
        <div class="bouton-inscription">
            <div class="background"></div>
            <a class="sinscrire" href="<?php echo esc_url( home_url('/inscription/') ); ?>">S’inscrire</a>
        </div>
        <div class="bouton-connexion">
            <div class="ecole-background"></div>
            <a class="se-connecter" href="<?php echo esc_url( home_url('/connexion/') ); ?>">Se connecter</a>
        </div>

        <a class="prsentation"    href="<?php echo esc_url( home_url('/presentation/') ); ?>"><b>Présentation</b></a>
        <a class="entreprises2"   href="<?php echo esc_url( home_url('/entreprises/') ); ?>"><b>Entreprises</b></a>
        <a class="ecole2"         href="<?php echo esc_url( home_url('/ecole/') ); ?>"><b>Ecole</b></a>
        <a class="cours"          href="<?php echo esc_url( home_url('/cours/') ); ?>"><b>Cours</b></a>
        <a class="ecole-contact"  href="<?php echo esc_url( home_url('/contact/') ); ?>"><b>Contact</b></a>

        <img class="logo-icon" alt="Logo" src="<?php echo esc_url( $uri . '/assets/ecole/logo.png' ); ?>">
    </div>
</div>

<?php get_footer(); ?>
