<?php
$error='';
$success='';
$plogin='';
$pemail='';
$pbirthdate='';

$login=$_SESSION['login'];
$manager= new UserManager($link);
$user= $manager-> selectByLogin($login);


if (isset($_FILES['avatar']))
{
	$fichier= uploadAvatar($_FILES['avatar']);
	$avatar=$user->setAvatar($fichier);
	$success='Upload effectué avec succès !';
}
if (isset($_POST['changelog']))
{
	try
	{
		$user->setLogin($_POST['changelog']);
	}
	catch (Exception $exception)
	{
		$error=$exception->getMessage();
	}

}
if (isset($_POST['exmdp'], $_POST['changemdp'], $_POST['checkmdp'])&& $_POST['changemdp'] == $_POST['checkmdp'])
{
	try
	{
		$password=$user->modifPassword($_POST['exmdp'],$_POST['changemdp']);
		$user->setPassword($password);
	}
	catch (Exception $exception)
	{
		$error = $exception->getMessage();
	}

}
else
{
	$error="Les deux saisies ne correspondent pas...";
}
if (isset($_POST['changemail']))
{
	try
	{
		$user->setEmail($_POST['changemail']);
	}
	catch (Exception $exception)
	{
		$error=$exception->getMessage();
	}
}
if (isset($_POST['description']))
{

}
if (isset($_POST['birthdate']))
{

}

$manager-> update($user);

?>