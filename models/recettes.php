<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require_once __DIR__ . '/../include/config.php';

    class modele_recettes {

        public $id_recette;
        public $nom_recette;
        public $type_repas;
        
        public function __construct($id_recette, $nom_recette, $type_repas, $id_type) {
            $this->id_recette = $id_recette;
            $this->nom_recette = $nom_recette;
            $this->type_repas = $type_repas;
            $this->id_type = $id_type;
        }
        

        public static function getAllDejeuners() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, r.id_type, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 2;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $dejeuners = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas'],
                    $enregistrement['id_type']
                );
                $liste[] = $dejeuners;
            }
            return $liste;
        }

        public static function getAllRepas() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, r.id_type, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 3;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $repas = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas'],
                    $enregistrement['id_type']
                );
                $liste[] = $repas;
            }
            return $liste;
        }

        public static function getAllDesserts() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
            $resultatRequete = $mysqli->query("
                SELECT r.id_recette, r.nom_recette, r.id_type, t.type_repas
                FROM recette r
                INNER JOIN type t ON r.id_type = t.id_type
                WHERE r.id_type = 7;
            ");
            foreach ($resultatRequete as $enregistrement) {
                $desserts = new modele_recettes(
                    $enregistrement['id_recette'], 
                    $enregistrement['nom_recette'],
                    $enregistrement['type_repas'],
                    $enregistrement['id_type']
                );
                $liste[] = $desserts;
            }
            return $liste;
        }

        public static function getAllRecettes() {
            $liste = [];
            $mysqli = Db::connecterDB_2();
    
            $resultatRequete = $mysqli->query("SELECT r.id_recette, r.nom_recette, r.id_type, t.type_repas
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type;");
            
            foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_recettes(
                $enregistrement['id_recette'],
                $enregistrement['nom_recette'],
                $enregistrement['type_repas'],
                $enregistrement['id_type']);
            }
    
            return $liste;
        }

        public static function getOneRecette($id_recette) {
            $mysqli = Db::connecterDB_2();
    
            if ($requete = $mysqli->prepare("SELECT r.id_recette, r.nom_recette, t.type_repas, r.id_type
            FROM recette r
            INNER JOIN type t ON r.id_type = t.id_type
            WHERE r.id_recette = ?
            ")) {  // Création d'une requête préparée 
                $requete->bind_param("i", $id_recette); // Envoi des paramètres à la requête
    
                $requete->execute(); // Exécution de la requête
    
                $result = $requete->get_result(); // Récupération de résultats de la requête¸
                if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                    $recette = new modele_recettes($enregistrement['id_recette'], $enregistrement['nom_recette'], $enregistrement['type_repas'], $enregistrement['id_type']);


                } else {
                    echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                    return null;
                }   
                
                $requete->close(); // Fermeture du traitement 
            } else {
                echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
                echo $mysqli->error;
                return null;
            }
    
            return $recette;
        }

        public static function ajouter($nom_recette, $type_repas) {
        $message = '';

        $mysqli = Db::connecterDB_2();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO recette(nom_recette, id_type) VALUES(?, ?)")) {      

        $requete->bind_param("si", $nom_recette, $type_repas);

        if($requete->execute()) { // Exécution de la requête
            $message = "Recette ajoutée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    public static function editer($id_recette, $nom_recette, $type_repas) {
        $message = '';

        $mysqli = Db::connecterDB_2();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE recette SET nom_recette=?, id_type=? WHERE id_recette=?")) {          

        $requete->bind_param("sii", $nom_recette, $type_repas, $id_recette );

        if($requete->execute()) { // Exécution de la requête
            $message = "Recette modifiée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    public static function supprimer($id_recette) {
        $message = '';

        $mysqli = Db::connecterDB_2();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM recette WHERE id_recette=?")) {      

        $requete->bind_param("i", $id_recette);

        if($requete->execute()) { // Exécution de la requête
            $message = "Recette supprimée";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
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
