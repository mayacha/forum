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
			throw new Exception("Erreur : Le titre de la catégorie doit contenir au moins 4 caractères.");
		}
	}
	public function setDescription($description){
		if (strlen($description) > 9){
			$this->description = $description;
		}else{
			throw new Exception("Erreur : La description de la catégorie doit contenir au moins 10 caractères.");
		}
	}
	public function select($id){
		$request = "SELECT * FROM topic WHERE id='".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		if($res){
			$topic = mysqli_fetch_object($res, 'Topic', array($this->link));
			return $topic;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}

	public function create($name)
	{
		$id_category=$this->id;
		$topic=new Topic($this->link);
		$topic->setIdCategory($id_category);
		$topic->setName($name);
		$topic->setIdUser($_SESSION['id']);
		$name=mysqli_real_escape_string($this->link, $topic->getName());
		$userID=$topic->getIdUser();
		$idCategory=$topic->getIdCategory();
		$request="INSERT INTO topic (name, id_category, id_user) VALUES ('".$name."', '".$idCategory."', '".$userID."')";
		mysqli_query($this->link, $request);
		if($res)
			{
				return $this->select(mysqli_insert_id($this->link));
			}
		else
			{
				throw new Exception ("Erreur : Votre requête n'a pas abouti.");
			}
		
	}

	public function delete($id)
	{
		$request="DELETE FROM topic WHERE id_category='".intval($id)."'";
		mysqli_query($this->link, $request);
	}

	public function update($topic)
	{
		$name=mysqli_real_escape_string($this->link, $topic->getName());
		$request="UPDATE topic SET name='".$name."'";
		mysqli_query($this->link, $request);
	}




	public function selectByName($name)
	{
		$request="SELECT * FROM topic WHERE name='".$name."'";
		$res=mysqli_query($this->link, $request);
		if($res)
		{
			$topic=mysqli_fetch_object($res, 'Topic', array($this->link));
			return $topic;
		}
		else
		{
			throw new Exception("Error Processing Request");
			
		}
	}


	public function selectAll()
		{
			$request="SELECT * FROM topic WHERE id_category='".$this->id."'";
			$res=mysqli_query($this->link, $request);
			if($res)
			{
				$listTopic=array();
				while($topic=mysqli_fetch_object($res, 'Topic', array($this->link)))
				{
					$listTopic[]=$topic;
				}
				return $listTopic;
			}
			else
			{
				throw new Exception("Erreur : Votre requête n'a pas abouti.");
			}
		}
	public function searchAllTopics()
	{
		$request="SELECT * FROM topic WHERE titre LIKE '%".$search."%' ORDER BY id DESC";
		$result=mysqli_query($this->link, $request);
		$found=array();
		while($topic=mysqli_fetch_object($result, 'Topic', array($this->link)))
		{
			$found[]=$topic;
			return $found;
		}
		
		if($result==null)
		{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
		
				
	}
	public function searchCatTopics($id_category)
	{
		$request="SELECT * FROM topic WHERE id_category='".$id_category."' AND titre LIKE '%".$search."%' ORDER BY id DESC";
		$result=mysqli_query($this->link, $request);
		$found=mysqli_fetch_object($result, 'Topic', array($this->link));
		
		if($result==null)
		{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
		else
		{
			return $found;
		}		
	}
}
?>