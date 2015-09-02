<?php
function connectDB(){
	// connexion BDD
	$host = "localhost";
	$username = "root";
	$passwd = "troiswa";
	$dbname = "cani-gout";
	$link = @mysqli_connect($host, $username, $passwd, $dbname);
	if (!$link) {
	    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
	            . mysqli_connect_error());
	}
	return $link;
}
function stripAccents($string){
	return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}
?>