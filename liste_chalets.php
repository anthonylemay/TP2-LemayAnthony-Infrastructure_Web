<?php
$title = 'Tous les chalets';
include_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/controllers/chalet.php';
?>

<main>

  <body>
    <h1 class="my-4">Tous les chalets actifs</h1>
    <?php
    $chaletController = new ControllerChalet();
    $chaletController->afficherChaletsActifs();
    ?>
  </body>
</main>

<?php include_once __DIR__ . '/views/footer.php'; ?>