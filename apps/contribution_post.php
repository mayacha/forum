<?php

if(isset($_GET['login']))
{
	$login=$_GET['login'];
}
else
{
	$login=$_SESSION['login'];
}
$manager= new UserManager($link);
$user= $manager->selectByLogin($login);
$id=$user->getId();

$manager= new Topic($link);
$contribution=$manager->getUserPosts($id);
$i=0;
while($i<count($contribution))
{
	$post=$contribution[$i];
	require('views/contribution_post.phtml');
	$i++;
}
?>