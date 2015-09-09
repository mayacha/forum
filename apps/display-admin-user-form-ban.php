<?php
// $user && $manager
if($manager->getPermissionLevel($user->getIdPermission()) != "admin"){ 
	require('views/display-admin-user-form-ban.phtml');
}
?>