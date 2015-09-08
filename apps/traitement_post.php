<?php

// CREATE POST
if(isset($_POST['newtitle'], $_POST['newpost'], $_SESSION['id_user'])) //$_SESSION['id'] au lieu de $_SESSION['id_user']
{
	try
	{
		$newpost=$_POST['newpost'];
		$newtitle=$_POST['newtitle'];
		$CategoryManager=new CategoryManager($link);
		$category=$CategoryManager->select($_POST['idcategory']);
		$userID=$_SESSION['id'];
		$topic=$category->select($_POST['idtopic']);
		$id_topic=$topic->getId();
		$newTopic=$topic->create($newtitle, $newpost);
		header('Location:'.$category->getName().'/'.$topic->getName());
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
		exit;
	}

}



//DELETED

if(isset($_POST['delete'], $_POST['postId']))
{
	
		try
		{
		
			$CategoryManager=new CategoryManager($link);
			$category=$CategoryManager->select($_POST['idcategory']);
			$topic=$category->select($_POST['idtopic']);
			$post = $topic->select($_POST['postId']);
			$topic->DelUpdate($post);
			header('location:'.$category->getName().'/'.$topic->getName());
		}catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	
}

//UPDATE POST


if(isset($_POST['updatepostContent'], $_POST['validation']))
{
	try
	{
		$CategoryManager=new CategoryManager($link);
		$category=$CategoryManager->select($_POST['idcategory']);
		$topic=$category->select($_POST['idtopic']);
		$post=$topic->select($_POST['postId']);
		$post->setContent($_POST['updatepostContent']);
		$updatePost=$topic->simpleUpdate($post);
		header('location:'.$category->getName().'/'.$topic->getName());
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
}

?>

