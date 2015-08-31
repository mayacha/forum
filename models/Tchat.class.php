<?php
class Tchat{
private $id;
private $date;
private $id_user;
private $content;

//GETTER
	public function getId()
		{
			return $this->id;
		}
	public function getDate()
	{
		return $this->date;
	}
	public function getid_user()
	{
		return $this->id_user;
	}
	public function getContent()
	{
		return $this->content;
	}
//SETTER
	
	public function setid_user()
	{
		$this->id_user=$id_user;
	}
	
	public function setContent()
	{
		if($content !="")
		$this->content=$content;
		else
		throw new Exception("un message vide ne vaut pas mieux que pas de messages du tout...")
	}
}
?>