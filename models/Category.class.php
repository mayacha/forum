<?php
class Category{
	// propriétés
	private $id;
	private $name;
	private $description;

	private $link;
 
	public function __construct($link)
	{
		$this->link = $link;
	}

	// getter
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getDescription(){
		return $this->description;
	}

	// setter
	public function setName($name){
		if (strlen($name) > 3){
			$this->name = $name;
		}else{
			throw new Exception("Le titre de la catégorie doit contenir au moins 4 caractères.");
		}
	}
	public function setDescription($description){
		if (strlen($description) > 9){
			$this->description = $description;
		}else{
			throw new Exception("La description de la catégorie doit contenir au moins 10 caractères.");
		}
	}

	public function select($id){
		$request = "SELECT * FROM topic WHERE id='".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		if($res){
			$topic = mysqli_fetch_object($res, 'Topic', array($this->link));
			return $topic;
		}else{
			throw new Exception("Internal server error");
		}
	}
}
?>