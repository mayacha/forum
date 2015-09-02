<?php
$error = "";
// http://10.32.195.227/partage/login.php
require('../models/User.class.php');
$link = mysqli_connect('10.32.195.227', 'forum', 'forum', 'forum');
$login = "admin";// $_POST['login']
$password = "toto";// $_POST['password']
$res = mysqli_query($link, "SELECT * FROM user WHERE login='".$login."'");
$user = mysqli_fetch_object($res, "User");
// $user->login = "toto";

try
{
	$user->setLogin('');
}
catch (Exception $e)
{
	$error = $e->getMessage();
}

var_dump($user);
echo "Erreur : ".$error;
?>