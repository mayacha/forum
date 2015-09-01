<?php
// initialisation des variables pour l'affichage du formulaire de connexion (pour partie AJAX)
$login="";
$error= "";
$success = "";

// si le formulaire est envoyé
if(isset($_POST['login'], $_POST['password']))
{
	require('models/UserManager.class.php');
		try
		{
		$user = $manager->selectByLogin($_POST['login']);
		verifPassword($_POST['password']);
		$_SESSION['login'] = $resultat['login'];
		$_SESSION['id_user'] = $resultat['id'];
		GetPermissionLevel($resultat['id_permission']);
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

