<?php
$errorPost = "";
$successPost = "";
$managerP = new Topic($link);
$managerF = new Forum($link);
// validation post
if(isset($_POST['valid'], $_POST['id'])){
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setReported("0");
			$managerP->update($post);
			$successPost = "Message validé.";
			echo "success";
			exit;
		}catch(Exception $e){
			$errorPost = $e->getMessage();
			echo "error";
			exit;
		}
	}
}
// modification post
if(isset($_POST['modif'], $_POST['id'], $_POST['title'], $_POST['content'])){
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setTitle($_POST['title']);
			$post->setContent($_POST['content']);
			$post->setReported("0");
			$managerP->update($post);
			$successPost = "Message modifié.";
			echo "success";
			exit;
		}catch(Exception $e){
			$errorPost = $e->getMessage();
			echo "error";
			exit;
		}
	}
}
// suppression post
if(isset($_POST['delete'], $_POST['id'])){
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setDeleted("1");
			$managerP->update($post);
			$successPost = "Message supprimé.";
			echo "success";
			exit;
		}catch(Exception $e){
			$errorPost = $e->getMessage();
			echo "error";
			exit;
		}
	}
}
?>