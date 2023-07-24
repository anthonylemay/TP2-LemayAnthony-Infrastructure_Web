<?php

require_once (__DIR__ . '/../models/recettes.php');


class ControllerRecettes{


    function afficherDejeuners(){
        $dejeuners = modele_recettes::getAllDejeuners();
        require_once (__DIR__ . '/../vues/recettes/dejeuners.php');
    }

    function afficherRepas(){
        $repas = modele_recettes::getAllRepas();
        require_once (__DIR__ . '/../vues/recettes/repas.php');
    }

    function afficherDesserts(){
        $desserts = modele_recettes::getAllDesserts();
        require_once (__DIR__ . '/../vues/recettes/desserts.php');
    }

    function adminDejeuners(){
        $dejeuners = modele_recettes::getAllDejeuners();
        require_once (__DIR__ . '/../vues/recettes/dejeunersAdmin.php');
    }

    function adminRepas(){
        $repas = modele_recettes::getAllRepas();
        require_once (__DIR__ . '/../vues/recettes/repasAdmin.php');
    }

    function adminDesserts(){
        $desserts = modele_recettes::getAllDesserts();
        require_once (__DIR__ . '/../vues/recettes/dessertsAdmin.php');
    }


}