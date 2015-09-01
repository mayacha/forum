<?php
$errorAddCat = "";
$successAddCat = "";
$manager = new CategoryManager($link);
if(isset($_POST['create'], $_POST['name'], $_POST['description'])){
	try{
		$category = $manager->create($_POST['name'], $_POST['description']);
		$successAddCat = "Nouvelle catégorie enregistrée.";
	}catch(Exception $e){
		$errorAddCat = $e->getMessage();
	}
}
?>