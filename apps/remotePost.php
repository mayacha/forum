<?php

if(isset($_SESSION['login']))
{
	require('views/deletePost.phtml');
	require('views/editPost.phtml');
}

?>