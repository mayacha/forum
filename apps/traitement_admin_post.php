<?php
// validation post
if(isset($_POST['valid'], $_POST['id'])){
	$managerF = new Forum($link);
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setReported("0");
			$managerP = new Topic($link);
			$managerP->update($post);
			echo "succes";
			exit;
		}catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	}
}
// suppression post
if(isset($_POST['delete'], $_POST['id'])){
	$managerF = new Forum($link);
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
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
// modification post
if(isset($_POST['modif'], $_POST['id'], $_POST['title'], $_POST['content'])){
	$managerF = new Forum($link);
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setTitle($_POST['title']);
			$post->setContent($_POST['content']);
			$post->setReported("0");
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
?>