<?php 


$categoryManager=new CategoryManager($link);
$listcategories=$categoryManager->selectAll();
foreach($listcategories as $category)
{
	require('views/listCat.phtml');
}



?>