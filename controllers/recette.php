<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once (__DIR__ . '/../models/recette.php');

class ControllerRecette{

    function adminToutesRecettes() {
        $recettes = ModelRecette::getAllRecettes();
        $types = modele_typesRepas::getAllTypeRepas();
        require  __DIR__ . '/../views/recettes/gestionRecettes.php';
        require __DIR__ . '/../views/recettes/dialogue-formulaire-ajout.php';
        require __DIR__ . '/../views/recettes/dialogue-formulaire-edition.php';
        require __DIR__ . '/../views/recettes/dialogue-formulaire-suppression.php';
    }
    function afficherFicheJSON($id) {
        header('Content-Type: application/json; charset=utf-8');
        if (isset($_GET["id"])) {
            $recette = ModelRecette::getOneRecette($_GET["id"]);
            if ($recette) {
                echo json_encode($recette);
            } else {
                http_response_code(404); // 404 : Not Found
                $erreur = ["error" => "Aucune recette trouvée"];
                echo json_encode($erreur);
            }
        } else {
            http_response_code(400); // 400 : Bad Request
            $erreur = ["error" => "L'identifiant (id) de la recette à afficher est manquant dans l'url"];
            echo json_encode($erreur);
        }
    }
    function afficherDejeuners(){
        $dejeuners = ModelRecette::getAllDejeuners();
        require_once (__DIR__ . '/../views/recettes/dejeuners.php');
    }

    function afficherRepas(){
        $repas = ModelRecette::getAllRepas();
        require_once (__DIR__ . '/../views/recettes/repas.php');
    }

    function afficherDesserts(){
        $desserts = ModelRecette::getAllDesserts();
        require_once (__DIR__ . '/../views/recettes/desserts.php');
    }

    function adminDejeuners(){
        $dejeuners = ModelRecette::getAllDejeuners();
        require_once (__DIR__ . '/../views/recettes/dejeunersAdmin.php');
    }

    function adminRepas(){
        $repas = ModelRecette::getAllRepas();
        require_once (__DIR__ . '/../views/recettes/repasAdmin.php');
    }

    function adminDesserts(){
        $desserts = ModelRecette::getAllDesserts();
        require_once (__DIR__ . '/../views/recettes/dessertsAdmin.php');
    }

     function afficherListeTypeRepasAjout() {
        $types = modele_typesRepas::getAllTypeRepas();
        require  __DIR__ . '/../views/recettes/listeTypeRepasAjout.php';
    }

    function afficherListeTypeRepasEdit() {
        $types = modele_typesRepas::getAllTypeRepas();
        require  __DIR__ . '/../views/recettes/listeTypeRepasEdit.php';
    }

     function ajouter() {
        if(isset($_POST['nom_recette']) && isset($_POST['type_repas']) && isset($_POST['temps_cuisson_recette'])) {
            $message = ModelRecette::ajouter($_POST['nom_recette'], $_POST['type_repas'], $_POST['temps_cuisson_recette']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un produit. Des informations sont manquantes";
            require __DIR__ . '/../views/erreur.php';
        }
    }

    function editer() {
    if(isset($_POST['id_recette']) && isset($_POST['nom_recette']) && isset($_POST['type_repas']) && isset($_POST['temps_cuisson_recette'])) {
        $message = ModelRecette::editer($_POST['id_recette'], $_POST['nom_recette'], $_POST['type_repas'], $_POST['temps_cuisson_recette']);
        echo $message;
    } else {
        $erreur = "Impossible de modifier le produit. Des informations sont manquantes";
        require __DIR__ . '/../views/erreur.php';
    }
    }
    function supprimer() {
        if(isset($_POST['id'])) {
            $message = ModelRecette::supprimer($_POST['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le produit. Des informations sont manquantes";
            require __DIR__ . '/../views/erreur.php';
        }
    }


}