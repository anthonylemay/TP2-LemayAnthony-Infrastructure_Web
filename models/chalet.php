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

    public static function getDealFlash() {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query(
        "SELECT * FROM chalets 
        WHERE promo = 1 AND actif = 1  
        ORDER BY RAND()
        LIMIT 6;        
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

    public static function getAllDeals() {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query(
        "SELECT * FROM chalets 
        WHERE promo = 1 AND actif = 1  
        ORDER BY nom ASC;       
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

    public static function getChaletsActifs() {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        $resultatRequete = $mysqli->query(
        "SELECT * FROM chalets 
        WHERE actif = 1  
        ORDER BY nom ASC;    
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
        $resultatRequete = $mysqli->query("SELECT * FROM chalets;
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

    public static function getAllChaletsParRegion($id) {
        $liste = [];
        $mysqli = Db::connecterDB_1();
        if ($requete = $mysqli->prepare("SELECT * FROM chalets WHERE chalets.fk_region=? AND actif = 1  
        ORDER BY nom ASC;")) { 
        $requete->bind_param("i", $id);
        $requete->execute();
        $resultatRequete = $requete->get_result();
        while($enregistrement = $resultatRequete->fetch_assoc()) {
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
        $requete->close();
        }   else {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;*/
            return null;
        }
        return $liste;
    }

    public static function getOneChalet($id) {
        $mysqli = Db::connecterDB_1();

        if ($requete = $mysqli->prepare("SELECT * FROM chalets WHERE id=?")) {
            $requete->bind_param("i", $id);

            $requete->execute();

            $result = $requete->get_result();
            
            if($enregistrement = $result->fetch_assoc()) {
                $chalet = new modele_chalets(
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

        return $chalet;
    }
}
?>