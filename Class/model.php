<?php

require_once './Data/Database.php';
require_once './Class/fonctions.php';



$fct = new fonctions();

class Model {

    protected $table;
    protected $pdo;

    public function __construct(){
        $this->pdo = Database::getPdo();
    }
    
}
