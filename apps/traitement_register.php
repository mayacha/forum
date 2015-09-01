<?php
$login='';
$email='';
$birthdate='';
require('models/UserManager.class.php');

if(isset($_POST['login'],$_POST['email'],$_POST['birthdate'],$_POST['password'],$_POST['check-password']))
{
	if($_POST['password']==$_POST['checkpassword'])
	{
		try
		{
			$user = $manager->create($_POST);
		}
		catch (Exception $exception)
		{
			$error = $exception->getMessage();
		}
	}
	else
	{
		$error="les mots de passe saisis ne correspondent pas"
	}
}	
?>
