<?php

require_once (__DIR__ . '/../models/chalet.php');

class ControllerChalets {
    
    /***
     * Fonction permettant de récupérer l'ensemble des Chalets et de les afficher sous forme de tableau
     */
    function afficherDealsChalets() {
        $chalets = modele_chalets::getDealChalets();
        require  __DIR__ . '/../vues/chalets/chaletsDeals.php';
    }

    /***
     * Fonction permettant d'ajouter une commande
     
    function ajouter() {
        if(isset($_POST['id']) && isset($_POST['nom'])) {
            $message = modele_chalet::ajouter($_POST['id'], $_POST['nom']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter une commande. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }*/
}

?>
