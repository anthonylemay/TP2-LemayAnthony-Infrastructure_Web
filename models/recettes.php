<?php
    require_once __DIR__ . '/../include/config.php';

    class modele_recettes {

        public $id_recette;
        public $nom_recette;
        public $type_repas;
        
        public function __construct($id_recette, $nom_recette, $type_repas) {
            $this->id_recette = $id_recette;        
            $this->nom_recette = $nom_recette;
            $this->type_repas = $type_repas;
        }

        public static function getAllDejeuners() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 2;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $dejeuners = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas']
                );
                $liste[] = $dejeuners;
            }
            return $liste;
        }

        public static function getAllRepas() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 3;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $repas = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas']
                );
                $liste[] = $repas;
            }
            return $liste;
        }

        public static function getAllDesserts() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 7;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $desserts = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas']
                );
                $liste[] = $desserts;
            }
            return $liste;
        }

    }
?>
