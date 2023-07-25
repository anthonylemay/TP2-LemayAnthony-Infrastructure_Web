<?php
  $title = 'Recettes à partager';
include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/recettes.php';
?>

  <main>
  
	<h1>Recettes à partager</h1>	
    <p>Voici notre liste soigneusement sélectionnée de recettes, triées par type (déjeuners, repas et desserts) idéales à concocter au chalet pour partager avec vos amis et votre famille.</p>
    
    <?php
      $controllerRecette=new ControllerRecettes;
      $controllerRecette->afficherDejeuners();
      $controllerRecette->afficherRepas();
      $controllerRecette->afficherDesserts();

    ?>
	
    <!-- ca va surement prendre un controllerAdmin pour afficher aussi la version avec ajout , modifier, supprimer. Pt update celle ci pour que si on est admin = vue plus poussée, sinon vue standard ici présente.-->
  </main>
  <?php include_once __DIR__ . '/vues/footer.php'; ?>
