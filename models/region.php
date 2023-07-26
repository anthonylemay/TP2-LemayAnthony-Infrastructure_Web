<?php

    require_once __DIR__ . '/../include/config.php';

    class ModelRegion {

        public $id;
        public $nom_region;
        
        public function __construct($id, $nom_region) {
            $this->id = $id;        
            $this->nom_region = $nom_region;
        }

        public static function getAllRegions()
        {
            $liste = [];
            $mysqli = Db::connecterDB_1();
            $query = "SELECT regions.id, regions.nom FROM regions";
            $requete = $mysqli->prepare($query);
        
            if ($requete) {
                $requete->execute();
                $resultatRequete = $requete->get_result();
        
                foreach ($resultatRequete as $enregistrement) {
                    $region = new ModelRegion($enregistrement['id'], $enregistrement['nom']);
                    $liste[] = $region;
                }
        
                $requete->close();
            } else {
                /*echo "Une erreur a été détectée dans la requête utilisée : ";
                echo $mysqli->error;*/
                return null;
            }
        
            return $liste;
        }
        
        public static function getOneRegion($id)
        {
            $mysqli = Db::connecterDB_1();
            $query = "SELECT * FROM regions WHERE id=?";
            $requete = $mysqli->prepare($query);
        
            if ($requete) {
                $requete->bind_param("i", $id);
                $requete->execute();
                $resultatRequete = $requete->get_result();
        
                if ($enregistrement = $resultatRequete->fetch_assoc()) {
                    $region = new ModelRegion($enregistrement['id'], $enregistrement['nom']);
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