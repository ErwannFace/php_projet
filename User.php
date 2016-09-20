<?php

class User{
	
	private $id;
	private $pseudo;
	private $password;
	private $email;
	private $role;	
	
	public function __construct() {}
	
	public function create() {
		$db = DBSingleton::getInstance();
		$sql = "INSERT INTO utilisateurs (pseudo, password, email, role) VALUES ('$this->pseudo', '$this->password', '$this->email', '$this->role');";
		$answer = $db->query($sql);
		var_dump($answer);
	}
	
	public function update() {
		$db = DBSingleton::getInstance();
		$sql = "UPDATE utilisateurs SET pseudo = '$this->pseudo', password = '$this->password', email = '$this->email', role = '$this->role' WHERE ID = $this->id;";
		$db->query($sql);
	}
	
	public function setPseudo($pseudo) {
		$db = DBSingleton::getInstance();
		$pseudo_valide = true;
		// vérification que le pseudo …
		if (
			// … n’est pas vide
			isset($pseudo) &&
			// … est composé uniquement de caractères alpha-numériques
			preg_match( "/^[a-z0-9]+$/i", $pseudo ) &&
			// … ne fait pas plus de 30 caractères
			strlen($pseudo) <= 30
		) {
			// … n’existe pas déjà dans la table 'utilisateurs'
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				$pseudo_valide = false;
			}
		} else {
			$pseudo_valide = false;
		}
		($pseudo_valide) ?
			// assigne le pseudo au nouvel utilisateur s’il est valide …
			$this->pseudo = $pseudo :
			// … ou affiche un message d’erreur si le pseudo est invalide
			echo "pseudo invalide";
	}
	
	public function setEmail($email) {
		$db = DBSingleton::getInstance();
		$email_valide = true;
		// vérification que l’e-mail …
		if (
			// … n’est pas vide
			isset($email) &&
			// … a un format correct
			preg_match( "/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]+$/i", $email ) &&
			// … ne fait pas plus de 30 caractères
			strlen($email) <= 30
		) {
			// … n’existe pas déjà dans la table 'utilisateurs'
			$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				$email_valide = false;
			}
		} else {
			$email_valide = false;
		}
		($email_valide) ?
			// assigne l’e-mail au nouvel utilisateur s’il est valide …
			$this->email = $email :
			// … ou affiche un message d’erreur si l’e-mail est invalide
			echo "e-mail invalide";
	}
	
	public function setRole($role) {
		$db = DBSingleton::getInstance();
		// get rank ID from database
		$sql = "SELECT * FROM roles WHERE nom = '$role'";
		$requete = $db->query($sql);
		$reponse = $requete->fetch();
		// set user rank
		$this->role = $reponse['id'];
	}
	
	public function generatePassword() {
		$string = array_merge( range('a','z'), range('A','Z'), range('0','9') );
		shuffle ($string);
		$this->password = substr(implode($string), 0, 9);
	}
}

?>