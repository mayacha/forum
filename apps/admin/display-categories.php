<?php
$manager = new CategoryManager($link);
$categories = $manager->selectAll();
foreach($categories as $category){
	require('views/admin/category/display-list.phtml');
}
?>