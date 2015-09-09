<?php 
if(isset($_SESSION['login'], $_SESSION['permission'])){ 
	if($_SESSION['permission'] == "admin"){
		require('views/navbar-admin.phtml');
	}
	else
	{
		require('views/navbar-user.phtml');
	}
	}
else
{
	require('views/navbar-login.phtml');
} 
?>