<?php

if(isset($_SESSION['id']))
{
	$post= new Post($link);
	$idPostUser=$post->getId_user();

	if ($_SESSION['id']=$idPostUSer)
	{
	require('views/deletePost.phtml');
	require('views/editPost.phtml');
	}
}

?>