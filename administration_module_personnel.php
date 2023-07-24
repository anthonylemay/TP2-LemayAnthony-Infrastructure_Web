<?php

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/recettes.php';
?>

  <main>
  
	<h1>Administration - Recettes</h1>	  
    <?php
      $controllerRecette=new ControllerRecettes;
      $controllerRecette->adminDejeuners();
      $controllerRecette->adminRepas();
      $controllerRecette->adminDesserts();

    ?>
	
    
</main>
  <?php include_once __DIR__ . '/vues/footer.php'; ?>
