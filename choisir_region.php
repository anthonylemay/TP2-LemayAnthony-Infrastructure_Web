<?php
$title = 'Choisir sa Région';
include_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/controllers/region.php';
?>

<main>

  <body>
    <h1 class="my-4">Toutes les régions disponibles</h1>
    <?php
    $chaletController = new ControllerRegion();
    $chaletController->afficherListeRegions();
    ?>
  </body>
</main>

<?php include_once __DIR__ . '/views/footer.php'; ?>