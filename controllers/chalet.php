<?php

require_once (__DIR__ . '/../models/chalet.php');

class ControllerChalets {
    function afficherDealsChalets() {
        $chalets = modele_chalets::getDealChalets();
        require  __DIR__ . '/../vues/chalets/chaletsDeals.php';
    }

    function afficherChaletsParRegion() {
        if(isset($_GET["id"])) {
        $chalets = modele_chalets::getAllChaletsParRegion($_GET["id"]);
        if($chalets){
        require  __DIR__ . '/../vues/chalets/chaletsRegion.php';
        } else {
            $erreur = "Aucun chalet trouvé dans la région visée";
            require './vues/erreur.php';
        }

    } else {
        $erreur = "Sans région, nous ne pouvons vous afficher des chalets. Veuillez réessayer.";
        require './vues/erreur.php';
    }
    }
    function afficherChaletsActifs() {
        $chalets = modele_chalets::getChaletsActifs();
        require  __DIR__ . '/../vues/chalets/chaletsActifs.php';
    }


}

?>
