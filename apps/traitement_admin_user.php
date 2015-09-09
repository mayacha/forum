<?php
if(isset($_SESSION['permission']) && $_SESSION['permission'] == "admin"){
	$manager = new UserManager($link);
	// modification user
	if(isset($_POST['modif'], $_POST['id'], $_POST['permission'])){
		$user = $manager->selectById($_POST['id']);
		if ($user){
			try{
				$user->setIdPermission($_POST['permission']);
				$manager->update($user);
				$endBan = $manager->getEndBan($user);
				if ($endBan >= time()){
					$endBan = date("Y-m-d H:i:s", $endBan);
				}else{
					$endBan = 0;
				}
				// actualise la liste des utilisateurs via AJAX
				require('views/admin/user/display-single.phtml');
				exit;
			}catch(Exception $e){
				echo $e->getMessage();
				exit;
			}
		}
	}
	// ban user
	if(isset($_POST['ban'], $_POST['id'], $_POST['time'])){
		$user = $manager->selectById($_POST['id']);
		if ($user){
			try{
				$manager->ban($_POST['id'], $_POST['time']);
				$endBan = $manager->getEndBan($user);
				if ($endBan >= time()){
					$endBan = date("Y-m-d H:i:s", $endBan);
				}else{
					$endBan = 0;
				}
				// actualise la liste des utilisateurs via AJAX
				require('views/admin/user/display-single.phtml');
				exit;
			}catch(Exception $e){
				echo $e->getMessage();
				exit;
			}
		}
	}
}else{
	echo "logout";
	exit;
}

?>