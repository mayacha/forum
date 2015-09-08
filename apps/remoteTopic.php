<?php

if(isset($_SESSION['id_user']))
{
	$topic=new Topic($link);
	$idTopicUser=$topic->getIdUser();
	require('views/display-category-topic-form-add.phtml');
	
	
}

?>