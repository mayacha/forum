<?php
$topic=new Topic($link);
$listPosts=$topic->selectAll();
foreach($listPosts as $post)
{

	require('views/listPosts.phtml');
}



?>