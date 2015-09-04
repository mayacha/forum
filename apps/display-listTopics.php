<?php

$listTopics=$category->selectAll();
foreach($listTopics as $topic)
{
	require('views/listTopic.phtml');
}


?>