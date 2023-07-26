<?php

require_once __DIR__ . '/../models/region.php';

class ControllerRegion {
    public function afficherMenuRegions() {
        $regions = ModelRegion::getAllRegions();
        require __DIR__ . '/../views/menu/menuRegions.php';
    }
    function afficherRegion() {
        if(isset($_GET["id"])) {
            $region = ModelRegion::getOneRegion($_GET["id"]);
            if($region) {
                require __DIR__ . '/../views/regions/regionIndividuelle.php';
            } else {
                $erreur = "Aucune région trouvée";
                require './views/erreur.php';
            }
        } else {
            $erreur = "Aucune région n'a été sélectionnée. Veuillez s.v.p. Réessayer.";
            require './views/erreur.php';
        }
    }

    function afficherListeRegions() {
        $regions = ModelRegion::getAllRegions();
        require  __DIR__ . '/../views/regions/listeRegions.php';
    }
    
}
