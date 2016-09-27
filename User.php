<?php

class User{
	
	private $ID;
	private $pseudo;
	private $password;
	private $email;
	private $role;
	
	public function __construct() {}
	
	// renvoi des attributs de l’objet
	public function getID() { return $this->ID; }
	public function getPseudo() { return $this->pseudo; }
	public function getPassword() { return $this->password; }
	public function getEmail() { return $this->email; }
	public function getRank() { return $this->role; }
	
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
				echo "ID invalide : déjà utilisé.\n";
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
			echo "Pseudo invalide : erreur de syntaxe.\n";
		} else {
			// vérification que le pseudo n’existe pas déjà dans la table 'utilisateurs'
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Pseudo invalide : déjà utilisé.\n";
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
			echo "Addresse e-mail invalide : erreur de syntaxe.\n";
		} else {
			// vérification que l’e-mail n’existe pas déjà dans la table 'utilisateurs'
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Addresse e-mail invalide : déjà utilisée.\n";
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
			// définition du rôle
			$this->role = $reponse['id'];
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
	public static function setRight($role, $action, $droit) {
		if ( $action != 'add' && $action != 'remove' ) {
			echo "L’action \"$action\" est invalide.\n";
			return false;
		}
		// récupération de l’ID du rôle dans la table 'roles'
		$db = DBSingleton::getInstance();
		$sql = "SELECT * FROM roles WHERE nom = '$role'";
		$requete = $db->query($sql);
		$reponse = $requete->fetch();
		if ( $reponse === false ) {
			echo "Le rôle \"$role\" est inconnu.\n";
			return false;
		} else {
			$role_id = $reponse['id'];
			$role_droits = $reponse['droits'];
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
				$role_droits == 0 ||
				$droit == 'USERS' && $role_droits == Rights::BLOCS ||
				$droit == 'USERS' && $role_droits == Rights::THEME ||
				$droit == 'USERS' && $role_droits == Rights::BLOCS + Rights::THEME ||
				$droit == 'BLOCS' && $role_droits == Rights::USERS ||
				$droit == 'BLOCS' && $role_droits == Rights::THEME ||
				$droit == 'BLOCS' && $role_droits == Rights::USERS + Rights::THEME ||
				$droit == 'THEME' && $role_droits == Rights::USERS ||
				$droit == 'THEME' && $role_droits == Rights::BLOCS ||
				$droit == 'THEME' && $role_droits == Rights::USERS + Rights::BLOCS
			) ||
			$action == 'remove' && (
				$droit == 'USERS' && $role_droits == Rights::USERS ||
				$droit == 'USERS' && $role_droits == Rights::USERS + Rights::BLOCS ||
				$droit == 'USERS' && $role_droits == Rights::USERS + Rights::THEME ||
				$droit == 'USERS' && $role_droits == Rights::USERS + Rights::BLOCS + Rights::THEME ||
				$droit == 'BLOCS' && $role_droits == Rights::BLOCS ||
				$droit == 'BLOCS' && $role_droits == Rights::BLOCS + Rights::USERS ||
				$droit == 'BLOCS' && $role_droits == Rights::BLOCS + Rights::THEME ||
				$droit == 'BLOCS' && $role_droits == Rights::BLOCS + Rights::USERS + Rights::THEME ||
				$droit == 'THEME' && $role_droits == Rights::THEME ||
				$droit == 'THEME' && $role_droits == Rights::THEME + Rights::USERS ||
				$droit == 'THEME' && $role_droits == Rights::THEME + Rights::BLOCS ||
				$droit == 'THEME' && $role_droits == Rights::THEME + Rights::USERS + Rights::BLOCS
			)
		) {
			// modification des droits
			$role_droits = ($action == 'add')?
				$role_droits += eval("return $const;"):
				$role_droits -= eval("return $const;");
			$sql = "UPDATE roles SET droits = '$role_droits' WHERE ID = $role_id;";
			$db->query($sql);
			echo "Les droits du rôle $role ont été modifiés.\n";
			return true;
		} else {
			// conservation des droits
			echo "Les droits du rôle $role n’ont pas été modifiés.\n";
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
			return null;
		}
	}
	
	// vérification que l’utilisateur à l’origine de l’action est autorisé à modifier la table utilisateurs
	private static function checkPrivileges() {
		// vérification qu’un utilisateur connecté effectue l’action
		if ( !isset($_SESSION['user_role']) ) {
			echo "Vous devez être connecté pour ajouter un utilisateur.\n";
			return false;
		}
		$role_id = $_SESSION['user_role'];
		// vérification que l’utilisateur à l’origine de l’action a les droits nécessaires
		$db = DBSingleton::getInstance();
		$sql = "SELECT * FROM roles WHERE id = '$role_id'";
		$reponse = $db->query($sql);
		$role = $reponse->fetch();
		if (
			!is_numeric($role['droits']) ||
			$role['droits'] != Rights::USERS &&
			$role['droits'] != Rights::USERS + Rights::BLOCS &&
			$role['droits'] != Rights::USERS + Rights::THEME &&
			$role['droits'] != Rights::USERS + Rights::BLOCS + Rights::THEME
		) {
			echo "Vous n’avez pas les droits nécessaires pour ajouter un utilisateur.\n";
			return false;
		}
		return true;
	}
	
	// création de l’entrée dans la table utilisateurs
	public function create() {
		$success = false;
		if ( self::checkPrivileges() ) {
			if (
				// vérification que pseudo, e-mail, mot de passe et rôle sont définis
				null !== $this->pseudo &&
				null !== $this->email &&
				null !== $this->password &&
				null !== $this->role
			) {
				// insertion de l’utilisateur dans la table utilisateurs
				$db = DBSingleton::getInstance();
				$sql = "INSERT INTO utilisateurs (pseudo, password, email, role) VALUES ('$this->pseudo', '$this->password', '$this->email', '$this->role');";
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
		}
		if ( $success == true ) {
			echo "Le compte de l’utilisateur $this->pseudo a été créé.\n";
		} else {
			echo "Échec de la création du compte.\n";
		}
	}
	
	// modification de l’entrée dans la table utilisateurs
	public function update() {
		$success = false;
		if ( self::checkPrivileges() ) {
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE ID = $this->ID";
			$reponse = $db->query($sql);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'User');
			$user = $reponse->fetch();
			if (
				$this->pseudo != $user->getPseudo() ||
				$this->password != $user->getPassword() ||
				$this->email != $user->getEmail() ||
				$this->role != $user->getRank()
			) {
				$sql = "UPDATE utilisateurs SET pseudo = '$this->pseudo', password = '$this->password', email = '$this->email', role = '$this->role' WHERE ID = $this->ID;";
				$db->query($sql);
				$success = true;
			}
		}
		if ( $success == true ) {
			echo "Le compte de l’utilisateur $this->pseudo a été mis à jour.\n";
		} else {
			echo "Échec de la modification du compte.\n";
		}
	}
	
	// suppression d’une entrée de la base utilisateurs
	public function delete() {
		$success = false;
		if ( self::checkPrivileges() ) {
			// vérification qu’un utilisateur existe avec l’ID de l’objet courant
			$db = DBSingleton::getInstance();
			$sql = "SELECT * FROM utilisateurs WHERE ID = '$this->ID'";
			$reponse = $db->query($sql);
			$user = $reponse->fetch();
			if ($user) {
				$sql = "DELETE FROM utilisateurs WHERE ID = '$this->ID'";
				$db->query($sql);
				$success = true;
			}
		}
		if ( $success == true ) {
			echo "Le compte de l’utilisateur $this->pseudo a été supprimé.\n";
		} else {
			echo "Échec de la suppression du compte.\n";
		}
	}
	
	// envoie un e-mail au nouvel utilisateur
	public function sendEmail() {
		$success = false;
		if ( self::checkPrivileges() ) {
			if (
				null !== $this->ID ||
				null !== $this->pseudo ||
				null !== $this->password ||
				null !== $this->email
		 ) {
				$message = 'Votre nouveau compte sur notre application a été créé.';
				$message .= "\n\n";
				$message .= 'Votre pseudo est : ';
				$message .= $this->pseudo;
				$message .= "\n";
				$message .= 'et votre mot de passe est : ';
				$message .= $this->password;
				mail( $this->email, 'Votre nouveau compte', $message );
				$success = true;
			}
		}
		if ( $success == true ) {
			echo "Un e-mail a été envoyé à l’addresse $this->email\n";
		} else {
			echo "Échec de l’envoi de l’e-mail.\n";
		}
	}
	
	public static function Connection($pseudo_ou_email, $mdp){
		if ( isset($_SESSION['number_of_tries']) ) {
			$_SESSION['number_of_tries']++;
		} else {
			$_SESSION['number_of_tries'] = 1;
		}
		if ( $_SESSION['number_of_tries'] <= 3) {
			$user = self::select($pseudo_ou_email);
			if ( $user !== null && $user->getPassword() == $mdp ) {
				$_SESSION['number_of_tries'] = 0;
				$_SESSION['user_id'] = $user->getID();
				$_SESSION['user_role'] = $user->getRank();
			} else {
				echo "pseudo ou et mot de passe invalides";
				$_SESSION['number_of_tries']++;
			}
		} else {
			echo "TODO: plus de 3 essais de connexion effectués.\n";
		}
  }
}


?>
