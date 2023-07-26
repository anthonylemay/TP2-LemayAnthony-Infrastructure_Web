<?php
    require_once __DIR__ . '/../include/config.php';

    class ModelRecette {

        public $id_recette;
        public $nom_recette;
        public $id_type;
        public $type_repas;
        public $temps_cuisson_recette;
        
        public function __construct(
        $id_recette,
        $nom_recette,
        $id_type,
        $type_repas,
        $temps_cuisson_recette)
        {
        $this->id_recette = $id_recette;
        $this->nom_recette = $nom_recette;
        $this->type_repas = $type_repas;
        $this->id_type = $id_type;
        $this->temps_cuisson_recette = $temps_cuisson_recette;
        }
        

        public static function getAllDejeuners() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
            SELECT r.id_recette, r.nom_recette, r.temps_cuisson_recette, r.id_type, t.type_repas
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type
            WHERE r.id_type = 2;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $dejeuners = new ModelRecette(
                    $enregistrement['id_recette'],
                    $enregistrement['nom_recette'],
                    $enregistrement['id_type'],
                    $enregistrement['type_repas'],
                    $enregistrement['temps_cuisson_recette']
                );
                $liste[] = $dejeuners;
            }
            return $liste;
        }

        public static function getAllRepas() { // Repas ici signifie diner/souper et non toutes les recettes. Voir getAllRecettes
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
            SELECT r.id_recette, r.nom_recette, r.temps_cuisson_recette, r.id_type, t.type_repas
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type
            WHERE r.id_type = 3;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $repas = new ModelRecette(
                    $enregistrement['id_recette'],
                    $enregistrement['nom_recette'],
                    $enregistrement['id_type'],
                    $enregistrement['type_repas'],
                    $enregistrement['temps_cuisson_recette']
                );
                $liste[] = $repas;
            }
            return $liste;
        }

        public static function getAllDesserts() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
            SELECT r.id_recette, r.nom_recette, r.temps_cuisson_recette, r.id_type, t.type_repas
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type
            WHERE r.id_type = 7;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $desserts = new ModelRecette(
                    $enregistrement['id_recette'],
                    $enregistrement['nom_recette'],
                    $enregistrement['id_type'],
                    $enregistrement['type_repas'],
                    $enregistrement['temps_cuisson_recette']
                );
                $liste[] = $desserts;
            }
            return $liste;
        }

        public static function getAllRecettes() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
    
            $resultatRequete = $mysqli->query("SELECT r.id_recette,
            r.temps_cuisson_recette, r.nom_recette, r.id_type, t.type_repas
             FROM recette r
             INNER JOIN type t ON r.id_type = t.id_type;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new ModelRecette(
                    $enregistrement['id_recette'],
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas'],
                    $enregistrement['id_type'],
                    $enregistrement['temps_cuisson_recette']);
            }
    
            return $liste;
        }

        public static function getOneRecette($id_recette) {
            $mysqli = Db::connecterDB_2();
    
            if ($requete = $mysqli->prepare("SELECT r.id_recette, r.temps_cuisson_recette,
            r.nom_recette, r.id_type, t.type_repas
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type
            WHERE r.id_recette = ?;
            ")) {
                $requete->bind_param("i", $id_recette);
    
                $requete->execute();
    
                $result = $requete->get_result();
                if($enregistrement = $result->fetch_assoc()) {
                    $recette = new ModelRecette(
                        $enregistrement['id_recette'],
                        $enregistrement['nom_recette'],
                        $enregistrement['id_type'],
                        $enregistrement['type_repas'],
                        $enregistrement['temps_cuisson_recette']);


                } else {
                    //echo "Erreur: Aucun enregistrement trouvé.";
                    return null;
                }   
                
                $requete->close(); // Fermeture du traitement 
            } else {
                /*echo "Une erreur a été détectée dans la requête utilisée : ";
                echo $mysqli->error;*/
                return null;
            }
    
            return $recette;
        }

        public static function ajouter($nom_recette, $type_repas, $temps_cuisson_recette) {
        $message = '';

        $mysqli = Db::connecterDB_2();
        
        if ($requete = $mysqli->prepare("INSERT INTO recette(nom_recette, id_type, temps_cuisson_recette) VALUES(?, ?, ?)")) {      

        $requete->bind_param("sis", $nom_recette, $type_repas, $temps_cuisson_recette);

        if($requete->execute()) {
            $message = "Recette ajoutée";
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

    public static function editer($id_recette, $nom_recette, $type_repas, $temps_cuisson_recette) {
        $message = '';
    
        $mysqli = Db::connecterDB_2();
        
        if ($requete = $mysqli->prepare("UPDATE recette SET nom_recette=?, id_type=?, temps_cuisson_recette=? WHERE id_recette=?")) {          
    
        $requete->bind_param("sisi", $nom_recette, $type_repas, $temps_cuisson_recette, $id_recette);
    
        if($requete->execute()) {
            $message = "Recette modifiée";
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;
        }
    
        $requete->close();
    
        } else  {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";*/
            exit();
        }
    
        return $message;
    }
    

    public static function supprimer($id_recette) {
        $message = '';

        $mysqli = Db::connecterDB_2();
        
        if ($requete = $mysqli->prepare("DELETE FROM recette WHERE id_recette=?")) {      

        $requete->bind_param("i", $id_recette);

        if($requete->execute()) {
            $message = "Recette supprimée";
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;
        }

        $requete->close();

        } else  {
            /*echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";*/
            exit();
        }
        return $message;
    }
    
    }

    class modele_typesRepas{


        public $id_type;
        public $type_repas;
        
        public function __construct($id_type, $type_repas) {
            $this->id_type = $id_type;        
            $this->type_repas = $type_repas;
        }

        public static function getAllTypeRepas() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
    
            $resultatRequete = $mysqli->query("SELECT * FROM type ORDER BY id_type, type_repas;");
    
            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_typesRepas($enregistrement['id_type'], $enregistrement['type_repas']);
            }
    
            return $liste;
        }
    }




?>
