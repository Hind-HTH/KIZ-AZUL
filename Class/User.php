<?php

require_once './class/Model.php';

class User extends Model
{

    protected $table = "USERS";

    public function inscrireUtilisateur($sex, $nom, $prenom, $email, $mot_de_passe)
    {
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
    
        // Récupération de l'ID utilisateur nouvellement inséré
        $userId = $this->pdo->lastInsertId();
    
        // Requête pour insérer des données dans la table profile
        $sql_profile = "INSERT INTO profile (id_user) VALUES (?)";
        $stmt_profile = $this->pdo->prepare($sql_profile);
        $stmt_profile->execute([$userId]);
    }
    


    public function estDejaInscrit($email)
    {
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


    public function verifierConnexion($email, $mot_de_passe)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mot_de_passe, $user['MDP'])) {
            return true; // Connexion réussie
        } else {
            return false; // Identifiants incorrects
        }
    }

    public function displayname($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function updateProfile($userId, $nom, $prenom, $tel, $adresse, $ville, $codePostale) {
        $sql = "UPDATE profile 
        SET NOM = :nom, 
            PRENOM = :prenom, 
            TEL = :tel, 
            ADRESSE = :adresse, 
            VILLE = :ville, 
            CODE_POSTALE = :codePostale 
        WHERE id_user = :id_user";
    
    
        $stmt = $this->pdo->prepare($sql);
    
        $stmt->bindParam(':id_user', $userId);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':codePostale', $codePostale);
    
      
        $stmt->execute();
    
        $sql_update_user = "UPDATE USERS SET NOM = :nom, PRENOM = :prenom WHERE ID = :id_user";
        $stmt_update_user = $this->pdo->prepare($sql_update_user);
        $stmt_update_user->bindParam(':id_user', $userId);
        $stmt_update_user->bindParam(':nom', $nom);
        $stmt_update_user->bindParam(':prenom', $prenom);
        $stmt_update_user->execute();
    }
    
}
