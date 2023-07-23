<?php 

include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/region.php';
require_once __DIR__ . '/controllers/chalet.php';

if (isset($_GET['region_id']) && !is_numeric($_GET['region_id'])) {
    header('Location: index.php');
    exit;
}

?>

<main>

</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>

