<?php
class UserManager
{
	private $link;

	public function __construct($link){
		$this->link = $link;
	}
	public function create($name){
		$name = mysqli_real_escape_string($this->link, $name)
		$request = "INSERT INTO category (name) VALUES ('".$name."');";
		mysqli_query($this->link, $request);
		return $this->select(mysqli_insert_id($this->link));
	}
	public function delete($id){
		$request = "DELETE FROM category WHERE id='".intval($id)."';";
		mysqli_query($this->link, $request);
	}
	public function update($object){
			$request = "UPDATE category SET name = '".$object->getName()."';";
	}
	public function select($id){
		$request = "SELECT * FROM category WHERE id='".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		$object = mysqli_fetch_object($res, 'Object', array($this->link));
		return $object;
	}
	public function selectAll(){
		$request = "SELECT * FROM category";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($category = mysqli_fetch_object($res, 'Category', array($this->link)))
		{
			$resultat[] = $category;
		}
		return $resultat;
	}
}
?>