<?php

class User{
	
	private $role;
	
	public function __construct() {}
    
	public function setRole($role) {
		$this->role = $role;
	}
	
	public static function getUsersList($db) {
		$requete = $db->query('SELECT * FROM utilisateurs');
		return $requete->fetchAll();
	}
}

?>