<?php

class dbConnection {
	var $dbServer = "localhost";
	var $dbName = "";
	var $dbUser = "";
	var $dbPwd = "";
	
	function __construct() {
	}
	
	function connect() {
		try {
			$this->link = new PDO(
				'mysql:host='.$this->dbServer.';dbname='.$this->dbName,
				$this->dbUser,
				$this->dbPwd
			);
		}
		catch (PDOException $exception) {
			exit($exception->getMessage());
		}
	}
	
}

?>
