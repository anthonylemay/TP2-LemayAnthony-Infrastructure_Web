<?php

require_once __DIR__ . '/../include/config.php';

class modele_chalets {
    public $id;
    public $nom;
    public $description;
    public $personnes_max;
    public $prix_haute_saison;
    public $prix_basse_saison;
    public $actif;
    public $promo;
    public $date_inscription;
    public $fk_region;
    public $id_picsum;
    /***
     * Fonction permettant de construire un objet de type modele_chalet
     */
    public function __construct($id, $nom, $description, $personnes_max, $prix_haute_saison, $prix_basse_saison, $actif, $promo, $date_inscription, $fk_region, $id_picsum) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->personnes_max = $personnes_max;
        $this->prix_haute_saison = $prix_haute_saison;
        $this->prix_basse_saison = $prix_basse_saison;
        $this->actif = $actif;
        $this->promo = $promo;
        $this->date_inscription = $date_inscription;
        $this->fk_region = $fk_region;
        $this->id_picsum = $id_picsum;
    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    /***
     * Fonction permettant de récupérer l'ensemble des chalets 
     */
    public static function getDealChalets() {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query(
        "SELECT * FROM chalets 
        WHERE promo = 1 AND actif = 1  
        ORDER BY date_inscription ASC;
        ");

        foreach ($resultatRequete as $enregistrement) {
            $liste [] = new modele_chalets(
                $enregistrement['id'],
                $enregistrement['nom'],
                $enregistrement['description'],
                $enregistrement['personnes_max'],
                $enregistrement['prix_haute_saison'],
                $enregistrement['prix_basse_saison'],
                $enregistrement['actif'],
                $enregistrement['promo'],
                $enregistrement['date_inscription'],
                $enregistrement['fk_region'],
                $enregistrement['id_picsum']);
        }
        return $liste;
    }

    public static function getAllChalets() {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query("SELECT * FROM chalets WHERE;
        "); // replace 'properties' with your table name

        foreach ($resultatRequete as $enregistrement) {
            $liste [] = new modele_chalets(
                $enregistrement['id'],
                $enregistrement['nom'],
                $enregistrement['description'],
                $enregistrement['personnes_max'],
                $enregistrement['prix_haute_saison'],
                $enregistrement['prix_basse_saison'],
                $enregistrement['actif'],
                $enregistrement['promo'],
                $enregistrement['date_inscription'],
                $enregistrement['fk_region'],
                $enregistrement['id_picsum']);
        }
        return $liste;
    }


    
    }
?>
