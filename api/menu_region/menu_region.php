<?php

require_once '../../controllers/menu_region.php';

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controleurAnimaux=new ControleurAnimaux;
    $controleurAnimaux->afficherFicheJSON();
}



?>