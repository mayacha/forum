<?php
$error="";
$categoryManager = new CategoryManager($link);

// création d'un nouveau topic
if(isset($_POST['create'], $_POST['id'], $_POST['name'], $_POST['message'])){
	try{
		$category = $categoryManager->select($_POST['id']);
		$topic = $category->create($_POST['name']); // on crée le topic
		$message = $topic->create($_POST['name'], $_POST['message']); // puis le premier post du topic
		header('Location: '.$category->getName().'/'.$topic->getName()); // on affiche la page correspondant au topic
	}catch(Exception $e){
		echo $errorTopic=$e->getMessage();
	}
}
?>