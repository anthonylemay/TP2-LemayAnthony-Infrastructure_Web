<?php 

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/region.php';
require_once __DIR__ . '/controllers/chalet.php';

?>

<main>
    <body>
     
     <?php
        $chaletController = new ControllerChalets();
        $chaletController->afficherAllDeals();
     ?>
    </body>
</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>