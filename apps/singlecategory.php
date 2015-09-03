<?php

$name=$_GET['category'];
$categoryManager=new CategoryManager($link);
$singleCategory=$categoryManager->selectByName($name);


require('views/singlecategory.phtml');

?>