<?php



class Topic{

private $id;
private $name;
private $id_category;
private $id_user;

private $link;

// Constructeur

public function __construct($link)
{
	$this->link=$link;
}


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

	public function getIdUser()
	{
		return $this->id_user;
	}

//SETTER
	public function setName($name)
	{
		if(strlen($name)>4 && strlen($name)<33)
			$this->name=$name;
		else 
			throw new Exception("Le nom du titre Topic doit être comprise entre 5 et 32 caractères");
	}
	
	public function setIdCategory($id_category)
	{
		$this->id_category=$id_category;
	}

	public function setIdUser($id_user)
	{
		$this->id_user=$id_user;
	}


		//other

	public function create($title, $content)
	{
			$id_topic=$this->id;
			$post= new Post ($this->link);
			$post->setTitle($title);
			$post->setContent($content);
			$post->setId_topic($id_topic);
			$post->setId_user($_SESSION['id_user']);
			$title=mysqli_real_escape_string($this->link, $post->getTitle());
			$content=mysqli_real_escape_string($this->link, $post->getContent());
			$userID=$post->getId_user();
			$request="INSERT INTO post (title, content, id_topic, id_user) VALUES ('".$title."', '".$content."', '".$id_topic."','".$userID."')";
			echo $request;
			$res = mysqli_query($this->link, $request);
			if($res) 
			{
				return $this->select(mysqli_insert_id($this->link));
			}
			else
			{
				throw new Exception ("Sujet vide !");
			}
	}

	public function update($post)
	{
		$title=mysqli_real_escape_string($this->link, $post->getTitle());
		$content=mysqli_real_escape_string($this->link, $post->getContent());
		$reported=mysqli_real_escape_string($this->link, $post->getReported());
		$deleted=mysqli_real_escape_string($this->link, $post->getDeleted());
		$request="UPDATE post SET title='".$title."', content='".$content."', reported=".$reported.", deleted=".$deleted." WHERE id = ".$post->getId();
		mysqli_query($this->link, $request);
	}

	public function select($id)
	{
		$request="SELECT * FROM post WHERE id_topic='".intval($id)."'";
		$res=mysqli_query($this->link, $request);
		if($res)
		{
			$post=mysqli_fetch_object($res, 'Post', array($this->link));
		return $post;
		}
		else 
		{
			throw new Exception('aucun post');
		}
	}

	public function getCategory()
	{
		$manager = new CategoryManager($this->link);
		$category = $manager->select($this->id_category);
		return $category;
	}

	public function getAuthor()
	{
		$manager = new UserManager($this->link);
		$author = $manager->selectById($this->id_user);
		return $author;
	}

	public function selectAll()
	{
		$request="SELECT * FROM post WHERE id_topic='".$this->id."'";
		$res=mysqli_query($this->link, $request);
		if($res)
		{

			$request="SELECT * FROM post WHERE id_topic='".$this->id."'";
			$res=mysqli_query($this->link, $request);
			if($res)
			{
				$listPost=array();
				while($post=mysqli_fetch_object($res, 'Post', array($this->link)))
				{
					$listPost[]=$post;
				}
				return $listPost;
			}
			else

				{
					throw new Exception('rien !');
				}
		}
	}
}
?>