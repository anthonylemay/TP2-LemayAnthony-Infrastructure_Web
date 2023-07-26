<?php
require_once(__DIR__ . '/../../controllers/recette.php');

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurRecette = new ControllerRecette();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controleurRecette->afficherFicheJSON($id);
    } else {
        // Return error if id parameter is not set
        echo json_encode(["error" => "No id parameter provided"]);
    }
}
?>