<?php
class Category{
	// propriétés
	private $id;
	private $id_user;
	private $date;
	private $time;

	// getter
	public function getId(){
		return $this->id;
	}
	public function getIdUser(){
		return $this->id_user;
	}
	public function getDate(){
		return $this->date;
	}
	public function getTime(){
		return $this->time;
	}
	
	// setter
	public function setName($id_user){
		$this->id_user = $id_user;
	}
	public function setTime($time){
		$this->time = $time;
	}
}
?>