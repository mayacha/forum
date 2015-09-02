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
		$user->verifPassword($_POST['password']);
		$login = $user->getLogin();
		$id = $user->getId();
		$id_permission = $user->getIdPermission();
		$_SESSION['login'] = $login;
		$_SESSION['id_user'] = $id;
		$permissionLevel = $manager->getPermissionLevel($id_permission);
		$_SESSION['permission'] = $permissionLevel;
			// on recharge la page actuelle
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
			{
				echo "reload";
				exit;
			}
			else
			{
				header('Location: home');
				exit;
			}
		}
		catch(Exception $exception)
		{

			$error = $exception->getMessage();
		}
}
?>

