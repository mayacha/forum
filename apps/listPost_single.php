<?php
if(isset($_GET['search']) && $_GET['search'] !="")
{
	$search=$_GET['search'];
	$catManager = new Category($link);
	$topManager = new Topic($link);
	try
		{
		$category_name=str_replace('_', ' ', $_GET['category']);
		$topic_name=str_replace('_', ' ', $_GET['topic']);
		$this_topic=$catManager->selectByName($topic_name);
		$id_topic=$this_topic->getId();
		$found=$topManager->searchTopicPosts($id_topic,$search);
			$i=0;
			while($i<count($found))
			{
				$post=$found[$i];

				if(!isset($_SESSION['login']))
				{
					$author=htmlentities(ucfirst($post->getAuthor()->getLogin()));
				}
				else
				{
					$postauthor=htmlentities($post->getAuthor()->getLogin());
					$authorprofil="<a href=\"profil/".$postauthor."\">";
					$author=$authorprofil.ucfirst($postauthor)."</a>";
				}
				require('views/listPostSingle.phtml');
			$i++;
			}
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
}
else
{

	foreach($listposts as $post)
	{
		if(!isset($_SESSION['login']))
		{
			$author=htmlentities(ucfirst($post->getAuthor()->getLogin()));
		}
		else
		{
			$postauthor=htmlentities($post->getAuthor()->getLogin());
			$authorprofil="<a href=\"profil/".$postauthor."\">";
			$author=$authorprofil.ucfirst($postauthor)."</a>";
		}
		
	$idPost=$post->getId();
	$idPostUser=$post->getId_user();

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
		
	}
}

?>