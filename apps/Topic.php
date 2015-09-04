<?php
if isset($_GET['Topic'])
{
	$name=mysqli_real_escape_string($_GET['Topic']);
	$category=new Category($link);
	$singlecategory=$category->select($id);
	require('views/singleTopic.phtml');
	
}


?>