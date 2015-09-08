<?php
$manager = new Forum($link);
$posts = $manager->getPostsReported();
foreach($posts as $post){
	require('views/display-admin-post-list.phtml');
}
?>