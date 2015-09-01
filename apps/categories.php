<?php
/** SELECT **/
function getAllCategories($link){
	$sql = "SELECT * FROM category ORDER BY name;";
	$result = mysqli_query($link, $sql);
	return $result;
}
?>