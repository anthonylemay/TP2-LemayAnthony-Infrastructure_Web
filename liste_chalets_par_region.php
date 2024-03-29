<?php
if (isset($_GET['id']) && !is_numeric($_GET['id'])) {
    header('Location: choisir_region.php');
    exit;
} else if (!isset($_GET['id'])) {
    header('Location: choisir_region.php');
    exit;
}
$title = 'Chalets par région';
include_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/controllers/region.php';
require_once __DIR__ . '/controllers/chalet.php';
?>

<main>

    <body>

        <?php
        $controllerRegion = new ControllerRegion;
        $controllerChalet = new ControllerChalet;
        $controllerRegion->afficherRegion();
        $controllerChalet->afficherChaletsParRegion();
        ?>

    </body>
</main>

<?php include_once __DIR__ . '/views/footer.php'; ?>