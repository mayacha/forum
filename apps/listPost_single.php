<?php
if(isset($_GET['category'],$_GET['topic']))
{

	$category_name=str_replace('_', ' ', $_GET['category']);
	$topic_name=str_replace('_', ' ', $_GET['topic']);
	
	$catManager = new Category($link);

	if(isset($_GET['search']) && $_GET['search'] !="")
	{
		$search=$_GET['search'];
		try
		{
		$this_topic=$catManager->selectByName($topic_name);
		$found=$this_topic->searchTopicPosts($search);
		}	
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}
	else
	{
		try
		{
		$this_topic=$catManager->selectByName($topic_name);
		$found=$this_topic->selectAll();
		}
			
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}


	$i=0;
	while($i<count($found))
	{
		$post=$found[$i];

		if(!isset($_SESSION['login']))
		{
			$author=htmlentities(ucfirst($post->getAuthor()->getLogin()));
		}
		elseif($post->getAuthor()->getLogin() == $_SESSION['login'])
		{
			$postauthor=htmlentities($post->getAuthor()->getLogin());
			$author="<a href=\"profil\">".ucfirst($postauthor)."</a>";
		}
		else
		{
			$postauthor=htmlentities($post->getAuthor()->getLogin());
			$authorprofil="<a href=\"profil/".$postauthor."\">";
			$author=$authorprofil.ucfirst($postauthor)."</a>";
		}

//masque post deleted
	$delstyle="";
	$postStatut=$post->getDeleted();
		if($postStatut==1)
		{
			$content="message effacé";
			$delstyle="deletestyle";
			$post->setContent($content);
		}
		require('views/listPostSingle.phtml');
		$i++;
	}
}

?>