<?php


class Database {
    public static function getMysqli() {
        $servername = "localhost";
        $username = "";
        $password = "";
        $database = "kiz-azul";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Error: " . mysqli_connect_error());
        }

        return $conn; // Renvoie l'objet mysqli
    }
}




?>