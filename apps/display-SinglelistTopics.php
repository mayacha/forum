<?php
if(isset($_GET['topic']))
{
	$topic = $category->selectByName(str_replace('_', ' ', $_GET['topic']));
	if($topic)
	{
		$listposts = $topic->selectAll();
		$author=$topic->getAuthor()->getLogin();
		require('views/SingleCatlistTopic.phtml');
	}
}



?>