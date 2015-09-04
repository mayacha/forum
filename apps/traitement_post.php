<?php
if(isset($_POST['titre'], $_POST['content'], $_POST['idTopic'] $_SESSION['id']))
{
	if($_POST['content']!="")
	{
		// $content=mysqli_real_escape_string($_POST['content']);
		// $titre=mysqli_real_escape_string($_POST['titre']);
		// $idUSer=intval($_SESSION['id']);
		// $idTopic=intval($_POST('idTopic']);
		$topic=new Topic($link);
		$newTopic=$topic->create();
	}

}


?>