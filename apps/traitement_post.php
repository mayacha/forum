<?php
if(isset($_POST['titre'], $_POST['content'], $_POST['idTopic'], $_SESSION['id']))
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

if(isset($_POST['delete'], $_POST['id']))
{
	$managerF = new Forum($link);
	$post = $managerF->getPostById($_POST['id']);
	if ($post)
	{
		try
		{
			$post->setDeleted("1");
			$managerP = new Topic($link);
			$managerP->update($post);
			echo "success";
			exit;
		}catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	}
}

if(isset($_SESSION['id'], $_POST('editPost')), $_POST('postId'))
{
	$post=new Post($link);
	$editpostId=$post->selectById($_POST['postId']);
	require ('apps/updatePost.phtml');

	if(isset($_POST('updatepostTitle'), $_POST['updatepostContent']), $_POST['validation'])
	{
		$post=new Post($link);
		$postcontent=$post->setContent($_POST['updatepostContent']);
		$postTitle=$post->setTitle($_POST['updatepostTitle']);
		$topic=new Topic($link);
		$updatePost=$topic->simpleUpdate($post);

	}

}