<?php
$catManager = new Category($link);
$topManager =	new Topic($link);
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
		$catManager->searchCatTopics($id_category);
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
		$topic_name=$_GET['topic'];
		$topManager->selectByName($category_name);
		$id_category=$category->getId();
		$topManager->searchTopicPosts($id_topic);
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
	}
	else
	{

		$catManager->searchAllTopics();
		$topManager->searchAllPosts();
	}
}
?>