<?php
$errorUser = "";
$successUser = "";
$manager = new UserManager($link);
// modification user
if(isset($_POST['modif'], $_POST['id'], $_POST['permission'])){
	$user = $manager->selectById($_POST['id']);
	if ($user){
		try{
			$user->setIdPermission($_POST['permission']);
			$manager->update($user);
			$successUser = "Permission de l'utilisateur modifiée.";
			require('apps/display-admin-users.php');
			exit;
		}catch(Exception $e){
			$errorUser = $e->getMessage();
		}
	}
}
// ban user
if(isset($_POST['ban'], $_POST['id'], $_POST['time'])){
	$user = $manager->selectById($_POST['id']);
	if ($user){
		try{
			$manager->ban($_POST['id'], $_POST['time']);
			$successUser = "Utilisateur banni.";
		}catch(Exception $e){
			$errorUser = $e->getMessage();
		}
	}
}

?>