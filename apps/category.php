<?php
if(isset($_GET['category']))
{
	$manager = new CategoryManager($link);
	$category = $manager->selectByName(str_replace('_', ' ',$_GET['category']));
	if($category)
	{
	$listTopics = $category->selectAll();
	require('views/listCat.phtml');
	}

}


?>