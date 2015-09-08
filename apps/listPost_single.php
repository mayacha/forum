<?php
if(isset($_GET['search']) && $_GET['search'] !="")
{
	$search=$_GET['search'];
	$catManager = new Category($link);
	$topManager = new Topic($link);
	try
		{
		$category_name=str_replace('_', ' ', $_GET['category']);
		$topic_name=str_replace('_', ' ', $_GET['topic']);
		$this_topic=$catManager->selectByName($topic_name);
		$id_topic=$this_topic->getId();
		$found=$topManager->searchTopicPosts($id_topic,$search);
			$i=0;
			while($i<count($found))
			{
				$post=$found[$i];
				require('views/listPostSingle.phtml');
			$i++;
			}
		}
		catch(Exception $e)
		{
			$error=$e->getMessage();
		}
}
else
{

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
}

?>