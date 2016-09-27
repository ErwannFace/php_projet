<?php

class User{

	private $ID;
	private $pseudo;
	private $password;
	private $email;
	private $role;	
	private $droits;
	
	public function __construct() {}

	// renvoi de l’ID
	public function getID() {
		return $this->ID;
	}

	// renvoi du pseudo
	public function getPseudo() {
		return $this->pseudo;
	}

	// renvoi du mot de passe
	public function getPassword() {
		return $this->password;
	}

	// renvoi de l’e-mail
	public function getEmail() {
		return $this->email;
	}

	// renvoi du rôle
	public function getRank() {
		return $this->role;
	}
	// renvoi des droits
	public function getRights() {
		return $this->droits;
	}

	// modification de l’ID
	public function setID($ID) {
		if (is_numeric($ID)) {
			$this->ID = $ID;
		} else {
			echo "format de l’ID incorrect";
		}
	}

	// modification du pseudo
	public function setPseudo($pseudo) {
		$db = DBSingleton::getInstance();
		$pseudo_valide = true;
		if (
			// vérification que le pseudo est composé uniquement de caractères alpha-numériques
			!preg_match( "/^[a-z0-9]+$/i", $pseudo ) ||
			// vérification que le pseudo ne fait pas plus de 30 caractères
			strlen($pseudo) > 30
		) {
			echo "Pseudo invalide : erreur de syntaxe.\n";
			$pseudo_valide = false;
		} else {
			// vérification que le pseudo n’existe pas déjà dans la table 'utilisateurs'
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Pseudo invalide : déjà utilisé.\n";
				$pseudo_valide = false;
			}
		}
		if ($pseudo_valide) {
			// assigne le pseudo à l’utilisateur s’il est valide
			if ( isset($this->pseudo) ) {
				echo "Le pseudo de l’utilisateur $this->pseudo";
				$this->pseudo = $pseudo;
				echo " a été modifié pour \"$this->pseudo\".\n";
			} else {
				$this->pseudo = $pseudo;
			}
		} else {
			// affiche un message d’erreur si le pseudo est invalide
			if ( isset($this->pseudo) ) {
				echo "Le pseudo de l’utilisateur $this->pseudo n’a pas été modifié.\n";
			}
		}
	}

	// modification de l’e-mail
	public function setEmail($email) {
		$db = DBSingleton::getInstance();
		$email_valide = true;
		if (
			// vérification que l’e-mail a un format correct
			!preg_match( "/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]+$/i", $email ) ||
			// vérification que l’e-mail ne fait pas plus de 30 caractères
			strlen($email) > 30
		) {
			echo "Addresse e-mail invalide : erreur de syntaxe.\n";
			$email_valide = false;
		} else {
			// vérification que l’e-mail n’existe pas déjà dans la table 'utilisateurs'
			$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
			$requete = $db->query($sql);
			$reponse = $requete->fetchAll();
			if (count($reponse) > 0) {
				echo "Addresse e-mail invalide : déjà utilisée.\n";
				$email_valide = false;
			}
		}
		if ($email_valide) {
			// assigne l’e-mail au nouvel utilisateur s’il est valide
			if ( isset($this->email) ) {
				$this->email = $email;
				echo "L’addresse e-mail de l’utilisateur $this->pseudo a été modifiée pour $this->email\n";
			} else {
				$this->email = $email;
			}
		} else {
			// affiche un message d’erreur si l’e-mail est invalide
			if ( isset($this->email) ) {
				echo "L’addresse e-mail de l’utilisateur $this->pseudo n’a pas été modifiée.\n";
			}
		}
	}

	// modification du rôle
	public function setRank($role) {
		$db = DBSingleton::getInstance();
		// récupération de l’ID du rôle dans la table 'roles'
		$sql = "SELECT * FROM roles WHERE nom = '$role'";
		$requete = $db->query($sql);
		$reponse = $requete->fetch();
		// définition du rôle
		$this->role = $reponse['id'];
		$this->droits = 7;
	}

	// génération d’un mot de passe aléatoire
	public function generatePassword() {
		$string = array_merge( range('a','z'), range('A','Z'), range('0','9') );
		shuffle ($string);
		$this->password = substr(implode($string), 0, 9);
	}

	public function isPseudoValid($arg1){
		$pseudo_valide = true;
    if (
		  isset($arg1) &&
		  preg_match("/^[a-z0-9]+$/i", $arg1) &&
		  strlen($arg1) <= 30 
    ) 
    {
			foreach ($this->user_list as $user) {
				if ($user['pseudo'] == $arg1){
					$pseudo_valide = false;
					break;
				}
	    }
    } else {
			$pseudo_valide = false;            
    }
    if	($pseudo_valide == false) {
			echo "pseudo ou et mot de passe invalides";
    }
    return $pseudo_valide;
   }

	// suppression d’un droit
	public function removeRight($droit) {
		$const = eval('return (defined("Rights::'.$droit.'"))?Rights::'.$droit.':null;');
		// vérification que le droit est valide
		if ( $const == null ) {
			echo "Le droit $droit est inconnu.\n";
			return false;
		}
		// vérification que la modification est valide
		$validity = false;
		if (
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
		) { $validity = true; }
		if ( $validity == true ) {
			// modification des droits
			$this->droits -= $const;
			echo "Les droits de l’utilisateur $this->pseudo ont été modifiés.\n";
			return true;
		} else {
			// conservation des droits
			echo "Les droits de l’utilisateur $this->pseudo n’ont pas été modifiés.\n";
			return false;
		}
	}

	// ajout d’un droit
	public function addRight($droit) {
		$const = eval('return (defined("Rights::'.$droit.'"))?Rights::'.$droit.':null;');
		// vérification que le droit est valide
		if ( $const == null ) {
			echo "Le droit $droit est inconnu.\n";
			return false;
		}
		// vérification que la modification est valide
		$validity = false;
		if (
			$droit == 'READ' && $this->droits == Rights::WRITE ||
			$droit == 'READ' && $this->droits == Rights::DELETE ||
			$droit == 'READ' && $this->droits == Rights::WRITE + Rights::DELETE ||
			$droit == 'WRITE' && $this->droits == Rights::READ ||
			$droit == 'WRITE' && $this->droits == Rights::DELETE ||
			$droit == 'WRITE' && $this->droits == Rights::READ + Rights::DELETE ||
			$droit == 'DELETE' && $this->droits == Rights::READ ||
			$droit == 'DELETE' && $this->droits == Rights::WRITE ||
			$droit == 'DELETE' && $this->droits == Rights::READ + Rights::WRITE
		) { $validity = true; }
		if ( $validity == true ) {
			// modification des droits
			$this->droits += $const;
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
		$db = DBSingleton::getInstance();
		
		if ( preg_match('/@/', $string) ) {
			$sql = "SELECT * FROM utilisateurs WHERE email = '$string'";
		} else {
			$sql = "SELECT * FROM utilisateurs WHERE pseudo = '$string'";
		}
		
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
		$db = DBSingleton::getInstance();
		
		// vérification qu’un utilisateur existe avec l’ID de l’objet courant
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
