<?php
class UserManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function create($user)
	{
		$login=mysqli_real_escape_string($this->link, $user->getLogin());
		$email=mysqli_real_escape_string($this->link, $user->getEmail());
		$password=mysqli_real_escape_string($this->link, $user->getPassword());
		

		$request="INSERT INTO user (login,email,password) VALUES ('".$login."','".$email."','".$password."')";	
		echo $request;
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
	public function update($user)
	{
		$id=mysqli_real_escape_string($this->link, $user->getId());
		$login=mysqli_real_escape_string($this->link, $user->getLogin());
		$email=mysqli_real_escape_string($this->link, $user->getEmail());
		$password=$user->getPassword();
		$avatar=mysqli_real_escape_string($this->link, $user->getAvatar());
		$birthdate=$user->getBirthdate();
		$description=mysqli_real_escape_string($this->link, $user->getDescription());
		$id_permission=intval($user->getIdPermission());

		$request = "UPDATE user SET login='".$login."',email='".$email."', password='".$password."' ,avatar='".$avatar."', birthdate='".$birthdate."',description='".$description."',id_permission='".$id_permission."' WHERE id = ".$id.";";
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
	public function selectAll(){
		$request = "SELECT * FROM user";
		$res = mysqli_query($this->link, $request);
		if($res){
			$resultat = array();
			while ($user = mysqli_fetch_object($res, 'User', array($this->link)))
			{
				$resultat[] = $user;
			}
			return $resultat;
		}else{
			throw new Exception("Internal server error");
		}
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