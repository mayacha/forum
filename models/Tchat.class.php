<?php
class Tchat{
	// propriétés
	private $id;
	private $message;
	private $date;
	private $id_user;

	private $link;
 
	public function __construct($link){
		$this->link = $link;
	}

	/**
	*   Getter générique
	*
	*   @param String $attr : attribute name 
	*   @return mixed
	*/
	public function getAttr($attr){
		return $this->$attr;
	}
	
	/**
	*   Setter générique
	*
	*   @param String $attr : attribute name 
	*   @param mixed $val : attribute value
	*/	
	public function setAttr($attr, $val){
		$this->$attr = $val;	
	}

	/**
	*   Setter Name
	*
	*   @param String $name
	*/
	public function setMessage($message){
		if (strlen($message) > 0){
			$this->message = $message;
		}else{
			throw new Exception("Erreur : Le message est vide.");
		}
	}

	public function getAuthor(){
		$manager = new UserManager($this->link);
		$author = $manager->selectById($this->id_user);
		return $author;
	}
}
?>