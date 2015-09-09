<?php 
		
		$categoryManager=new CategoryManager($link);
		$listcategories=$categoryManager->selectAll();
		if($category)
		{
			foreach($listcategories as $category)
			{
				require('views/listCat.phtml');
			}
		}
	


?>