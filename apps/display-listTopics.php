<?php
if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];
	$catManager = new Category($link);
		try
		{
		$category_name=$_GET['category'];
		$catManager->selectByName($category_name);
		$id_category=$category->getId();
		$catManager->searchCatTopics($id_category);
		$url = str_replace(' ', '_', $category_name);
		
			foreach($found as $topic)
		{
			require('views/listTopic.phtml');
			exit;
		}
		// header('Location:category/'.$category_name);
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