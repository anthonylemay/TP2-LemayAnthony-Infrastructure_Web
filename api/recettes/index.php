<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../../controllers/recettes.php');

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurRecettes = new ControllerRecettes();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controleurRecettes->afficherFicheJSON($id);
    } else {
        // Return error if id parameter is not set
        echo json_encode(["error" => "No id parameter provided"]);
    }
}
?>
