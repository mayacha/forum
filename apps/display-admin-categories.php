<?php
$categoryManager = new CategoryManager($link);
$categories = $categoryManager->selectAll();
foreach($categories as $category){
	$id = $category->getId();
	$name = $category->getName();
	$description = $category->getDescription();
	require('views/display-admin-category-list.phtml');
}
?>