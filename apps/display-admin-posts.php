<?php
$manager = new Forum($link);
$posts = $manager->getPostsReported();
foreach($posts as $post){
	$id = $post->getId();
	$title = $post->getTitle();
	$content = $post->getContent();
	$idTopic = $post->getId_topic();
	$topic = $post->getTopic()->getName();
	$category = $post->getTopic()->getCategory()->getName();
	$idUser = $post->getId_user();
	$user = $post->getAuthor()->getLogin();
	//$link = cat / .
	require('views/display-admin-post-list.phtml');
}
?>