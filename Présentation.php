<?php
/* Template Name: Cours */
get_header();
?>
  	<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title>Hero — Pixel-perfect</title>

<!-- Polices -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

<style>
  body { margin:0; background:#EFF3FC; font-family:'Inter',sans-serif; }

  /* HERO container */
  .hero {
    position: relative;
    width: 1728px;
    height: 1105px;
    margin: 0 auto;
    overflow: hidden;
  }

  /* Fond double */
  .hero .bg2 {
    position: absolute;
    width: 1903px; height: 1105px;
    left: -2px; top: -31px;
    background: #BAC5EC;
    transform: scaleY(-1);
  }
  .hero .bg1 {
    position: absolute;
    width: 1732.55px; height: 1045px;
    left: -2px; top: 3px;
    background: #D6DCF2;
    transform: scaleY(-1);
  }

  /* Avatars + texte */
  .avatars {
    position: absolute; left: 529px; top: 260px;
    display:flex; align-items:center; gap: 0px;
  }
  .avatars img {
    width:87px; height:87px; border-radius:50%; object-fit:cover; margin: -10px;
  }
  .avatars span {
    font-size:24px; margin-left:20px; color:#000;
  }

  /* Bloc texte central (titre + sous-texte) */
  .hero-text {
    position:absolute;
    top: 325px; left:50%;
    transform:translateX(-50%);
    width: 833px;
    text-align:center;
    font-family:'Poppins',sans-serif;
    color:#4C445E;
  }
  .hero-title {
    font-weight:600;
    font-size:64px;
    line-height:96px;
    margin-bottom:20px;
  }
  .hero-sub {
    font-weight:600;
    font-size:48px;
    line-height:72px;
  }
  .accent { color:#75AA3C; }

  /* Bouton Commencer */
  .cta {
    position:absolute;
    left:717px; top:880px;
    width:337px; height:75px;
    background:#4C445E; border-radius:50px;
    display:flex; align-items:center; justify-content:center;
    font-family:'Inter'; font-weight:600;
    font-size:40px; color:#EFF3FC;
  }

  /* Flèche sous le bouton */
  .cta-arrow {
    position:absolute; left:851px; top:950px;
    width:70px; height:55px;
    display:flex; align-items:center; justify-content:center;
  }
  .cta-arrow svg {
    width:42px; height:42px;
  }

  /* Post-its */
  .postit {
    position:absolute; width:150px; height:150px;
    box-shadow:5px 5px 4px rgba(0,0,0,0.25);
    font-family:'Inter'; font-weight:800;
    font-size:12px; text-align:center;
    padding:10px;
    display:flex; align-items:center; justify-content:center;
  }
  .p8 { left:69px; top:259px; background:#97CC64; transform:rotate(14.83deg); }
  .p7 { left:177px; top:367px; background:#BB393C; color:#fff; }
  .p6 { left:118px; top:672px; background:#BB393C; transform:rotate(3.98deg); color:#fff; }
  .p5 { left:1414px; top:398px; background:#9A7ED9; transform:rotate(-11.84deg); color:#fff; }
  .p4 { left:1337px; top:367px; background:#FFC562; }
  .p3 { left:250px; top:239px; background:#FFC562; }
  .p2 {
    left:156px; top:750px;
    background:#589BF7; color:#fff;
    transform:rotate(19.67deg);
    font-size:11px; line-height:18px;
    flex-direction:column;
  }
  .p1 {
    left:1400px; top:686px;
    background:#589BF7; color:#fff;
    transform:rotate(19.67deg);
    font-size:11px; line-height:18px;
    text-decoration:underline;
    padding:6px;
  }
  .apprendre {
  position: relative;
  width: 1728px;
  height: 600px; /* ajuste selon ta maquette */
  margin: 0 auto;
  background: #EFF3FC;
}

/* Illustration à gauche */
.apprendre-illustration {
  position: absolute;
  left: 60px; top: 0x;
  width: 700px; height: 500px;
  background: url('assets/images/Presentation/37aa405fc6659cd44a46df86b5096d03606f32dd.png') center/contain no-repeat;
}

/* Bloc texte à droite */
.apprendre-text {
  position: absolute;
  right: 180px; top: 150px;
  text-align: left;
  font-family: 'Poppins', sans-serif;
  color: #4C445E;
}

.apprendre-title {
  font-weight: 600;
  font-size: 64px;
  line-height: 96px;
  margin-bottom: 20px;
}

.apprendre-text p {
  font-weight: 600;
  font-size: 48px;
  line-height: 72px;
  margin: 5px 0;
}

.accent-green { color: #75AA3C; }
.accent-purple { color: #4C445E; }
 /* ===== Section APPRENDRE ===== */
  .apprendre-section {
    position: relative;
    width: 1728px;
    height: 950px;
    margin: 0 auto;
    background: transparent;
  }

  .section-title {
    position:absolute;
    width:1083px;
    left: 77px;
    top: 16px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 64px;
    line-height: 96px;
    text-align: center;
    color: #4C445E;
  }

  .features {
    position:absolute;
    left:77px;
    top: 375px;
    width:1540px;
    height:750px;
  }

  .feature-card {
    position:absolute;
    width:416px;
    height:765.52px;
    border-radius:145px;
    
    box-sizing:border-box;
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    box-shadow: 4.9px 4.9px 4.9px rgba(0,0,0,0.08);
  }

  .feature-illus {
    width: 600px;
    height:400px;
    object-fit:contain;
    margin-top: -250px;   
  }

  .feature-inner {
    padding: 5px 28px 40px 28px;
    box-sizing:border-box;
    width:100%;
  }

  .feature-card h3 {
    font-family:'Poppins',sans-serif;
    font-weight:800;
    font-size:32px;
    line-height:44px;
    margin: 12px 0;
    color: inherit;
  }

  .feature-card p {
    font-family:'Inter',sans-serif;
    font-size:35px;
    line-height:40px;
    max-width:320px;
    margin:0 auto;
    color: inherit;
  }

  .f-left  { left: 149.35px; top: 0px;  background: rgba(154,126,217,0.54); color:#4C445E; }
  .f-mid   { left: 675px;    top: 0px;  background: rgba(169,87,88,0.73); color:#3F2D2E; }
  .f-right { left: 1200.65px; top: 0px;  background: rgba(78,107,216,0.8);  color:#242333; }

  /* ===== Section PROFESSEURS ===== */
  .professeurs-section {
    position: relative;
    width: 1728px;
    height: 910px;
    margin: 0 auto;
    margin-top: 250px;
    background: transparent;
  }

  .prof-title {
    position:absolute;
    width:1200px;
    left: 77px;
    top: 16px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 64px;
    line-height: 96px;
    text-align: center;
    color: #4C445E;
  }

  .prof-title span {
    color:#75AA3C;
  }

  .prof-cards {
    position:absolute;
    left:100px;
    top: 200px;
    width:1528px;
    height:600px;
  }

  .prof-card {
    position:absolute;
    width:330px;
    height:480px;
    border-radius:40px;
    background:#fff;
    box-shadow: 4px 6px 8px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    align-items:center;
    padding:20px;
    box-sizing:border-box;
    text-align:center;
  }

  .prof-card img {
    width:220px;
    height:220px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:20px;
  }

  .prof-card h3 {
    font-family:'Poppins',sans-serif;
    font-weight:700;
    font-size:28px;
    margin:10px 0;
    color:#4C445E;
  }

  .prof-card button {
    margin-top:auto;
    width:160px;
    height:50px;
    border-radius:25px;
    border:none;
    background:#4C445E;
    color:#EFF3FC;
    font-family:'Inter',sans-serif;
    font-weight:600;
    font-size:20px;
    cursor:pointer;
  }

  .p01 { left: 0px; top: 0px; transform: rotate(0deg); }
  .p02 { left:400px; top:0px; }
  .p03 { left:800px; top:0px; }
  .p04 { left:1200px; top:0px; }
</style>
</head>
<body>

<div class="hero">
  <!-- Fond -->
  <div class="bg2"></div>
  <div class="bg1"></div>

  <!-- Avatars -->
  <div class="avatars">
    <img src="assets/images/Presentation/509168e3f8567075175f446d6183839f69edff84.jpg" alt="">
    <img src="assets/images/Presentation/Ellipse 2.svg" alt="">
    <img src="assets/images/Presentation/Ellipse 5.svg" alt="">
    <img src="assets/images/Presentation/Ellipse 6.svg" img src="assets/images/Presentation/ic_baseline-plus.svg" alt="">
    <span>Plus de 1000 joyeux apprenants</span>
  </div>

  <!-- Bloc texte central -->
  <div class="hero-text">
    <div class="hero-title">
      Apprenez, <span class="accent">progressez</span>, réussissez !
    </div>
    <div class="hero-sub">
      Sur <span class="accent">Ecademy</span>, nous transformons vos objectifs en réussites grâce à des
      <span class="accent">cours accessibles partout</span>, à <span class="accent">tout moment</span>.
    </div>
  </div>

  <!-- Bouton -->
  <div class="cta">Commencer</div>

  <!-- Flèche -->
  <div class="cta-arrow">
    <svg viewBox="0 0 24 24">
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
  <div class="postit p2">
    I will be learning<br>
    you will be learning<br>
    they will be learning
  </div>
  <div class="postit p1">
    “Apprendre sans réfléchir est vain.<br>
    Réfléchir sans apprendre est dangereux.”<br>
    — Confucius
  </div>
</div>
<section class="apprendre">
  <div class="apprendre-illustration"></div>
  <div class="apprendre-text">
    <h2 class="apprendre-title">Apprendre</h2>
    <p><span class="accent-green">Les Maths</span></p>
    <p><span class="accent-green">L’Info</span></p>
    <p><span class="accent-purple">Le Droit</span></p>
  </div>
</section>
<section class="apprendre-section" aria-label="Une meilleure façon d'apprendre">
  <div class="section-title">Une meilleure façon d’apprendre</div>

  <div class="features" role="group" aria-label="feature-cards">
    <article class="feature-card f-left">
      <img class="feature-illus" src="assets/images/Presentation/6375a3333dbc981cc31fa30953db8f5ffa5b3e12.png" alt="Illustration contenus riches">
      <div class="feature-inner">
        <h3>Du Contenus riches et divers</h3>
        <p>Plongez dans un univers riche de plus de 500 cours captivants, mis à jour en continu. Des mathématiques à la broderie, en passant par la programmation, les langues, l’art.</p>
      </div>
    </article>

    <article class="feature-card f-mid">
      <img class="feature-illus" src="assets/images/Presentation/ea961de1fe87f1d89fbb465537f347b6d875e18c.png" alt="Illustration suivi personnalisé">
      <div class="feature-inner">
        <h3>Un suivi personnalisé</h3>
        <p>Ton avancement est documenté et visible. Avec un planning sur mesure pour équilibrer ta charge de travail et alléger ton emploi du temps.</p>
      </div>
    </article>

    <article class="feature-card f-right">
      <img class="feature-illus" src="assets/images/Presentation/f9ab1d8e5384e3919fdefd934f58df7749ef04ad.png" alt="Illustration professeurs">
      <div class="feature-inner">
        <h3>Des professeurs à l’écoute</h3>
        <p>Pour mieux comprendre, les professeurs de l’équipe pédagogique sont à ta disposition. Pose tes questions par commentaires, mail ou chatbot.</p>
      </div>
    </article>
  </div>
</section>

<!-- Section 2 -->
<section class="professeurs-section" aria-label="Professeurs investis et qualifiés">
  <div class="prof-title">Des professeurs <span>investis</span> et <span>qualifiés</span></div>

  <div class="prof-cards">
    <article class="prof-card p01">
      <img src="assets/images/Presentation/509168e3f8567075175f446d6183839f69edff84.jpg" alt="Professeur 1">
      <h3>Anissa Dahabi</h3>
      <button>En savoir +</button>
    </article>

    <article class="prof-card p02">
      <img src="assets/images/Presentation/08f0dd77bd88c3d36e393c040a90bee0ff69a82b.png" alt="Professeur 2">
      <h3>Bao Le</h3>
      <button>En savoir +</button>
    </article>

    <article class="prof-card p03">
      <img src="assets/images/Presentation/Capture d'écran 2024-11-12 195353 2.png" alt="Professeur 3">
      <h3>Lina</h3>
      <button>En savoir +</button>
    </article>

    <article class="prof-card p04">
      <img src="assets/images/Presentation/cffd4f3a8d7af99377faab2f253240b8cae2653f.jpg" alt="Professeur 4">
      <h3>Nour Mesbahi</h3>
      <button>En savoir +</button>
    </article>
  </div>
</section>


</body>
</html>

<?php get_Footer();
?>