<?php
if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];
	$catManager = new Category($link);
		try
		{
		$category_name=str_replace('_',' ',$_GET['category']);
		$catManager->selectByName($category_name);
		$id_category=$category->getId();
		$found=$catManager->searchCatTopics($id_category,$search);
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