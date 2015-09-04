<?php

class CategoryManager
{
	private $link;

	public function __construct($link){
		$this->link = $link;
	}
	public function create($name, $description){
		$category = new Category($this->link);
		$category->setName($name);
		$category->setDescription($description);
		$name = mysqli_real_escape_string($this->link, $category->getName());
		$description = mysqli_real_escape_string($this->link, $category->getDescription());
		$request = "INSERT INTO category (name, description) VALUES ('".$name."', '".$description."');";
		$res = mysqli_query($this->link, $request);
		if($res){
			return $this->select(mysqli_insert_id($this->link));
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}
	public function delete($id){
		$request = "DELETE FROM category WHERE id='".intval($id)."';";
		mysqli_query($this->link, $request);
	}
	public function update($category){
		$name = mysqli_real_escape_string($this->link, $category->getName());
		$description = mysqli_real_escape_string($this->link, $category->getDescription());
		$request = "UPDATE category SET name = '".$name."', description = '".$description."' WHERE id='".$category->getId()."';";
		mysqli_query($this->link, $request);
	}
	public function select($id){
		$request = "SELECT * FROM category WHERE id='".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		if($res){
			$category = mysqli_fetch_object($res, 'Category', array($this->link));
			return $category;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}





	public function selectByName($category_name){
		$request = "SELECT * FROM category WHERE name='".$category_name."'";
		$res = mysqli_query($this->link, $request);
		if($res){
			$category = mysqli_fetch_object($res, 'Category', array($this->link));
			return $category;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}

	public function selectAll(){
		$request = "SELECT * FROM category";
		$res = mysqli_query($this->link, $request);
		if($res){
			$resultat = array();
			while ($category = mysqli_fetch_object($res, 'Category', array($this->link)))
			{
				$resultat[] = $category;
			}
			return $resultat;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}
}
?>