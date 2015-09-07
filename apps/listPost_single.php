<?php
if(isset($_GET['search']) && $_GET['search'] !="")
{
	$search=$_GET['search'];
	$topManager = new Topic($link);
	try
		{
		$category_name=$_GET['category'];
		$topic_name=$_GET['topic'];
		$topManager->selectByName($category_name);
		$id_category=$category->getId();
		$topManager->searchTopicPosts($id_topic);
		$category = str_replace(' ', '_', $category_name);
		$topic=str_replace(' ', '_', $topic_name);
		$url=$category.'/'.$topic;
		foreach($found as $post)
		{
			require('views/listPostSingle.phtml');
			exit;
		}
		// header('Location:category/'.$category_name.'/'.$topic_name);
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
		require('views/listPostSingle.phtml');
		
	}
}

?>