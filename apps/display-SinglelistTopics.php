<?php
$manager = new CategoryManager($link);
$category = $manager->selectByName($_GET['category']);
$topic = $category->selectByName($_GET['topic']);
$listposts = $topic->selectAll();

require('views/SingleCatlistTopic.phtml');



?>