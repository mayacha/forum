<?php

$topic = $category->selectByName(str_replace('_', ' ', $_GET['topic']));
$listposts = $topic->selectAll();


require('views/SingleCatlistTopic.phtml');



?>