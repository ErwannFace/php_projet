<?php
class DBSingleton
{
  private $inst = NULL;
  private $connection = FALSE; //connection to be opened

  //DB connection values
  private $server = NULL; private $usr = NULL; private $psw = NULL; private $name = NULL;

  public static function getInstance()
  {
     //simply stores connections values, without opening connection

     if($inst === NULL)
        $this->inst = new DBSingleton();
     return $this->inst;
  }
  private __construct(){

    $db_server = 'localhost';
    $db_usr = 'TeamNabil'; 
    $db_psw = 'facesimplon'; 
    $db_name = 'php_projet';
  
    try {
      $this->connection = new PDO(

          'mysql:host='.$this->db_server.';dbname='.$this->db_name,
          $this->db_usr,
          $this->db_psw,
        );
    }
    catch (PDOException $exception) {
      die($exception->getMessage() );
    }
  }




  public function query($query_string)
  {
     //performs query over already opened connection, if connection is not open, it opens connection 1st
    $db = $this::getInstance();
    return $db->connection->query($query_string);

  }

  
}