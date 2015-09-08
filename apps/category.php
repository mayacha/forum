<?php
$manager = new CategoryManager($link);
$category = $manager->selectByName(str_replace('_', ' ',$_GET['category']));
$listTopics = $category->selectAll();

require('views/listCat.phtml');

?>