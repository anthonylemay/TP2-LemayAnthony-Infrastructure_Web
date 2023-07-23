<?php 

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/region.php';
require_once __DIR__ . '/controllers/chalet.php';

if (isset($_GET['id']) && !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

?>

<main>
    <body>
     
     <?php
         $controllerRegion=new RegionController;
         $controllerChalet=new ControllerChalets;
         $controllerRegion->afficherRegion();
         $controllerChalet->afficherChaletsParRegion();
     ?>
     
     <a href="clients.php">Retour à la liste des clients</a>
 
    </body>
</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>