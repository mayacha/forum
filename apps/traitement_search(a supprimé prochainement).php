<?php
$catManager = new Category($link);
$topManager = new Topic($link);
if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];

	if(isset($_Get['category'])&& !isset($_Get['topic']))
	{
		try
		{
		$category_name=$_GET['category'];
		$catManager->selectByName($category_name);
		$id_category=$category->getId();
		$listTopics=$catManager->searchCatTopics($id_category);
		$category = str_replace(' ', '_', $category_name);
		$url=$category;
		// header('Location:category/'.$category_name);
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}
	if(isset($_Get['topic'], $_Get['category']))
	{
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
		// header('Location:category/'.$category_name.'/'.$topic_name);
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}
	else
	{
		$page=$_GET['page'];
		$catManager->searchAllTopics();
		$topManager->searchAllPosts();
		$url=$page;
		// header('Location:Cani-Gout/'.$page);
	}
}
?>