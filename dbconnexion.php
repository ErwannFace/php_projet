
<?php

class DbConnexion{
	
	public function __construct(){
		try

{
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



    }
    public function query($requete) {  //


    }
}
/* class DBSingleton
{
  private $inst = NULL;
  private $connection = FALSE; //connection to be opened

  //DB connection values
  private $server = NULL; private $usr = NULL; private $psw = NULL; private $name = NULL;

  public static function getInstance($db_server, $db_usr, $db_psw, $db_name)
  {
     //simply stores connections values, without opening connection

     if($inst === NULL)
        $this->inst = new DBSingleton();
     return $this->inst;
  }
  private __construct()...

  public function query($query_string)
  {
     //performs query over already opened connection, if connection is not open, it opens connection 1st
  }

  ...
}
*/
?>