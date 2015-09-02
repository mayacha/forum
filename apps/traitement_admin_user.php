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
			$successCat = "Permission de l'utilisateur modifiée.";
		}catch(Exception $e){
			$errorCat = $e->getMessage();
		}
	}
}

?>