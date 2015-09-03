<?php
$listTopics=$category->selectAll();
foreach($listTopics as $topic)
{
	$id_author=$topic->getIdUser();
	require('views/listTopic.phtml');
}




?>