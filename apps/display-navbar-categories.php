<?php
// récupération des catégories pour affichage dans le menu
$manager = new CategoryManager($link);
try
{
	$categories = $manager-> selectAll();

	$i=0;
	while($i < count($categories))
	{
		$category = $categories[$i]; // nom categorie
		require('views/navbar-category.phtml'); // affichage
		$i++;
	}
}
catch(Exception $exception)
{
 header('Location:error');
}
	

?>