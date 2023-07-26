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
    
            if ($requete = $mysqli->prepare("SELECT * FROM regions WHERE id=?")) {
                $requete->bind_param("i", $id);
    
                $requete->execute(); 
    
                $result = $requete->get_result();
                
                if($enregistrement = $result->fetch_assoc()) { 
                    $region = new regionModel($enregistrement['id'], $enregistrement['nom']);
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
    
            return $region;
        }
    }
?>