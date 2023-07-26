<?php
$title = 'Fiche du chalet';
include_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/controllers/chalet.php';

if (isset($_GET['id']) && !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

?>

<main>

    <body>

        <?php
        $controllerChalet = new ControllerChalet;
        $controllerChalet->afficherChalet();
        ?>

    </body>
</main>

<?php include_once __DIR__ . '/views/footer.php'; ?>