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
            $erreur = "Aucune région trouvée avec cet identifiant";
            require './vues/erreur.php';
        }

    } else {
        $erreur = "L'identifiant du client à afficher est manquant dans l'url";
        require './vues/erreur.php';
    }
}

}

?>
