<?php
// $user && $manager
if($manager->getPermissionLevel($user->getIdPermission()) != "admin"){ 
	require('views/admin/user/display-form-ban.phtml');
}
?>