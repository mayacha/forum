<?php
if(get_class($user) == "User"){
;	if($user->getAvatar() != ""){
		require('views/admin/user/display-single-avatar.phtml');
	}
}else{
	header('Location: error');
}