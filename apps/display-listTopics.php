<?php


if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];
	$catManager = new CategoryManager($link);
		try
		{
		$category_name=str_replace('_', ' ', $_GET['category']);
		$category=$catManager->selectByName($category_name);
		$id_category=$category->getId();
		$found=$category->searchCatTopics($id_category,$search);
		
			$i=0;
				while($i<count($found))
			{
				if(!isset($_SESSION['login']))
				{
					$author=htmlentities(ucfirst($topic->getAuthor()->getLogin()));
				}
				else
				{
					$postauthor=htmlentities($topic->getAuthor()->getLogin());
					$authorprofil="<a href=\"profil/".$postauthor."\">";
					$author=$authorprofil.ucfirst($postauthor);
				}
				$topic=$found[$i];
				require('views/listTopic.phtml');
			$i++;
			}
			exit;
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
}
else
{
	$listTopics=$category->selectAll();
	foreach($listTopics as $topic)
	{
		if(!isset($_SESSION['login']))
		{
			$author=htmlentities($topic->getAuthor()->getLogin());
		}
		else
		{
			$postauthor=htmlentities($topic->getAuthor()->getLogin());
			$authorprofil="<a href=\"profil/".$postauthor."\">";
			$author=$authorprofil.ucfirst($postauthor);
		}
		require('views/listTopic.phtml');
	}
}
?>