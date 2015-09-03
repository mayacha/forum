<?php
$singleTopic= new Topic($link);
$singleTopic=$topic->select($id);
$TopicName=$topic->getName();
$author=$topic->getAuthor();
require('views/singleTopic.phtml');


?>