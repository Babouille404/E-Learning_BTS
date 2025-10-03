<?php
/* Template Name: Présentation */
get_header();

$asset_base = trailingslashit( get_stylesheet_directory_uri() ) . 'assets/';
$asset = function (string $rel) use ($asset_base) {
  $rel = ltrim($rel, '/');
  return esc_url($asset_base . $rel);
};
?>

<main class="container presentation-page">
    <img src="<?php echo get_template_directory_uri(); ?>/Assets/Background.png" class="background" alt="Background" />

  <!-- HERO -->
  <section class="hero">
    <div class="bg2"></div>
    <div class="bg1"></div>

    <div class="avatars">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/509168e3f8567075175f446d6183839f69edff84.jpg" alt="">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/Ellipse 2.svg" alt="">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/Ellipse 5.svg" alt="">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/Ellipse 6.svg" alt="">


      <span>Plus de 1000 joyeux apprenants</span>
    </div>
    <div class="avatars1">
      <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/ic_baseline-plus.svg" alt="">

    </div>

    <div class="hero-text">
      <h1 class="hero-title">Apprenez, <span class="accent">progressez</span>, réussissez !</h1>
      <p class="hero-sub">
        Sur <span class="accent">Ecademy</span>, nous transformons vos objectifs en réussites grâce à des
        <span class="accent">cours accessibles partout</span>, à <span class="accent">tout moment</span>.
      </p>
    </div>

    <a href="#apprendre" class="cta">Commencer</a>
    <div class="cta-arrow">
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M6 9l6 6 6-6" fill="none" stroke="#4C445E" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </div>

    <!-- Post-its -->
    <div class="postit p8">Mathématiques</div>
    <div class="postit p7">Programmation</div>
    <div class="postit p6">Langues</div>
    <div class="postit p5">Sciences</div>
    <div class="postit p4">Vie</div>
    <div class="postit p3">Anglais</div>
    <div class="postit p2">I will be learning<br>you will be learning<br>they will be learning</div>
    <div class="postit p1">“Apprendre sans réfléchir est vain.<br>Réfléchir sans apprendre est dangereux.”<br>— Confucius</div>
  </section>

  <!-- APPRNDRE -->
<section id="apprendre" class="apprendre">
  <div class="container">
    <div class="apprendre-illustration"
         style="background-image:url('<?php echo esc_url( get_asset_url('Presentation/37aa405fc6659cd44a46df86b5096d03606f32dd.png') ); ?>')">
    </div>

    <div class="apprendre-text">
      <h2 class="apprendre-title">Apprendre</h2>

      <div class="swiper apprendre-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><span class="accent-green">Les Maths</span></div>
          <div class="swiper-slide"><span class="accent-green">L’Info</span></div>
          <div class="swiper-slide"><span class="accent-purple">Le Droit</span></div>
          <div class="swiper-slide"><span class="accent-green">Les Langues</span></div>
          <div class="swiper-slide"><span class="accent-purple">Les Sciences</span></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>



  <!-- FEATURES -->
  <section class="apprendre-section">
    <h2 class="section-title">Une meilleure façon d’apprendre</h2>
    <div class="features">
      <article class="feature-card f-left">
        <img class="feature-illus" src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/6375a3333dbc981cc31fa30953db8f5ffa5b3e12.jpg" alt="">

        <div class="feature-inner">
          <h3>Des contenus riches et divers</h3>
          <p>Plongez dans un univers riche de plus de 500 cours captivants, mis à jour en continu...</p>
        </div>
      </article>

      <article class="feature-card f-mid">
        <img class="feature-illus" src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/ea961de1fe87f1d89fbb465537f347b6d875e18c.jpg" alt="">

        <div class="feature-inner">
          <h3>Un suivi personnalisé</h3>
          <p>Ton avancement est documenté et visible avec un planning sur mesure...</p>
        </div>
      </article>

      <article class="feature-card f-right">
        <img class="feature-illus" src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/f9ab1d8e5384e3919fdefd934f58df7749ef04ad.jpg" alt="">

        <div class="feature-inner">
          <h3>Des professeurs à l’écoute</h3>
          <p>Les professeurs sont disponibles pour répondre à tes questions par commentaire, mail ou chatbot.</p>
        </div>
      </article>
    </div>
  </section>


 <!-- PROFESSEURS -->
  <section class="professeurs-section">
    <h2 class="prof-title">Des professeurs <span>investis</span> et <span>qualifiés</span></h2>
    <div class="prof-cards">

      <article class="prof-card">
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/509168e3f8567075175f446d6183839f69edff84.jpg" alt="Photo de Anissa Dahabi">

        <h3>Anissa Dahabi</h3>
        <button class="prof-card__btn"
                data-name="Anissa Dahabi"
                data-cv="<?php echo $asset('Assets/cv/Anissa_Dahabi_CV (1).pdf'); ?>">
          Voir le CV
        </button>
      </article>

      <article class="prof-card">
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/08f0dd77bd88c3d36e393c040a90bee0ff69a82b.png" alt="Photo de Bao Le">
        <h3>Bao Le</h3>
        <button class="prof-card__btn"
                data-name="Bao Le"
                data-cv="<?php echo $asset('Assets/cv/CV_Alternance_Bao_Long_LE (1).pdf'); ?>">
          Voir le CV
        </button>
      </article>

      <article class="prof-card">
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/Capture.png" alt="Photo de Lina">

        <h3>Lina</h3>
        <button class="prof-card__btn"
                data-name="Lina"
                data-cv="<?php echo $asset('Assets/cv/CV_LINA_KAR_(1).pdf'); ?>">
          Voir le CV
        </button>
      </article>

      <article class="prof-card">
        <img src="<?php echo get_template_directory_uri(); ?>/Assets/Presentation/cffd4f3a8d7af99377faab2f253240b8cae2653f.jpg" alt="Photo de Nour Mesbahi">

        <h3>Nour Mesbahi</h3>
        <button class="prof-card__btn"
                data-name="Nour Mesbahi"
                data-cv="<?php echo $asset('Assets/cv/CVN.MESBAHIDI_(1).pdf'); ?>">
          Voir le CV
        </button>
      </article>

    </div>
  </section>
<!-- ===== MODAL CV ===== -->
<div id="cv-modal" class="cv-modal" aria-hidden="true">
  <div class="cv-modal__backdrop" data-close-modal></div>
  <div class="cv-modal__dialog">
    <button class="cv-modal__close" type="button" aria-label="Fermer" data-close-modal>&times;</button>

    <iframe id="cv-frame" title="Visionneuse du CV" loading="lazy"></iframe>

    <a id="cv-download" class="cv-download-btn" href="#" download>Télécharger le CV</a>
  </div>
</div>
<!-- ===== /MODAL CV ===== -->


</main>

<?php get_footer(); ?>
