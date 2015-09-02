<?php
$error="";
$manager=new Category ($link);

if(isset($_POST['name'], $_GET['category']))
{
	try
	{
		$topic=$manager->create($_POST['name']);
		$successAddTopic="Nouveau topic enregistré";
	}
	catch(Exception $e)
	{
		$errorTopic=$e->getMessage();
	}
}



?>