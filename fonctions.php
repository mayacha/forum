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

function uploadAvatar(){
$dossier = 'img/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//Début des vérifications de sécurité
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $error = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($error)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //renvoi TRUE
     {
          $success='Upload effectué avec succès !';
          return $success;
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          $error='Echec de l\'upload !';
          return $error;
     }
}
else
{
     return $error;
}
}
?>