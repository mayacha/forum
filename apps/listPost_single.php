<?php


$topic=new Category($link);
$idTopic=$topic->selectByName($topicName)->getId();
$listPostSingle=$topic->selectByName();
foreach($listPostSingle as $topic)
{
	require('views/listPostSingle.phtml');
	
}
var_dump($idTopic);

?>