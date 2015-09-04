<?php
$error="";
$categoryManager = new CategoryManager($link);

if(isset($_POST['create'], $_POST['id'], $_POST['name'], $_POST['message'])){
	try{
		$category = $categoryManager->select($_POST['id']);
		$topic = $category->create($_POST['name']);
		$message = $topic->create($_POST['name'], $_POST['message']);
		header('Location: '.$category->getName().'/'.$topic->getName());
	}catch(Exception $e){
		echo $errorTopic=$e->getMessage();
	}
}
?>