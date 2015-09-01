<?php
class UserManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function create($login,$email,$password,$avatar,$date,$description)
	{
		$request="INSERT INTO user (login,email,password,avatar,date,description) VALUES ('".$login."','".$email."','".$password."','".$avatar."','".$date."','".$description."')";	
		$res= mysqli_query($this->link, $request);
			if ($res === false)
			{
				$error="une erreur est survenue";
				return $error;
			}
			else
			{
				$success="Bienvenu parmis nous !";
				return $success;
			}
	}
	public function delete($id)
	{
		$request="UPDATE user SET id_permission='4' WHERE id='".$id."'";
		$res= mysqli_query($this->link, $request);
			if ($res === false)
			{
				$error="une erreur est survenue";
				return $error;
			}
			else
			{
				$success="Ce compte a bien été désactivé";
				return $success;
			}
	}
	public function update($id, $email, $password, $login, $description, $avatar)
	{
		$request = "UPDATE user SET name='".$name."', firstname='".$firstname."', email='".$email."', password='".$password."' WHERE user.id = ".$id.";";
		$res = mysqli_query($this->link, $request);
		if ($res === false){
			$message = mysqli_error($this->link);
			$code = mysqli_errno($this->link);
			if($code == 1062){
				$prob = substr($message, -6, -1);
				if($prob == "email"){
					$error="email non valide";
					return $error;
				}
				else
				{
					$error="une erreur est survenue";
					return $error;
				}
			}
		}
		else
		{	
			$success="Vos modifications ont bien été prises en compte";
			return $success;
		}
	}
	public function selectById($id)
	{
		$request = "SELECT * FROM user WHERE id='".$id."'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		$user = mysqli_fetch_object($res);
		$resultat[] = $user;
		return $resultat;
	}
	public function selectByLogin($login)
	{
		$request = "SELECT * FROM user WHERE login='".$login."'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		$user = mysqli_fetch_object($res);
		$resultat = $user;
		return $resultat;
	}
	public function selectAll()
	{
		$request = "SELECT * FROM user";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($user = mysqli_fetch_object($res))
		{
			$resultat[] = $user;
		}
		return $resultat;
	}
}
?>