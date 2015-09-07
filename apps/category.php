<?php
$manager = new CategoryManager($link);
$category = $manager->selectByName($_GET['category']);
$listTopics = $category->selectAll();

require('views/listCat.phtml');

?>