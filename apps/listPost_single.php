<?php
if(isset($_GET['search']) && $_GET['search'] !="")
{
	$search=$_GET['search'];
	$topManager = new Topic($link);
	try
		{
		$category_name=$_GET['category'];
		$topic_name=$_GET['topic'];
		$topManager->selectByName($category_name);
		$id_category=$category->getId();
		$found=$topManager->searchTopicPosts($id_topic,$search);
		$category = str_replace(' ', '_', $category_name);
		$topic=str_replace(' ', '_', $topic_name);
		$url=$category.'/'.$topic;
			$i=0;
			while($i<count($found))
			{
				$post=$found[$i];
				require('views/listPostSingle.phtml');
			$i++;
			}
			
			exit;
		// header('Location:category/'.$category_name.'/'.$topic_name);
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
	require('views/listPostSingle.phtml');
		
	}
}

?>