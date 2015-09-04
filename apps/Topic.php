<?php
if (isset($_GET['search']) && $_GET['search']!=="")
{
	$search = $_GET['search'];
	$category=new Category($link);
	$singlecategory=$category->select($id);
	require('views/singleTopic.phtml');
}
else
{
	if isset($_GET['Topic'])
	{
		$name=mysqli_real_escape_string($_GET['Topic']);
		$category=new Category($link);
		$singlecategory=$category->select($id);
		require('views/singleTopic.phtml');
		
	}
}
?>