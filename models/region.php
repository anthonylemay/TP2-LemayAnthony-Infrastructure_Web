<?php

    require_once __DIR__ . '/../include/config.php';

    class regionModel {

        public $id;
        public $nom_region;
        
        public function __construct($id, $nom_region) {
            $this->id = $id;        
            $this->nom_region = $nom_region;
        }

        public static function getAllRegions() {
            $liste = [];
            $mysqli = Db::connecterDB_1();
            $resultatRequete = $mysqli->query("SELECT regions.id, regions.nom FROM regions;");
            foreach ($resultatRequete as $enregistrement) {
                $region = new regionModel($enregistrement['id'], $enregistrement['nom']);
                $liste[] = $region;
            }
            return $liste;
        }
        public static function ObtenirUne($id) {
            $mysqli = Db::connecterDB_1();
    
            if ($requete = $mysqli->prepare("SELECT * FROM regions WHERE id=?")) {  // Création d'une requête préparée 
                $requete->bind_param("i", $id); // Envoi des paramètres à la requête
    
                $requete->execute(); // Exécution de la requête
    
                $result = $requete->get_result(); // Récupération de résultats de la requête¸
                
                if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                    $region = new regionModel($enregistrement['id'], $enregistrement['nom']);
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
    
            return $region;
        }
    }
?>