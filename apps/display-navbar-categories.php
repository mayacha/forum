<?php
// récupération des catégories pour affichage dans le menu
require('apps/categories.php');
$result = getAllCategories($link);
$category = "";
while($res = mysqli_fetch_assoc($result)){
	$category = htmlentities($res['name']); // nom categorie
	require('views/navbar-category.phtml'); // affichage
}
?>