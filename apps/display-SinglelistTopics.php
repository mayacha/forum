<?php

$topic = $category->selectByName($_GET['topic']);
$listposts = $topic->selectAll();

require('views/SingleCatlistTopic.phtml');



?>