<?php
if(isset($_GET['login']))
{
	$login=$_GET['login'];
	$manager= new UserManager($link);
	$user= $manager-> selectByLogin($login);
	$id=$user->getId();
	if($user->getBirthdate()=='0000-00-00')
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();
	$date_register=$user->getDateRegister();
	$avatar=$user->getAvatar();
	$PermissionLevel=$manager->getPermissionLevel($user->getIdPermission());
	require('views/membre.phtml');
}
else
{
	$login=$_SESSION['login'];
	$manager= new UserManager($link);
	$user= $manager-> selectByLogin($login);
	$id=$user->getId();
	$email=$user->getEmail();
	$password=$user->getPassword();
	if($user->getBirthdate()=='0000-00-00')
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();
	$date_register=$user->getDateRegister();
	$avatar=$user->getAvatar();
	require('views/profil.phtml');
}

?>