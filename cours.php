<?php
/* Template Name: Cours */

get_header();
?>

<?php
$chapitre = isset($_GET['chapitre']) ? strtolower($_GET['chapitre']) : 'variables';

// Définition des chapitres + fichiers PDF associés
$chapitres = [
  'variables'   => ['titre' => "Chapitre 1 : Notions de base",   'pdf' => 'Cours_04_09.pdf'],
  'conditions'  => ['titre' => "Chapitre 2 : Javascript",  'pdf' => 'Cours_javascript.pdf'],
  'boucles'     => ['titre' => "Chapitre 3 : Boucles",     'pdf' => 'COURS_18_09.pdf'],
  'fonctions'   => ['titre' => "Chapitre 4 : POO",  'pdf' => 'Cours_06_10.pdf']
];
?>

<main class="cours-layout">

  <!-- Sidebar gauche -->
  <aside class="sidebar-left">
    <ul class="menu-categories panel-dashed">
      <li><a href="<?php echo home_url('/cours-dashboard'); ?>" class="<?php if (is_page_template('cours-dashboard.php')) echo 'active'; ?>">
        <span>📊</span> Dashboard
      </a></li>
      <li class="active"><span>📚</span> Cours et Leçon
      </a></li>
      <li><a href="<?php echo home_url('/cours-exo'); ?>" class="<?php if (is_page_template('cours-exo.php')) echo 'active'; ?>">
        <span>📝</span> Exercices et Quiz
      </a></li>
      <li><a href="<?php echo home_url('/cours-cal'); ?>" class="<?php if (is_page_template('calendrier.php')) echo 'active'; ?>">
        <span>📅</span> Calendrier

      </a></li>
      <li><a href="<?php echo home_url('/ressources'); ?>" class="<?php if (is_page_template('cours-ressources.php')) echo 'active'; ?>">
        <span>📖</span> Ressources Supplémentaires
      </a></li>
      <li><a href="<?php echo home_url('/commentaire'); ?>" class="<?php if (is_page_template('cours-commentaires.php')) echo 'active'; ?>">
        <span>💬</span> Commentaires

      </a></li>
    </ul>
  </aside>


  <!-- Zone centrale -->
  <section class="cours-main">
    <h1>Cours de Programmation</h1>
    <div class="progress-bar thin"><div class="progress" style="width:25%"></div></div>

    <div class="cours-content">
      <?php if (isset($chapitres[$chapitre])): ?>
        <h2><?php echo $chapitres[$chapitre]['titre']; ?></h2>

        <!-- PDF intégré -->
        <iframe 
          src="<?php echo get_stylesheet_directory_uri(); ?>/Assets/pdf/<?php echo $chapitres[$chapitre]['pdf']; ?>"
          width="100%" 
          height="600px" 
          style="border: none; border-radius: 10px;">
        </iframe>

        <!-- Lien de téléchargement -->
        <p style="margin-top:10px;">
          <a href="<?php echo get_stylesheet_directory_uri(); ?>/Assets/pdf/<?php echo $chapitres[$chapitre]['pdf']; ?>" target="_blank">
            📥 Télécharger le PDF
          </a>
        </p>
      <?php else: ?>
        <p>Chapitre non trouvé.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Sidebar droite -->
  <aside class="sidebar-right">
    <h2 class="accordion open">Programmation</h2>
    <ul class="chapitres panel-dashed">
      <?php foreach ($chapitres as $slug => $data): ?>
        <li class="<?php echo ($chapitre === $slug) ? 'active' : ''; ?>">
          <a href="?chapitre=<?php echo $slug; ?>"><?php echo $data['titre']; ?></a>
          <span class="badge">PDF</span>
        </li>
      <?php endforeach; ?>
    </ul>
  </aside>

</main>

<?php get_footer(); ?>