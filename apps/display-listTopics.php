<?php
$catManager = new CategoryManager($link);
if(isset($_GET['category']))
{	
	$category_name=str_replace('_', ' ', $_GET['category']);
	$category=$catManager->selectByName($category_name);

	if (isset($_GET['search']) && $_GET['search']!=="")
	{
		$search = $_GET['search'];
	
			try
			{
				
				$found=$category->searchCatTopics($search);
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
			$found=$category->selectAll();
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}
}
elseif(isset($_GET['page']) && $_GET['page']=='home')
{
	
	$found=$category->selectAll();
	
}
$i=0;
	while($i<count($found))
	{
		$topic=$found[$i];
		if(!isset($_SESSION['login']))
		{
			$author=htmlentities(ucfirst($topic->getAuthor()->getLogin()));
		}
		elseif($topic->getAuthor()->getLogin() == $_SESSION['login'])
		{
			$postauthor=htmlentities($topic->getAuthor()->getLogin());
			$author="<a href=\"profil\">".ucfirst($postauthor)."</a>";
		}
		else
		{
			$postauthor=htmlentities($topic->getAuthor()->getLogin());
			$authorprofil="<a href=\"profil/".$postauthor."\">";
			$author=$authorprofil.ucfirst($postauthor)."</a>";
		}

		require('views/listTopic.phtml');
		$i++;
	}
?>