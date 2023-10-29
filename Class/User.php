<?php

require_once './class/Model.php';

class User extends Model {

    protected $table = "USERS";



    // public function 
    function inscrireUtilisateur($sex,$nom,$prenom,$email,$mot_de_passe) {
        // $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    
        
		$sex = mysqli_real_escape_string($this->mysqli, $sex);
        $nom = mysqli_real_escape_string($this->mysqli, $nom);
        $prenom = mysqli_real_escape_string($this->mysqli, $prenom);
        $email = mysqli_real_escape_string($this->mysqli, $email);
        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);


        $sql = "INSERT INTO USERS (SEX, NOM, PRENOM, EMAIL, MDP, registration_date) values ('$sex', '$nom','$prenom','$email','$mot_de_passe',CURRENT_TIMESTAMP)";

        $req= mysqli_query($this->mysqli, $sql) or die('Erreur 500-A23, Merci de contacter l\'administrateur.');
    }


    public function estDejaInscrit($email)
    {
        $email = $this->mysqli->real_escape_string($email);
        $query = "SELECT * FROM `users` WHERE `EMAIL` = '$email'";
        $result = $this->mysqli->query($query);

        return $result->num_rows > 0;
    }



}