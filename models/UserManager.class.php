<?php
require('models/User.class.php');
class UserManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function create($info)
	{
		if(isset($info['login'],$info['email'],$info['password'],$info['birthdate'],$info['description'],$info['avatar']))
		{
			$login=mysqli_real_escape_string($this->link, $user->getLogin());
			$email=mysqli_real_escape_string($this->link, $user->getEmail());
			$password=setPassword();
			$birthdate=mysqli_real_escape_string($this->link, $user->getBirthdate());
			$description=mysqli_real_escape_string($this->link, $user->getDescription());
			$avatar=mysqli_real_escape_string($this->link, $user->getAvatar());

			$request="INSERT INTO user (login,email,password,avatar,birthdate,description) VALUES ('".$login."','".$email."','".$password."','".$avatar."','".$birthdate."','".$description."')";	
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
	}
	public function update($user)
	{
		$login=mysqli_real_escape_string($this->link, $user->getLogin());
		$email=mysqli_real_escape_string($this->link, $user->getEmail());
		$password=modifPassword();
		$birthdate=mysqli_real_escape_string($this->link, $user->getBirthdate());
		$description=mysqli_real_escape_string($this->link, $user->getDescription());
		$avatar=mysqli_real_escape_string($this->link, $user->getAvatar());

		$request = "UPDATE user SET login='".$login."',email='".$email."', password='".$password."',birthdate='".$birthdate."',description='".$description."',avatar='".$avatar."' WHERE id = ".$id.";";
		$res = mysqli_query($this->link, $request);
		if ($res === false){
			$message = mysqli_error($this->link);
			$code = mysqli_errno($this->link);
			if($code == 1062){
				$prob = substr($message, -6, -1);
				if($prob == "email")
				{
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
		$request = "SELECT * FROM user WHERE id='".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		$user = mysqli_fetch_object($res, 'User', array($this->link));
		if($user==null)
		{
			throw new Exception("Cet identifiant n'existe pas");
		}
		else
		{
			return $user;
		}
	}
	public function selectByLogin($login)
	{
		$request = "SELECT * FROM user WHERE login='".$login."'";
		$res = mysqli_query($this->link, $request);
		$user = mysqli_fetch_object($res, 'User', array($this->link));
		if($user==null)
		{
			throw new Exception("Ce login n'existe pas");
		}
		else
		{
			return $user;
		}
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
	//Pour connaitre le niveau de permission
	public function getPermissionLevel($id_permission){
		if($id_permission==1){
			return $permissionLevel="admin";
		}
		if($id_permission==2){
			return $permissionLevel="moderateur";
		}
		if($id_permission==3){
			return $permissionLevel="membre";
		}
		if($id_permission==4){
			return $permissionLevel="deleted";
			throw new Exception("Vous avez demandé la suppression de votre compte");
		}
	}

	//Pour désactiver un compte
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
	//Pour bannir un utilisateur
	// public function ban()
	// {
	// 	$Request="INSERT INTO ban "
	// }
}
?>