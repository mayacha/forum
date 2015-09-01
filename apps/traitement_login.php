<?php
// initialisation des variables pour l'affichage du formulaire de connexion (pour partie AJAX)
$errorEmail = "";
$errorPw = "";
$email = "";
// si le formulaire est envoyé
if(isset($_POST['email'], $_POST['password'])){
	require('apps/users.php');
	$email= mysqli_real_escape_string($link, $_POST['email']);
	// si le mail est valide ou que l'utilisateur est "admin" (pas de mail)
	if(filter_var($email, FILTER_VALIDATE_EMAIL) || $email == "admin"){
		// on récupère l'utilisateur correspondant à l'adresse mail
		$result = getUserByEmail($link, $email);
		if ($result === false){
			$error = "Erreur";
		}else{
			// si on a bien un résultat pour l'adresse mail
			if($res = mysqli_fetch_assoc($result)){
				// si le mot de passe est correct
				if(password_verify($_POST['password'], $res['password'])){
					// on initialise les données de la session
					$_SESSION['email'] = $email;
					$_SESSION['id_user'] = $res['id'];
					$_SESSION['permission'] = $res['perm_name'];
					// on recharge la page actuelle
					if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
						echo "reload";
						exit;
					}else{
						header('Location: home');
						exit;
					}
				}else{ // sinon le mot de passe est incorrect, on met à jour le formulaire avec les erreurs
					$error = "Mot de passe incorrect.";
					$errorPw = "has-error";
					if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
						require('views/navbar-login.phtml');
						exit;
					}
				}
			}else{ // sinon le mail est incorrect, on met à jour le formulaire avec les erreurs
				$error = "Email incorrect.";
				$errorEmail = "has-error";
				if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
					require('views/navbar-login.phtml');
					exit;
				}
			}
		}
	}else{ // sinon le format de l'adresse mail est incorrect
		$error = "Format d'Email incorrect.";
		$errorEmail = "has-error";
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
			require('views/navbar-login.phtml');
			exit;
		}
	}
	
}
?>

