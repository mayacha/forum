<?php
class UserManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function create()
	{

	}
	public function delete()
	{

	}
	public function update($link, $id, $email, $password, $name, $firstname){
	$request = "UPDATE user SET name='".$name."', firstname='".$firstname."', email='".$email."', password='".$password."' WHERE user.id = ".$id.";";
	$res = mysqli_query($this->link, $request);
	if ($res === false){
		$message = mysqli_error($link);
		$code = mysqli_errno($link);
		if($code == 1062){
			$prob = substr($message, -6, -1);
			if($prob == "email"){
				return "email";
			}else{
				return "error";
			}
		}
	}else{	
		return "success";
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