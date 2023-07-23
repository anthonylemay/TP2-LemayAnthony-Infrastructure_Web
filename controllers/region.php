<?php

require_once __DIR__ . '/../models/region.php';

class RegionController {
    public function afficherMenuRegions() {
        $regions = regionModel::getAllRegions();
        require __DIR__ . '/../vues/menu/listeRegion.php';
    }
    function afficherRegion() {
        if(isset($_GET["id"])) {
            $region = regionModel::ObtenirUne($_GET["id"]);
            if($region) {
                require __DIR__ . '/../vues/regions/regionIndividuelle.php';
            } else {
                $erreur = "Aucun client trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant du client à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }
    
}
