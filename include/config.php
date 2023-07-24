<?php
class Db {
    public static $username = "root";
    public static $password = "mysql";
    public static $host = "localhost";
    public static $database1 = "antho605_TP2-Infra-Web"; // CHALETS
    public static $database2 = "antho605_TP1-Infra-Web"; // RECETTES

    public static function connecterDB_1() {
        $mysqli = new mysqli(self::$host, self::$username, self::$password, self::$database1);
        mysqli_set_charset($mysqli, "utf8");

        if ($mysqli->connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
            exit();
        }
        console_log("Connection à la base de données des Chalets réussie");
        return $mysqli;
    }

    public static function connecterDB_2() {
        $mysqli = new mysqli(self::$host, self::$username, self::$password, self::$database2);
        mysqli_set_charset($mysqli, "utf8");

        if ($mysqli->connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
            exit();
        }
        console_log("Connection à la base de données des Recettes réussie");
        return $mysqli;
    }
}

function console_log($message) {
    echo '<script>';
    echo 'console.log(' . json_encode($message) . ')';
    echo '</script>';
}
?>
