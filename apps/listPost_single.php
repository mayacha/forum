<?php

foreach($listposts as $post)
{
	$post=new Post($link);
	$idPost=$post->getId();
	require('views/listPostSingle.phtml');
	
}
?>