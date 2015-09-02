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


$traitementList = array('register','login','logout','post','topic','account');
if (isset($_GET['page']) && in_array($_GET['page'], $traitementList))
	require('apps/traitement_'.$_GET['page'].'.php');
$pageList = array('home','category','topic','profil','register','account','admin');
$page = 'home';
if (isset($_GET['page']) && in_array($_GET['page'], $pageList))
	$page = $_GET['page'];

$traitementListAdmin = array('admin_category');
if (isset($_GET['page_admin']) && in_array($_GET['page_admin'], $traitementListAdmin))
	require('apps/traitement_'.$_GET['page_admin'].'.php');

$page_adminList=array();
if(isset($_GET['page_admin']) && in_array($_GET['page_admin'], $page_adminList))
	$page_admin=$_GET['page_admin'];

//si requete ajax on ne passe pas par skel et content
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
	require('apps/'.$page.'.php');
}else{
	require('apps/skel.php');
}
?>