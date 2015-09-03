<?php
$errorCat = "";
$successCat = "";
$errorAddCat = "";
$successAddCat = "";
$manager = new CategoryManager($link);
// ajout catégorie
if(isset($_POST['create'], $_POST['name'], $_POST['description'])){
	try{
		$category = $manager->create($_POST['name'], $_POST['description']);
		$successAddCat = "Nouvelle catégorie enregistrée.";
	}catch(Exception $e){
		$errorAddCat = $e->getMessage();
	}
}
// modification catégorie
if(isset($_POST['modif'], $_POST['id'], $_POST['name'], $_POST['description'])){
	$category = $manager->select($_POST['id']);
	if ($category){
		try{
			$category->setName($_POST['name']);
			$category->setDescription($_POST['description']);
			$manager->update($category);
			$successCat = "Catégorie modifiée.";
		}catch(Exception $e){
			$errorCat = $e->getMessage();
		}
	}
}
// suppression catégorie
if(isset($_POST['delete'], $_POST['id'])){
	$category = $manager->select($_POST['id']);
	if ($category){
		try{
			$manager->delete($_POST['id']);
			$successCat = "Catégorie supprimée.";
		}catch(Exception $e){
			$errorCat = $e->getMessage();
		}
	}
}

?>