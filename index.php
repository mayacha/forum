<?php
require('fonctions.php');
session_start();
$link = connectDB();
$error = "";
$success = "";
function my_autoloader($className)
{
    require('./models/'.$className.'.class.php');
}
spl_autoload_register('my_autoloader');

//var_dump($_POST);
//var_dump($_GET);
//var_dump($_SESSION);
//var_dump($_SERVER);
$traitementList = array('register','login','logout','post','topic','account','profil','search');

if (isset($_GET['page']) && in_array($_GET['page'], $traitementList))
	require('apps/traitement_'.$_GET['page'].'.php');
$pageList = array('home','category','topic','profil','register','account','admin','singlecategory');
$page = 'home';
if (isset($_GET['page']) && in_array($_GET['page'], $pageList))
	$page = $_GET['page'];
$traitementListAdmin = array('admin_category', 'admin_user', 'admin_post');
if (isset($_GET['page']) && in_array($_GET['page'], $traitementListAdmin))
	require('apps/traitement_'.$_GET['page'].'.php');
//si requete ajax on ne passe pas par skel et content
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
	require('apps/'.$page.'.php');
}else{
	require('apps/skel.php');
}
?>