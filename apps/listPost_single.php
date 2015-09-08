<?php
foreach($listposts as $post)
{
	$idPost=$post->getId();
	$idPostUser=$post->getId_user();

//masque post deleted
	
	$postStatut=$post->getDeleted();
		if($postStatut==1)
		{
			$content="message effacé";
			$post->setContent($content);
		}

	
	require('views/listPostSingle.phtml');
	
}
?>