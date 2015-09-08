<?php
$flogin='';
$email='';

$manager = new UserManager($link);

if(isset($_POST['login'],$_POST['email'],$_POST['password'],$_POST['check-password']))
{
	if($_POST['password']==$_POST['check-password'])
	{
		try
		{
			$user= new User($link);
			$user->setLogin($_POST['login']);
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			$newUser= $manager->create($user);

			$id_permission = $newUser->getIdPermission();
			$permissionLevel = $manager->getPermissionLevel($id_permission);

			$_SESSION['login'] = $newUser->getLogin();
			$_SESSION['id_user'] = $newUser->getId();
			$_SESSION['permission'] = $permissionLevel;
			header('Location:home');
		}
		catch (Exception $exception)
		{
			$flogin=$_POST['login'];
			$email=$_POST['email'];
			$error = $exception->getMessage();
		}
	}
	else
	{
		$flogin=$_POST['login'];
		$email=$_POST['email'];
		$error="les mots de passe saisis ne correspondent pas";
	}
}

?>
