<?php
$listPosts=new Topic($link);
$listPosts=$topic->selectAll();
foreach($listPosts as $post)
{
	$id_author=$post->getIduser();
	// $content=$post->getContent();
	// $titre=$post->getTitle();
	require('views/listPosts.phtml');
}



?>