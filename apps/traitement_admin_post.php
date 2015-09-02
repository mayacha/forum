<?php
$errorPost = "";
$successPost = "";
// suppression catégorie
if(isset($_POST['delete'], $_POST['id'])){
	$managerF = new Forum($link);
	$post = $managerF->getPostById($_POST['id']);
	if ($post){
		try{
			$post->setDeleted("1");
			$managerP = new Topic($link);
			$managerP->update($post);
			$successPost = "Message supprimé.";
		}catch(Exception $e){
			$errorPost = $e->getMessage();
		}
	}
}
?>