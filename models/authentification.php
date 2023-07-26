<?php

require_once __DIR__ . '/../include/config.php';

class ModelAuthentification {
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

    public static function getAllUsers()
    {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $query = "SELECT * FROM Utilisateurs";
        $requete = $mysqli->prepare($query);
        
        if ($requete) {
            $requete->execute();
            $resultatRequete = $requete->get_result();
            
            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new ModelAuthentification(
                    $enregistrement['id'],
                    $enregistrement['code_utilisateur'],
                    $enregistrement['mot_de_passe'],
                    $enregistrement['courriel']
                );
            }
            
            $requete->close();
        } else {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;*/
            return null;
        }
        
        return $liste;
    }
    

    public static function ObtenirUn($code_utilisateur)
    {
        $mysqli = Db::connecterDB_1();
        $query = "SELECT * FROM utilisateurs WHERE code_utilisateur=?";
        $requete = $mysqli->prepare($query);
        
        if ($requete) {
            $requete->bind_param("s", $code_utilisateur);
            $requete->execute();
            $resultatRequete = $requete->get_result();
            
            if ($enregistrement = $resultatRequete->fetch_assoc()) {
                $utilisateur = new ModelAuthentification(
                    $enregistrement['id'],
                    $enregistrement['code_utilisateur'],
                    $enregistrement['mot_de_passe'],
                    $enregistrement['courriel']
                );
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
    

    public static function ajouter($code_utilisateur, $mot_de_passe, $courriel)
    {
        $message = '';
        $mysqli = Db::connecterDB_1();
        $query = "INSERT INTO utilisateurs(code_utilisateur, mot_de_passe, courriel) VALUES(?, ?, ?)";
        $requete = $mysqli->prepare($query);
    
        if ($requete) {
            // Hash the password
            $mot_de_passe_crypte = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            $requete->bind_param("sss", $code_utilisateur, $mot_de_passe_crypte, $courriel);
            if ($requete->execute()) {
                $message = "Utilisateur ajouté";
            } else {
                $message = "Une erreur est survenue lors de l'ajout: " . $requete->error;
            }
            
            $requete->close();
        } else {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;*/
            exit();
        }
    
        return $message;
    }
    
}

?>