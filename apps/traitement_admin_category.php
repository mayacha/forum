<?php
if(isset($_SESSION['permission']) && $_SESSION['permission'] == "admin"){
	$manager = new CategoryManager($link);
	// ajout catégorie
	if(isset($_POST['create'], $_POST['name'], $_POST['description'])){
		try{
			$category = $manager->create($_POST['name'], $_POST['description']);
			// actualise la liste des catégories via AJAX
			require('apps/admin/display-categories.php');
		}catch(Exception $e){
			echo $e->getMessage();
		}
		exit;
	}
	// modification catégorie
	if(isset($_POST['modif'], $_POST['id'], $_POST['name'], $_POST['description'])){
		$category = $manager->select($_POST['id']);
		if ($category){
			try{
				$category->setName($_POST['name']);
				$category->setDescription($_POST['description']);
				$manager->update($category);
				// actualise la liste des catégories via AJAX
				require('views/admin/category/display-single.phtml');
			}catch(Exception $e){
				echo $e->getMessage();
			}
			exit;
		}
	}
	// suppression catégorie
	if(isset($_POST['delete'], $_POST['id'])){
		$category = $manager->select($_POST['id']);
		if ($category){
			try{
				$manager->delete($_POST['id']);
				// la catégorie sera supprimée de l'affichage via javascript
				echo "success";
			}catch(Exception $e){
				echo $e->getMessage();
			}
			exit;
		}
	}
}else{
	echo "logout";
	exit;
}

?>