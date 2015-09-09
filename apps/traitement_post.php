<?php

// CREATE POST
if(isset($_POST['newtitle'], $_POST['newpost'], $_SESSION['id_user'], $_POST['idtopic'], $_POST['idcategory'])) //$_SESSION['id'] au lieu de $_SESSION['id_user']
{
	try
	{
		$newpost=$_POST['newpost'];
		$newtitle=$_POST['newtitle'];
		$userID=$_SESSION['id_user'];
		$idcategory=$_POST['idcategory'];
		$id_topic=$_POST['idtopic'];
		$CategoryManager=new CategoryManager($link);
		$category=$CategoryManager->select($idcategory);
		$topic=$category->select($id_topic);
		$newTopic=$topic->create($newtitle, $newpost);
		header('Location:'.str_replace(" ","_", $category->getName()).'/'.str_replace(" ","_",$topic->getName()));
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
		exit;
	}

}



//DELETED

if(isset($_POST['delete'], $_POST['postId'], $_POST['idtopic'], $_POST['idcategory']))
{
	
		try
		{
		
			$CategoryManager=new CategoryManager($link);
			$category=$CategoryManager->select($_POST['idcategory']);
			$topic=$category->select($_POST['idtopic']);
			$post = $topic->select($_POST['postId']);
			$topic->DelUpdate($post);
			header('Location:'.str_replace(" ","_", $category->getName()).'/'.str_replace(" ","_",$topic->getName()));
		}catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	
}

//UPDATE POST


if(isset($_POST['updatepostContent'], $_POST['validation'], $_POST['idcategory'], $_POST['idtopic']))
{
	try
	{
		$CategoryManager=new CategoryManager($link);
		$category=$CategoryManager->select($_POST['idcategory']);
		$topic=$category->select($_POST['idtopic']);
		$post=$topic->select($_POST['postId']);
		$post->setContent($_POST['updatepostContent']);
		$updatePost=$topic->simpleUpdate($post);
		header('Location:'.str_replace(" ","_", $category->getName()).'/'.str_replace(" ","_",$topic->getName()));
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
}

?>

