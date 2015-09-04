<?php
if(isset($_SESSION['permission']) && $_SESSION['permission'] == "admin"){
	$errorCat = "";
	$successCat = "";
	$errorAddCat = "";
	$successAddCat = "";
	$errorUser = "";
	$successUser = "";
	$errorPost = "";
	$successPost = "";
	require('views/admin.phtml');
}else{
	header('Location: home');
}
?>