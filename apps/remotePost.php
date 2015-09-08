<?php

if(isset($_SESSION['id_user']))
{
	$idPostUser=$post->getId_user();

	if ($_SESSION['id_user']==$idPostUser)
	{
	require('views/deletePost.phtml');
	require('views/editPost.phtml');
	}
}

?>