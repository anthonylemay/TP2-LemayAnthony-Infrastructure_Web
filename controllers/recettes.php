<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once (__DIR__ . '/../models/recettes.php');


class ControllerRecettes{


    function adminToutesRecettes() {
        $recettes = modele_recettes::getAllRecettes();
        require  __DIR__ . '/../vues/recettes/gestionRecettes.php';
        require __DIR__ . '/../vues/recettes/dialogue-formulaire-ajout.php';
        require __DIR__ . '/../vues/recettes/dialogue-formulaire-edition.php';
        require __DIR__ . '/../vues/recettes/dialogue-formulaire-suppression.php';
    }
    function afficherFicheJSON($id) {
        header('Content-Type: application/json; charset=utf-8');
        if (isset($_GET["id"])) {
            $recette = modele_recettes::getOneRecette($_GET["id"]);
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

     function afficherListeTypeRepas() {
        $types = modele_typesRepas::getAllTypeRepas();
        require  __DIR__ . '/../vues/recettes/listeTypeRepas.php';
    }

    function afficherListeTypeRepasEdit() {
        $types = modele_typesRepas::getAllTypeRepas();
        require  __DIR__ . '/../vues/recettes/listeTypeRepasEdit.php';
    }

     function ajouter() {
        if(isset($_POST['nom_recette']) && isset($_POST['type_repas'])) {
            $message = modele_recettes::ajouter($_POST['nom_recette'], $_POST['type_repas']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de modifier un produit
     */
    function editer() {
        if(isset($_POST['id_recette']) && isset($_POST['nom_recette']) && isset($_POST['type_repas'])) {
            $message = modele_recettes::editer($_POST['id_recette'], $_POST['nom_recette'], $_POST['type_repas']);
            echo $message;
        } else {
            $erreur = "Impossible de modifier le produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de supprimer un produit
     */
    function supprimer() {
        if(isset($_POST['id'])) {
            $message = modele_recettes::supprimer($_POST['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le produit. Des informations sont manquantes";
            require __DIR__ . '/../vues/erreur.php';
        }
    }


}