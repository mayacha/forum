<?php
$manager = new UserManager($link);
$users = $manager->selectAll();
foreach($users as $user){
	if($user->getIdPermission() != 4){
		$id = $user->getId();
		$login = $user->getLogin();
		$email = $user->getEmail();
		$avatar = $user->getAvatar();
		$permission = $manager->getPermissionLevel($user->getIdPermission());
		$endBan = $manager->getEndBan($user);
		if ($endBan != 0){
			$endBan = date("Y-m-d H:i:s", $endBan);
		}
		require('views/display-admin-user-list.phtml');
	}
}
?>