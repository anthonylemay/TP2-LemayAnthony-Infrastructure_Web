<?php

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/chalet.php';
?>

<main>
    <body>
    <h1 class="my-4">Tous les chalets actifs</h1>
     <?php
        $chaletController = new ControllerChalets();
        $chaletController->afficherChaletsActifs();
     ?>
    </body>
</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>