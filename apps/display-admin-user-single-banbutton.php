<?php 
if($manager->getPermissionLevel($user->getIdPermission()) != "admin" && $endBan == 0){ 
	require('views/display-admin-user-single-banbutton.phtml');
} 
?>