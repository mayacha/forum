<?php
try{
	//mise à jour log_tchat_date avec current time
	$userManager = new UserManager($link);
	$user = $userManager->selectById($_SESSION['id_user']);
	$user->setLogTchatDate(date("Y-m-d H:i:s", time()));
	$userManager->update($user);
}catch(Exception $e){
	var_dump($e);
}
require('apps/traitement_message.php');
?>