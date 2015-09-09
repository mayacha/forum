<?php

if(isset($_SESSION['id_user']))
{
	$idPostUser=$post->getId_user();
	$postStatut=$post->getDeleted();
	if ($_SESSION['id_user']==$idPostUser&&$postStatut=="0")
		{
		require('views/deletePost.phtml');
		require('views/editPost.phtml');
		}

	
}

?>