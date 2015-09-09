<?php
// $user && $manager
if(get_class($manager) == "UserManager"){
if($manager->getPermissionLevel($user->getIdPermission()) != "admin"){ 
	require('views/admin/user/display-form-ban.phtml');
}
}else{
	header('Location: error');
}
?>