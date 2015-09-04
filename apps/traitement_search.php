<?php
$catManager = new CategoryManager($link);
$topManager =	new TopicManager($link);
if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];

	if(isset($_Get['category'])&& !isset($_Get['topic']))
	{
		$category_name=$_GET['category'];
		$category=$catManager->selectByName($category_name);
		$id_category=$category->getId();

		$result=$catManager->selectCatTopics($id_category);
	}
	if(isset($_Get['topic'], $_Get['category']))
	{

	}
	else
	{

	}
}
?>