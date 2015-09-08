<?php

//mise à jour des messages affichés
if(isset($_POST['refresh-messages'])){
	try{
		$chatManager = new TchatManager($link);
		$chats = $chatManager->selectLasts();
		$length = sizeof($chats);
		while($length > 0){
			$chat = $chats[$length-1];
			if( $length % 2 === 0){
				$color = "gris1";
			}else{
				$color = "gris2";
			}
			require('views/display-tchat-message.phtml');
			$length-=1;
		}
		exit;
	}catch(Exception $e){
		$error = $e->getMessage();
		exit;
	}
}

//mise à jour des utilisateurs en ligne
if(isset($_POST['refresh-users'])){
	try{
		require('apps/display-tchat-users-online.php');
		exit;
	}catch(Exception $e){
		$error = $e->getMessage();
		exit;
	}
}

// nouveau message
if(isset($_POST['create'], $_POST['message'])){
	try{
		$chatManager = new TchatManager($link);
		$chat = new Tchat($link);
		$chat->setMessage($_POST['message']);
		$chat->setAttr("id_user", $_SESSION['id_user']);
		$chatManager->create($chat);
		try{
			//mise à jour log_tchat_date avec current time
			$userManager = new UserManager($link);
			$user = $userManager->selectById($_SESSION['id_user']);
			$user->setLogTchatDate(date("Y-m-d H:i:s", time()));
			$userManager->update($user);
		}catch(Exception $e){
			echo $e->getMessage();
		}
		exit;
	}catch(Exception $e){
		$error = $e->getMessage();
		exit;
	}
}
?>