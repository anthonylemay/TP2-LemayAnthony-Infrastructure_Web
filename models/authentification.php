<?php

require_once __DIR__ . '/../include/config.php';

class modele_authentification {
    public $id; 
    public $code_utilisateur; 
    public $mot_de_passe;
    public $courriel;

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

    public static function ObtenirUn($code_utilisateur) {
        $mysqli = Db::connecterDB_1();

        if ($requete = $mysqli->prepare("SELECT * FROM utilisateurs WHERE code_utilisateur=?")) {  
            $requete->bind_param("s", $code_utilisateur); 

            $requete->execute();

            $result = $requete->get_result();
            
            if($enregistrement = $result->fetch_assoc()) {
                $utilisateur = new modele_authentification($enregistrement['id'], $enregistrement['code_utilisateur'], $enregistrement['mot_de_passe'], $enregistrement['courriel']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";
                return null;
            }   
            
            $requete->close();
        } else {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;*/
            return null;
        }

        return $utilisateur;
    }

    public static function ajouter($code_utilisateur, $mot_de_passe, $courriel) {
        $message = '';

        $mysqli = Db::connecterDB_1();
        
        if ($requete = $mysqli->prepare("INSERT INTO utilisateurs(code_utilisateur, mot_de_passe,  courriel) VALUES(?, ?, ?)")) {      



        $mot_de_passe_crypte = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $requete->bind_param("sss", $code_utilisateur, $mot_de_passe_crypte, $courriel);

        if($requete->execute()) {
            $message = "Utilisateur ajouté";
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;
        }

        $requete->close();

        } else  {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;*/
            exit();
        }

        return $message;
    }
}

?>