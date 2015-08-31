<?php
class Topic{

private $id;
private $name;
private $id_category;
//GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getIdCategory()
	{
		return $this->id_category;
	}

//SETTER
	public function setName($name)
	{
		if(strlen($name)>4)
			$this->name=$name;
		else throw new Exception("Le nom du Topic est trop court");
	}
	public function setIdCategory($id_category)
	{
		$this->id_category=$id_category;
	}
}
?>