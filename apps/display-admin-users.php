<?php
$manager = new UserManager($link);
$users = $manager->selectAll();
foreach($users as $user){
	if($user->getIdPermission() != 4){
		$endBan = $manager->getEndBan($user);
		if ($endBan != 0 && $endBan > date('now')){
			$endBan = date("Y-m-d H:i:s", $endBan);
		}else{
			$endBan == 0;
		}
		require('views/display-admin-user-list.phtml');
	}
}
?>