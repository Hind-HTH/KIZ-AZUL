<?php

require_once './Data/Database.php';
require_once './Class/fonctions.php';



$fct = new fonctions();

class Model {


    protected $table;
	protected $mysqli;


	public function __construct(){
		$this->mysqli = Database::getMysqli();
	}
    
	// public function findOneById($id){
	// 	$id = intval($id);
	// 	$sql = "SELECT * FROM `$this->table` WHERE `ID` = $id";
	// 	$req = mysqli_query($this->mysqli, $sql);
	// 	return mysqli_fetch_assoc($req);
	// }
}