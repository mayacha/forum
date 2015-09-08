<?php

if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];
	$catManager = new CategoryManager($link);
		try
		{
		$category_name=$_GET['category'];
		$category=$catManager->selectByName($category_name);
		$id_category=$category->getId();
		$found=$category->searchCatTopics($id_category,$search);
		$url = str_replace(' ', '_', $category_name);
		
			$i=0;
				while($i<count($found))
			{
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
		require('views/listTopic.phtml');
	}
}
?>