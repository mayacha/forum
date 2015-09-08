<?php

$topic = $category->selectByName(str_replace('_', ' ', $_GET['topic']));
$listposts = $topic->selectAll();
$author=htmlentities($topic->getAuthor()->getLogin());

require('views/SingleCatlistTopic.phtml');



?>