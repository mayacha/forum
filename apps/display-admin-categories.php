<?php
$manager = new CategoryManager($link);
$categories = $manager->selectAll();
foreach($categories as $category){
	require('views/display-admin-category-list.phtml');
}
?>