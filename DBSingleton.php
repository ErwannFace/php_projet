<?php
class DBSingleton
{
  private static $instance = NULL;
  private static $connection = FALSE; //connection to be opened

  //DB connection values
  private $server = NULL; private $usr = NULL; private $psw = NULL; private $name = NULL;

  public static function getInstance()
  {
     //simply stores connections values, without opening connection

     if( is_null(self::$instance) ) {
        self::$instance = new DBSingleton();
     }

     return self::$instance;
  }
  private function __construct(){

    $db_server = 'localhost';
    $db_usr = 'TeamNabil'; 
    $db_psw = 'facesimplon'; 
    $db_name = 'php_projet';
  
    try {
      self::$connection = new PDO(

          'mysql:host='.$db_server.';dbname='.$db_name,
          $db_usr,
          $db_psw
        );
    }
    catch (PDOException $exception) {
      die($exception->getMessage());
    }
  }




  public function query($query_string)
  {
		//performs query over already opened connection, if connection is not open, it opens connection 1st
		$db = $this::getInstance();
		$requete=$db::$connection->prepare($query_string);
		$requete->execute();
		return $requete;
  }
  
  public function getLastID() {
  	$db = $this::getInstance();
  	return $db::$connection->lastInsertId();
  }

}