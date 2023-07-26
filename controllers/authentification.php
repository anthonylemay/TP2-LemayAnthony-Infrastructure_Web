<?php

require_once (__DIR__ . '/../models/authentification.php');
require_once (__DIR__ . '/../views/authentification/dialogue-login.php');

class ControllerAuthentification {

    function connexion() {
        $authentification = ModelAuthentification::getAllUsers();
        require  __DIR__ . '/../views/authentification/dialogue-login.php';
    }

    function ajouter() {
        if(isset($_POST['utilisateur_ajout']) && isset($_POST['mot_de_passe_ajout']) && isset($_POST['courriel_ajout'])) {
            $message = ModelAuthentification::ajouter($_POST['utilisateur_ajout'], $_POST['mot_de_passe_ajout'], $_POST['courriel_ajout']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un utilisateur. Des informations sont manquantes";
        require __DIR__ . '/../views/erreur.php';
        }
    }

    function connecter() {
        if(isset($_POST['utilisateur_login']) && isset($_POST['mot_de_passe_login'])) {
            $utilisateur = ModelAuthentification::ObtenirUn($_POST['utilisateur_login']);
            if($utilisateur) {                          
                if(password_verify($_POST['mot_de_passe_login'], $utilisateur->mot_de_passe)) {
                    $_SESSION['utilisateur'] = $_POST['utilisateur_login'];
                    header('Location: .');
                } else {
                    $erreur = "<b class='erreur'>Le mot de passe est incorrect</b>";
                require __DIR__ . '/../views/erreur.php';
                }
            } else {
                $erreur = "L'utilisateur n'existe pas";
            require __DIR__ . '/../views/erreur.php';
            }
        } else {
            $erreur = "Impossible de se connecter. Des informations sont manquantes";
        require __DIR__ . '/../views/erreur.php';
        }

    }
    function deconnecter() {
        if(isset($_SESSION["utilisateur"])) {
            unset($_SESSION["utilisateur"]);
            header('Location: .');
        }

    }
}

?>