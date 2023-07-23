<?php 

/*include_once __DIR__ . '/vues/header.php';
require_once __DIR__ . '/controllers/region.php';
require_once __DIR__ . '/controllers/chalet.php';

if (isset($_GET['region_id']) && is_numeric($_GET['region_id'])) {
    $region_id = $_GET['region_id'];
    
    $regionController = new RegionController();
    $chaletController = new ChaletController();
    
    $region = $regionController->getRegionById($region_id);
    $chalets = $chaletController->getChaletsByRegion($region_id);
    
} else {
    // Handle the case where region_id is not set or is not valid
    // This could involve showing an error message and/or redirecting to another page
}*/

?>

<main>
    <h1><?php echo $region->nom_region; ?></h1>
    
    <!-- Display the list of chalets -->
    <?php foreach ($chalets as $chalet): ?>
        <div>
            <h2><?php echo $chalet->nom; ?></h2>
            <!-- Add more chalet details here -->
        </div>
    <?php endforeach; ?>
</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>

