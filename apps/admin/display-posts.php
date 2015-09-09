<?php
$manager = new Forum($link);
$posts = $manager->getPostsReported();
foreach($posts as $post){
	require('views/admin/post/display-list.phtml');
}
?>