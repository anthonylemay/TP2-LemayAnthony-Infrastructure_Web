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
                $erreur = "Aucune région trouvée";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "Aucune région n'a été sélectionnée. Veuillez s.v.p. Réessayer.";
            require './vues/erreur.php';
        }
    }
    
}
