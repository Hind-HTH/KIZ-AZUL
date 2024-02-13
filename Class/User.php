<?php

require_once './class/Model.php';

class User extends Model {

    protected $table = "USERS";

    public function inscrireUtilisateur($sex, $nom, $prenom, $email, $mot_de_passe) {
        $sql = "INSERT INTO USERS (SEX, NOM, PRENOM, EMAIL, MDP, registration_date) values (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

        // Préparation de la requête
        $stmt = $this->pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(1, $sex);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $prenom);
        $stmt->bindParam(4, $email);

        // Hashage du mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt->bindParam(5, $mot_de_passe_hash);

        // Exécution de la requête
        $stmt->execute();
    }

    public function estDejaInscrit($email) {
        $query = "SELECT * FROM `users` WHERE `EMAIL` = ?";
        
        // Préparation de la requête
        $stmt = $this->pdo->prepare($query);

        // Liaison des paramètres
        $stmt->bindParam(1, $email);

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false;
    }
}
?>
