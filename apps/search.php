<?php
if(isset($_GET['category']) || isset($_GET['category'], $_GET['topic']))
require('views/search.phtml');
?>