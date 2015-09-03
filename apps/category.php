<?php
$manager = new CategoryManager($link);
$category = $manager->selectByName($_GET['category']);
$listTopicss = $category->selectAll();

require('views/listCat.phtml');




?>