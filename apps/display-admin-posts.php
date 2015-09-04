<?php
$manager = new Forum($link);
$posts = $manager->getPostsReported();
foreach($posts as $post){
	$linkPost = str_replace(' ', '_', $post->getTopic()->getCategory()->getName())."/".str_replace(' ', '_', $post->getTopic()->getName()."/#".$post->getId());
	require('views/display-admin-post-list.phtml');
}
?>