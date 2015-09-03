<?php
$error="";


$cManager = new Category($link);
$category = $cManager->select(1);
$topic = $category->select(1);
$posts = $topic->selectAll();
$resultat = $posts;
$n=0;

while ($n<$resultat)
{
	$post=$resultat($n);
	$n++;
	require('views/listPost.phtml');
}




?>