<?php

class Post
{

	// Propriétés de la class Post
	private $id;
	private $title;
	private $content;
	private $id_topic;
	private $id_user;


	// Méthodes de la class Post
	//GETTER

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getId_topic()
	{
		return $this->id_topic;
	}

	public function getId_user()
	{
		return $this->id_user;
	}

	// SETTER

	public function setTitle($title)
	{
			$this->title=$title;
	
	}

	public function setContent($content)
	{
		
		if (strlen($content > 0))
		
			$this->content=$content;

		else
			throw new Exception("texte vide");
	}

	public function setId_topic($id_topic)
	{
		$this->id_topic=$id_topic;
	}

	public function setId_user($id_user)
	{
		$this->id_user=$id_user;
	}

}

?>