<?php
// initialisation des variables pour l'affichage du formulaire de connexion (pour partie AJAX)
$login="";
$error= "";
$success = "";

// si le formulaire est envoyé
if(isset($_POST['login'], $_POST['password']))
{
	$manager = new UserManager($link);
		try
		{
		$user = $manager->selectByLogin($_POST['login']);
		$login = $user->getLogin(); // déplacé avant verifPassword pour pouvoir afficher le login si le mot de passe est incorrect
		$user->verifPassword($_POST['password']);
		$login = $user->getLogin();
		$id = $user->getId();
		$id_permission = $user->getIdPermission();
		$permissionLevel = $manager->getPermissionLevel($id_permission);
		
		//on verifie si l'utilisateur est banni
		$isBanUntil=$manager->getEndBan($user);
			if($isBanUntil< time())
			{			
				
				if($permissionLevel!='deleted')
				{
					$_SESSION['login'] = $login;
					$_SESSION['id_user'] = $id;
					$_SESSION['permission'] = $permissionLevel;
					// on recharge la page actuelle
					echo "reload";
					exit;
				}
				else
				{
					$error="Vous avez supprimé votre compte :(";
					require('views/navbar-login.phtml');
					exit;
				}	
			}
			else
			{
				$error="Vous avez été banni jusqu'au : ".date('d/m/Y H:i:s',$isBanUntil);
				require('views/navbar-login.phtml');
				exit;
			}	
		}
		catch(Exception $exception)
		{

			$error = $exception->getMessage();
			require('views/navbar-login.phtml');
			exit;

		}
}
?>

