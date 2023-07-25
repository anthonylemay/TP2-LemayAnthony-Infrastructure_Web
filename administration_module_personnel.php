<?php

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/recettes.php';

$controllerRecette = new ControllerRecettes;

if (isset($_POST['boutonAjouter'])) {        
    $controllerRecette->ajouter();
} else if (isset($_POST['boutonEditer'])) {      
    $controllerRecette->editer();
} else if (isset($_POST['boutonSupprimer'])) {        
    $controllerRecette->supprimer();
} 
?>

  <main>
  
	<h1>Administration - Recettes</h1>	  
    <?php
      $controllerRecette->adminToutesRecettes();

    ?>
	
    
</main>
  <?php include_once __DIR__ . '/vues/footer.php'; ?>
