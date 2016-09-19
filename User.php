
<?php

class User{

	var $role;

	public function __construct(){

    }
    
	public function setRole($role){

		$this->role = $role;
	}

	public function getUsersList($db){

	$requete=$db->query('SELECT * FROM utilisateurs');
	return $requete->fetchAll();

	
	}
}

?>