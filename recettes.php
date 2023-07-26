<?php
$title = 'Recettes à partager';
include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/recettes.php';
?>

<main>
  <div class="recetteFlex">
    <h1>Recettes à partager</h1>
    <p class="textW">Voici notre liste de recettes idéales pour un séjour au chalet. Elles sont triées par type
      (déjeuners, repas et desserts) et sont idéales à concocter sur place afin de partager avec vos amis et votre
      famille. Les abonnés à notre infolettre obtiendront également un lien exclusif vers des desserts, des collations,
      des breuvages et tous autres types de repas adaptés à votre groupe.</p>
  </div>
  <?php
  $controllerRecette = new ControllerRecettes;
  $controllerRecette->afficherDejeuners();
  $controllerRecette->afficherRepas();
  $controllerRecette->afficherDesserts();

  ?>

  <!-- ca va surement prendre un controllerAdmin pour afficher aussi la version avec ajout , modifier, supprimer. Pt update celle ci pour que si on est admin = vue plus poussée, sinon vue standard ici présente.-->
</main>
<?php include_once __DIR__ . '/vues/footer.php'; ?>