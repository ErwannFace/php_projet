<?php

class User{
	
	private $ID;
	private $pseudo;
	private $password;
	private $email;
	private $role;
	private $droits;
	
	public function __construct() {}
	
	// renvoi des attributs de l’objet
	public function getID() { return $this->ID; }
	public function getPseudo() { return $this->pseudo; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getRank() { return $this->role; }
	public function getRights() { return $this->droits; }
	
	// modification de l’ID
	public function setID($ID) {
		if ( !is_numeric($ID) ) {
			echo "Le format de l’ID est incorrect.\n";
			return false;
		} else {
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE ID = '$ID'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "ID invalide : déjà utilisé.\n";
				return false;
			} else {
				$this->ID = $ID;
				return true;
			}
		}
	}
	
	// modification du pseudo
	public function setPseudo($pseudo) {
		if (
			// vérification de la syntaxe du pseudo
			!preg_match( "/^[a-z0-9]+$/i", $pseudo ) ||
			strlen($pseudo) > 30
		) {
			echo "Pseudo invalide : erreur de syntaxe.\n";
		} else {
			// vérification que le pseudo n’existe pas déjà dans la table 'utilisateurs'
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Pseudo invalide : déjà utilisé.\n";
			} else {
				// assigne le pseudo à l’utilisateur s’il est valide
				if ( isset($this->pseudo) ) {
					echo "Le pseudo de l’utilisateur $this->pseudo a été modifié pour \"$pseudo\".\n";
				}
				$this->pseudo = $pseudo;
				return true;
			}
		}
		// affiche un message d’erreur si le pseudo est invalide
		if ( isset($this->pseudo) ) {
			echo "Le pseudo de l’utilisateur $this->pseudo n’a pas été modifié.\n";
		}
		return false;
	}
	
	// modification de l’e-mail
	public function setEmail($email) {
		if (
			// vérification de la syntaxe de l’e-mail
			!preg_match( "/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]+$/i", $email ) ||
			strlen($email) > 30
		) {
			echo "Addresse e-mail invalide : erreur de syntaxe.\n";
		} else {
			// vérification que l’e-mail n’existe pas déjà dans la table 'utilisateurs'
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Addresse e-mail invalide : déjà utilisée.\n";
			} else {
				// assigne l’e-mail au nouvel utilisateur s’il est valide
				if ( isset($this->email) ) {
					echo "L’addresse e-mail de l’utilisateur $this->pseudo a été modifiée pour $email\n";
				}
				$this->email = $email;
				return true;
			}
		}
		// affiche un message d’erreur si l’e-mail est invalide
		if ( isset($this->email) ) {
			echo "L’addresse e-mail de l’utilisateur $this->pseudo n’a pas été modifiée.\n";
		}
		return false;
	}
	
	// modification du rôle
	public function setRank($role) {
		// récupération de l’ID du rôle dans la table 'roles'
		$db = DBSingleton::getInstance();
		$sql = "SELECT * FROM roles WHERE nom = '$role'";
		$requete = $db->query($sql);
		$reponse = $requete->fetch();
		if ( count($reponse) == 0 ) {
			echo "Le rôle \"$role\" est inconnu.\n";
			return false;
		} else {
			// définition du rôle et des droits par défaut
			$this->role = $reponse['id'];
			$this->droits = 7;
			return true;
		}
	}
	
	// génération d’un mot de passe aléatoire
	public function generatePassword() {
		$string = array_merge( range('a','z'), range('A','Z'), range('0','9') );
		shuffle ($string);
		$this->password = substr(implode($string), 0, 9);
	}
	
	// modification d’un droit
	public function setRight($action, $droit) {
		if ( $action != 'add' && $action != 'remove' ) {
			echo "Action \"$action\" invalide.\n";
			return false;
		}
		$const = "Rights::".$droit;
		// vérification que le droit est valide
		if ( !defined($const) ) {
			echo "Le droit $droit est inconnu.\n";
			return false;
		}
		// vérification que la modification est valide
		if (
			$action == 'add' && (
				$droit == 'READ' && $this->droits == Rights::WRITE ||
				$droit == 'READ' && $this->droits == Rights::DELETE ||
				$droit == 'READ' && $this->droits == Rights::WRITE + Rights::DELETE ||
				$droit == 'WRITE' && $this->droits == Rights::READ ||
				$droit == 'WRITE' && $this->droits == Rights::DELETE ||
				$droit == 'WRITE' && $this->droits == Rights::READ + Rights::DELETE ||
				$droit == 'DELETE' && $this->droits == Rights::READ ||
				$droit == 'DELETE' && $this->droits == Rights::WRITE ||
				$droit == 'DELETE' && $this->droits == Rights::READ + Rights::WRITE
			) ||
			$action == 'remove' && (
				$droit == 'READ' && $this->droits == Rights::READ ||
				$droit == 'READ' && $this->droits == Rights::READ + Rights::WRITE ||
				$droit == 'READ' && $this->droits == Rights::READ + Rights::DELETE ||
				$droit == 'READ' && $this->droits == Rights::READ + Rights::WRITE + Rights::DELETE ||
				$droit == 'WRITE' && $this->droits == Rights::WRITE ||
				$droit == 'WRITE' && $this->droits == Rights::WRITE + Rights::READ ||
				$droit == 'WRITE' && $this->droits == Rights::WRITE + Rights::DELETE ||
				$droit == 'WRITE' && $this->droits == Rights::WRITE + Rights::READ + Rights::DELETE ||
				$droit == 'DELETE' && $this->droits == Rights::DELETE ||
				$droit == 'DELETE' && $this->droits == Rights::DELETE + Rights::READ ||
				$droit == 'DELETE' && $this->droits == Rights::DELETE + Rights::WRITE ||
				$droit == 'DELETE' && $this->droits == Rights::DELETE + Rights::READ + Rights::WRITE
			)
		) {
			// modification des droits
			$this->droits = ($action == 'add')?
				$this->droits += eval("return $const;"):
				$this->droits -= eval("return $const;");
			echo "Les droits de l’utilisateur $this->pseudo ont été modifiés.\n";
			return true;
		} else {
			// conservation des droits
			echo "Les droits de l’utilisateur $this->pseudo n’ont pas été modifiés.\n";
			return false;
		}
	}
	
	// retourne un utilisateur depuis son pseudo ou son e-mail
	public static function select($string) {
		if ( preg_match('/@/', $string) ) {
			$sql = "SELECT * FROM utilisateurs WHERE email = '$string'";
		} else {
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$string'";
		}
		$db = DBSingleton::getInstance();
		$reponse = $db->query($sql);
		$reponse->setFetchMode(PDO::FETCH_CLASS, 'User');
		$user = $reponse->fetch();
		if ($user) {
			return $user;
		} else {
			echo "L’utilisateur identifié par \"$string\" est introuvable.\n";
		}
	}
	
	// création de l’entrée dans la table utilisateurs
	public function create() {
		$success = false;
		if (
			// vérification que pseudo, e-mail, mot de passe, rôle et droits sont définis
			null !== $this->pseudo &&
			null !== $this->email &&
			null !== $this->password &&
			null !== $this->role &&
			null !== $this->droits
		) {
			$db = DBSingleton::getInstance();
			// insertion de l’utilisateur dans la table utilisateurs
			$sql = "INSERT INTO utilisateurs (pseudo, password, email, role, droits) VALUES ('$this->pseudo', '$this->password', '$this->email', '$this->role', '$this->droits');";
			$db->query($sql);
			// vérification que l’insertion a été effectuée avec succès
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$this->pseudo'";
			$reponse = $db->query($sql);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'User');
			$user = $reponse->fetch();
			if ($user) {
				$this->ID = $db->getLastID();
				$success = true;
			}
		}
		if ( $success == true ) {
			echo "Le compte de l’utilisateur $this->pseudo a été créé avec succès.\n";
		} else {
			echo "Échec de la création du compte.\n";
		}
	}
	
	// modification de l’entrée dans la table utilisateurs
	public function update() {
		$db = DBSingleton::getInstance();
		$sql = "UPDATE utilisateurs SET pseudo = '$this->pseudo', password = '$this->password', email = '$this->email', role = '$this->role', droits = '$this->droits' WHERE ID = $this->ID;";
		$db->query($sql);
	}
	
	// suppression d’une entrée de la base utilisateurs
	public function delete() {
		// vérification qu’un utilisateur existe avec l’ID de l’objet courant
		$db = DBSingleton::getInstance();
		$sql = "SELECT * FROM utilisateurs WHERE ID = '$this->ID'";
		$reponse = $db->query($sql);
		$user = $reponse->fetch();
		if ($user) {
			$sql = "DELETE FROM utilisateurs WHERE ID = '$this->ID'";
			$db->query($sql);
			$pseudo = $user['pseudo'];
			echo "L’utilisateur $pseudo a été supprimé.\n";
		} else {
			echo "L’utilisateur $pseudo est introuvable.\n";
		}
	}
	
	// envoie un e-mail au nouvel utilisateur
	public function sendEmail() {
		if ( null !== $this->ID ) {
			$message = 'Votre nouveau compte sur notre application a été créé.';
			$message .= "\n\n";
			$message .= 'Votre pseudo est : ';
			$message .= $this->pseudo;
			$message .= "\n";
			$message .= 'et votre mot de passe est : ';
			$message .= $this->password;
			mail( $this->email, 'Votre nouveau compte', $message );
			echo "Un e-mail a été envoyé à l’addresse $this->email\n";
		} else {
			echo "L’e-mail n’a pas été envoyé.\n";
		}
	}
	
	public static function Connection($arg1, $arg2){
		$connection_valide = false;
		$identifiants_list = "SELECT * FROM utilisateurs";
		// tout users
		$id = "SELECT * FROM utilisateurs WHERE 'pseudo' = '$arg1'";
		// user = pseudo
		print_r($id);
	}
}

?>
