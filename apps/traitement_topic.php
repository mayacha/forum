<?php
$error="";
$categoryManager = new CategoryManager($link);

// création d'un nouveau topic
if(isset($_POST['create'], $_POST['id'], $_POST['name'], $_POST['message'])){
		$category = $categoryManager->select($_POST['id']);
	try{
		$topic = $category->create($_POST['name']); // on crée le topic
		$message = $topic->create($_POST['name'], $_POST['message']); // puis le premier post du topic
		header('Location:'.str_replace(" ","_", $category->getName()).'/'.str_replace(" ","_",$topic->getName()));
	}catch(Exception $e){
		echo $errorTopic=$e->getMessage();
		header('Location: category/'.str_replace(" ","_", $category->getName()));
	}
}
?>