<?php

$name=$_GET['category'];
$categoryManager=new CategoryManager($link);
$singleCategory=$categoryManager->selectByName($name);
$category = $singleCategory;


require('views/singlecategory.phtml');

?>