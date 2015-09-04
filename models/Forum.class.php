<?php

class Forum
{
	// Constructeur
	public function __construct($link)
	{
		$this->link=$link;
	}

	public function getPostsReported(){
		$request = "SELECT * FROM post WHERE reported = 1 AND deleted = 0";
		$res = mysqli_query($this->link, $request);
		if($res){
			$resultat = array();
			while ($post = mysqli_fetch_object($res, 'Post', array($this->link)))
			{
				$resultat[] = $post;
			}
			return $resultat;
		}else{
			throw new Exception("Internal server error");
		}
	}

		public function getPostById($id){
		$request = "SELECT * FROM post WHERE id = ".$id;
		$res = mysqli_query($this->link, $request);
		$post = mysqli_fetch_object($res, 'Post', array($this->link));
		if($post){
			return $post;
		}else{
			throw new Exception("Internal server error");
		}
	}

}

?>