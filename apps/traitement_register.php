<?php
$name='';
$firstname='';
$email='';

if(isset($_POST["name"],$_POST["firstname"],$_POST["email"],$_POST["password"],$_POST["check-password"]))
{
	if ($_POST["name"]!="")
	{	
		$name=$_POST['name'];

		if ($_POST["firstname"]!="")
		{
			$firstname=$_POST['firstname'];

			if ($_POST["email"]!="")
			{
				$email=$_POST['email'];

				if($_POST["password"]!="" && $_POST["check-password"]!="")
				{

					if ($_POST["password"] == $_POST['check-password'])
					{
						$name=mysqli_real_escape_string($link,$_POST['name']);
						$firstname=mysqli_real_escape_string($link,$_POST['firstname']);
						$email=mysqli_real_escape_string($link,$_POST['email']);
						$password= password_hash($_POST['password'],PASSWORD_BCRYPT );

						$request = "INSERT INTO user (name, firstname, email, password) VALUES('".$name."', '".$firstname."', '".$email."', '".$password."')";
						$res = mysqli_query($link, $request);
							
							if ($res === false)
							{
								$error="Une erreur est survenue, merci de recommencer";
							}
							else
							{
								$name='';
								$firstname='';
								$email='';
								$success="Bienvenu parmis nous !";
							}
					}
					else
					{
						$error="les deux mots de passe saisis ne sont pas identiques...";
					}
				}
				else
				{
					$error="les champs mots de passe sont mal renseignés";
				}
			}
			else
			{
				$error="le champ email n'est pas renseigné";
			}
		}
		else
		{
			$error="Votre prénom n'est pas renseigné";
		}	
	}
	else
	{
		$error="Votre nom n'est pas renseigné";
	}
}	
?>
