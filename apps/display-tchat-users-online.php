<?php
try{
	//mise à jour log_tchat_date avec current time
	$userManager = new UserManager($link);
	$usersTchat = $userManager->selectAll();
	foreach($usersTchat as $userTchat){
		if(strtotime($userTchat->getLogTchatDate()) > (time()-300)){
			require('views/display-tchat-user-online.phtml');
		}
	}
}catch(Exception $e){
	var_dump($e);
}
?>