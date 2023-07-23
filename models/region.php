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
    }
?>