<?php

class Bloc{

	private $id;
	private $date;
	private $titre;
	private $type;

	public function __construct($date, $titre, $type){
		$this->date = $date;
		$this->titre = $titre;
		$this->type = $type;
    }
    
}

?>