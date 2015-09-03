<?php
$login=$_SESSION['login'];
$manager= new UserManager($link);
$user= $manager-> selectByLogin($login);
$id=$user->getId();
$email=$user->getEmail();
$password=$user->getPassword();
$birthdate=$user->getBirthdate();
$description=$user->getDescription();
$date_register=$user->getDateRegister();
$avatar=$user->getAvatar();
require('views/profil.phtml');
?>