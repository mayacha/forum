<?php 
if(get_class($manager) == "UserManager"){
	if($manager->getPermissionLevel($user->getIdPermission()) != "admin" && $endBan == 0){ 
		require('views/admin/user/display-single-banbutton.phtml');
	} 
}else{
	header('Location: error');
}
?>