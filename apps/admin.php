<?php
if(isset($_SESSION['permission']) && $_SESSION['permission'] == "admin"){
	require('views/admin.phtml');
}else{
	header('Location: home');
}
?>