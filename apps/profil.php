<?php
if(isset($_GET['login']))
{
	$login=$_GET['login'];

	$manager= new UserManager($link);
	$user= $manager->selectByLogin($login);
	$id=$user->getId();

	if($user->getBirthdate()=='0000-00-00')
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();
	$PermissionLevel=$manager->getPermissionLevel($user->getIdPermission());

	$manager= new Topic($link);
	$countP=$manager->countUserPost($id);
	$manager= new Category($link);
	$countT=$manager->countUserTopic($id);

	require('views/membre.phtml');
}
else
{
	$login=$_SESSION['login'];
	$manager= new UserManager($link);
	$user= $manager->selectByLogin($login);
	$id=$user->getId();
	$password=$user->getPassword();
	$PermissionLevel=$manager->getPermissionLevel($user->getIdPermission());
	if($user->getBirthdate()=='0000-00-00')
	$birthdate='Non renseignée';
	else
	$birthdate=date('d/m/Y',strtotime($user->getBirthdate()));
	if($user->getDescription()=='')
	$description='Pas de description a afficher';
	else
	$description=$user->getDescription();

	$manager= new Topic($link);
	$countP=$manager->countUserPost($id);

	$manager= new Category($link);
	$countT=$manager->countUserTopic($id);

	require('views/profil.phtml');
}

?>