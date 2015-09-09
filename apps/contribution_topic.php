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

	$manager= new Category($link);
	$contribution=$manager->getUserTopics($id);
	$i=0;
	while($i<sizeof($contribution))
	{
		$topic=$contribution[$i];
		require('views/contribution_topic.phtml');
		$i++;
	}
?>