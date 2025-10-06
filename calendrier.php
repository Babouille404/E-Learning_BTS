<?php
/* Template Name: Calendrier */
get_header();// === CONFIG ===
$mois  = date("n");  // mois actuel (1–12)
$annee = date("Y");  // année actuelle

// Nombre de jours dans le mois
$nbJours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);

// Jour de la semaine du 1er (1=lundi, 7=dimanche)
$premierJour = date("N", strtotime("$annee-$mois-01"));

// Événements du mois (exemple)
$evenements = [
  "05/2/2025" => "Cours : Variables",
  "08/2/2025" => "Exercice : Variables",
  "12/2/2025" => "Cours : Conditions",
  "16/2/2025" => "Exercice : Conditions",
  "19/2/2025" => "Cours : Boucles",
  "23/2/2025" => "Mini-projet : Boucles",
  "26/2/2025" => "Cours : Fonctions",
  "28/2/2025" => "Examen : Variables + Conditions + Boucles"
];

?>
<!-- dans header.php ou calendrier.php -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<main class="cours-layout">

  <!-- Sidebar gauche -->
  <aside class="sidebar-left">
    <ul class="menu-categories panel-dashed">
      <li><a href="<?php echo home_url('/cours-dashboard'); ?>" class="<?php if (is_page_template('cours-dashboard.php')) echo 'active'; ?>">
        <span>📊</span> Dashboard
      </a></li>
      <li><a href="<?php echo home_url('/cours'); ?>" class="<?php if (is_page_template('cours.php')) echo 'active'; ?>">
        <span>📚</span> Cours et Leçon
      </a></li>
      <li><a href="<?php echo home_url('/cours-exo'); ?>" class="<?php if (is_page_template('cours-exo.php')) echo 'active'; ?>">
        <span>📝</span> Exercices et Quiz
      </a></li>
      <li class="active"><span>📅</span> Calendrier
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
    <h1>Calendrier — <?php echo strftime("%B %Y", strtotime("$annee-$mois-01")); ?></h1>
    <div class="progress-bar thin"><div class="progress" style="width:100%"></div></div>

    <div class="calendar-container">
      <table class="calendar-table">
        <thead>
          <tr>
            <th>Lun</th><th>Mar</th><th>Mer</th>
            <th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $jour = 1;
          $col = 1;

          // Première ligne
          echo "<tr>";
          for ($i=1; $i < $premierJour; $i++) {
            echo "<td></td>";
            $col++;
          }

          while ($jour <= $nbJours) {
            // Date au format d/m/Y
            $dateStr = str_pad($jour, 2, "0", STR_PAD_LEFT) . "/$mois/$annee";

            // Case avec ou sans événement
            if (isset($evenements[$dateStr])) {
              echo "<td class='event'>$jour<br><small>{$evenements[$dateStr]}</small></td>";
            } else {
              echo "<td>$jour</td>";
            }

            // Passer à la colonne suivante
            if ($col % 7 == 0) {
              echo "</tr><tr>";
            }
            $jour++;
            $col++;
          }

          // Cases vides en fin de tableau
          while (($col-1) % 7 != 0) {
            echo "<td></td>";
            $col++;
          }
          echo "</tr>";
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Sidebar droite -->
  <aside class="sidebar-right">
    <h2>Prochains événements</h2>
    <ul class="chapitres panel-dashed">
      <?php foreach ($evenements as $date => $titre): ?>
        <li><span>📌 <?php echo $titre; ?></span><span class="badge"><?php echo $date; ?></span></li>
      <?php endforeach; ?>
    </ul>
  </aside>

</main>

<?php get_footer(); ?>