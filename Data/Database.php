<?php

class Database {
    public static function getPdo() {
        $servername = "localhost";
        $username = "";
        $password = "";
        $database = "kiz-azul";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            
            die("Error: " . $e->getMessage());
        }
    }
}

?>
