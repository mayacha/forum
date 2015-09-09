<?php

if(isset($_GET['category']))

{
	$manager = new CategoryManager($link);
	try{
	$category = $manager->selectByName(str_replace('_', ' ',$_GET['category']));
	$listTopics = $category->selectAll();

	require('views/listCat.phtml');
	}catch(Exception $e){
		echo $e->getMessage();
	}
}


?>