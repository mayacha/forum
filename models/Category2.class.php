<?php
class Category{
	// propriétés
	private $id;
	private $name;

	// getter
	public function getId(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}

	// setter
	public function setName($name){
		if (strlen($name) > 0){
			$this->name = $name;
		}else{
			throw new Exception("Il faut renseigner le nom de la catégorie.");
		}
	}


}
?>