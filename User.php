
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
}

?>