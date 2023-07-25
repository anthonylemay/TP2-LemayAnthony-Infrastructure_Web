<?php

require_once __DIR__ . '/../include/config.php';

class modele_authentification {
    public $id; 
    public $code_utilisateur; 
    public $mot_de_passe;
    public $courriel;

    /***
     * Fonction permettant de construire un objet de type modele_produit
     */
    public function __construct($id, $code_utilisateur, $mot_de_passe, $courriel) {
        $this->id = $id;
        $this->code_utilisateur = $code_utilisateur;
        $this->mot_de_passe = $mot_de_passe;        
        $this->courriel = $courriel;
    }

    public static function getAllUsers(){
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query("
        SELECT * FROM Utilisateurs;
        ");
        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_authentification(
                $enregistrement['id'],
                $enregistrement['code_utilisateur'],
                $enregistrement['mot_de_passe'],
                $enregistrement['courriel']
            );
        }
        return $liste;
    }

    /***
     * Fonction permettant de récupérer un utilisateur en fonction de son code d'utilisateur et mot de passe
     */
    public static function ObtenirUn($code_utilisateur) {
        $mysqli = Db::connecterDB_1();

        if ($requete = $mysqli->prepare("SELECT * FROM utilisateurs WHERE code_utilisateur=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $code_utilisateur); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $utilisateur = new modele_authentification($enregistrement['id'], $enregistrement['code_utilisateur'], $enregistrement['mot_de_passe'], $enregistrement['courriel']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return null;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return null;
        }

        return $utilisateur;
    }

    /***
     * Fonction permettant d'ajouter un produit
     */
    public static function ajouter($code_utilisateur, $mot_de_passe, $courriel) {
        $message = '';

        $mysqli = Db::connecterDB_1();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO utilisateurs(code_utilisateur, mot_de_passe,  courriel) VALUES(?, ?, ?)")) {      



        $mot_de_passe_crypte = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $requete->bind_param("sss", $code_utilisateur, $mot_de_passe_crypte, $courriel);

        if($requete->execute()) { // Exécution de la requête
            $message = "Utilisateur ajouté";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}

?>