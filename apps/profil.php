<?php
if(isset($_GET['login']))
{
	$login=$_GET['login'];
	$manager= new UserManager($link);
	$user= $manager->selectByLogin($login);
	$user->getId();
	if(strtotime($user->getBirthdate())<=0)
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();
	$PermissionLevel=$manager->getPermissionLevel($user->getIdPermission());
	require('views/membre.phtml');
}
else
{
	$login=$_SESSION['login'];
	$manager= new UserManager($link);
	$user= $manager->selectByLogin($login);
	$id=$user->getId();
	$password=$user->getPassword();
	var_dump(strtotime($user->getBirthdate()));
	if(strtotime($user->getBirthdate())<=0)
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();
	require('views/profil.phtml');
}

?>