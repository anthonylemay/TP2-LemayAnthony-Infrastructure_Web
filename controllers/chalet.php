<?php

require_once (__DIR__ . '/../models/chalet.php');

class ControllerChalet {
    function afficherDealFlash() { // Flash Deal - Vacances constructions! 
        $chalets = ModelChalet::getDealFlash();
        require  __DIR__ . '/../views/chalets/chaletsDealFlash.php';
    }

    function afficherAllDeals() {
        $chalets = ModelChalet::getAllDeals();
        require  __DIR__ . '/../views/chalets/chaletsAllDeals.php';
    }

    function afficherChaletsParRegion() {
        if(isset($_GET["id"])) {
        $chalets = ModelChalet::getAllChaletsParRegion($_GET["id"]);
        if($chalets){
        require  __DIR__ . '/../views/chalets/chaletsRegion.php';
        } else {
            $erreur = "Aucun chalet trouvé dans la région visée";
            require __DIR__ . '/../views/erreur.php';
        }

    } else {
        $erreur = "Sans région, nous ne pouvons vous afficher des chalets. Veuillez réessayer.";
        require __DIR__ . '../views/erreur.php';
    }
    }
    function afficherChaletsActifs() {
        $chalets = ModelChalet::getChaletsActifs();
        require  __DIR__ . '/../views/chalets/chaletsActifs.php';
    }

    function afficherChalet() {
        if(isset($_GET["id"])) {
            $chalet = ModelChalet::getOneChalet($_GET["id"]);
            if($chalet) {
                require __DIR__ . '/../views/chalets/chaletIndividuel.php';
            } else {
                $erreur = "Aucun chalet trouvée";
                require __DIR__ . '/../views/erreur.php';
            }
        } else {
            $erreur = "Aucun chalet n'a été sélectionné. Veuillez s.v.p. Réessayer.";
            require __DIR__ . '/../views/erreur.php';
        }
    }


}

?>
