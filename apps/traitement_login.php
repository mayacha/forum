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
			// ajout require navbar-login pour pour voir l'afficher dans la navabr quand il y a une erreur
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
				require('views/navbar-login.phtml');
				exit;
			}

		}
}
?>

