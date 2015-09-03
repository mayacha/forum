<?php

class Post
{

	// Propriétés de la class Post
	private $id;
	private $title;
	private $content;
	private $id_topic;
	private $id_user;
	private $reported;
	private $deleted;

	// Constructeur
	public function __construct($link)
	{
		$this->link=$link;
	}
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

	public function getReported()
	{
		return $this->reported;
	}

	public function getDeleted()
	{
		return $this->deleted;
	}

	// SETTER

	public function setTitle($title)
	{
		$this->title=$title;
	}

	public function setContent($content)
	{
		if (strlen($content) > 0)
			$this->content=$content;
		else
			throw new Exception("Il faut remplir le message.");
	}

	public function setId_topic($id_topic)
	{
		$this->id_topic=$id_topic;
	}

	public function setId_user($id_user)
	{
		$this->id_user=$id_user;
	}

	public function setReported($reported)
	{
		$this->reported=$reported;
	}

	public function setDeleted($deleted)
	{
		$this->deleted=$deleted;
	}


	// OTHER

	public function getAuthor()
	{
		$manager = new UserManager($this->link);
		$author = $manager->selectById($this->id_user);
		return $author;
	}
	public function getTopic()
	{
		$manager = new Category($this->link);
		$topic = $manager->select($this->id_topic);
		return $topic;
	}
}

?>