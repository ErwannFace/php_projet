<?php

class User{

	private $ID;
	private $pseudo;
	private $password;
	private $email;
	private $role;

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

	// création de l’entrée dans la table utilisateurs
	public function create() {
		if (
			// vérification que pseudo, e-mail, mot de passe et rôle sont définis
			null !== $this->pseudo &&
			null !== $this->email &&
			null !== $this->password &&
			null !== $this->role
		) {
			$db = DBSingleton::getInstance();
			$sql = "INSERT INTO utilisateurs (pseudo, password, email, role) VALUES ('$this->pseudo', '$this->password', '$this->email', '$this->role');";
			$db->query($sql);
			$this->ID = $db->getLastID();
		} else {
			echo "échec de la création du compte";
		}
	}

	// modification de l’entrée dans la table utilisateurs
	public function update() {
		$db = DBSingleton::getInstance();
		$sql = "UPDATE utilisateurs SET pseudo = '$this->pseudo', password = '$this->password', email = '$this->email', role = '$this->role' WHERE ID = $this->ID;";
		$db->query($sql);
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
			echo "utilisateur introuvable";
		}
	}

	// suppression d’un utilisateur de l’entrée de la base utilisateurs depuis son id
	public static function delete($ID) {
		$db = DBSingleton::getInstance();

		// vérification qu’un utilisateur existe avec l’ID donné en argument
		$sql = "SELECT * FROM utilisateurs WHERE ID = '$ID'";
		$reponse = $db->query($sql);
		$user = $reponse->fetch();

		if ($user) {
			$sql = "DELETE FROM utilisateurs WHERE ID = '$ID'";
			$db->query($sql);
			$pseudo = $user['pseudo'];
			echo "l’utilisateur $pseudo a été supprimé";
		} else {
			echo "utilisateur introuvable";
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
		} else {
			echo "l’e-mail n’a pas été envoyé";
		}
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
		if ($pseudo_valide) {
			// assigne le pseudo au nouvel utilisateur s’il est valide …
			$this->pseudo = $pseudo;
		} else {
			// … ou affiche un message d’erreur si le pseudo est invalide
			echo "pseudo invalide";
		}
	}

	// modification de l’e-mail
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
		if ($email_valide) {
			// assigne l’e-mail au nouvel utilisateur s’il est valide …
			$this->email = $email;
		} else {
			// … ou affiche un message d’erreur si l’e-mail est invalide
			echo "e-mail invalide";
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
	}

	// génération d’un mot de passe aléatoire
	public function generatePassword() {
		$string = array_merge( range('a','z'), range('A','Z'), range('0','9') );
		shuffle ($string);
		$this->password = substr(implode($string), 0, 9);
	}
	public function isPseudoValid($arg1){
		$pseudo_valide = true;
        if(
            isset($arg1) &&
            preg_match("/^[a-z0-9]+$/i", $arg1) &&
            strlen($arg1)<=30
            )
        {
            foreach ($this->user_list as $user) {
                if ($user['pseudo'] == $arg1){
                    $pseudo_valide = false;
                    break;
                }
            }

        }else{
            $pseudo_valide = false;
        }
        if($pseudo_valide == false){
            echo "pseudo ou et mot de passe invalides";
        }
        return $pseudo_valide;
	}

	public static Connection($arg1, $arg2){
		$connection_valide = false;

		if (isset($arg1) && isset($arg2)) {
				$identifiants_list = "SELECT * FROM `utilisateurs'";
				// tout users
				$id = "SELECT * FROM utilisateurs WHERE 'pseudo' == $arg1";
				// user = pseudo
				print_r('$id');
		}
	}
}

?>
