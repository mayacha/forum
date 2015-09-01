<?php
class User{
	// propriétés
	private $id;
	private $login;
	private $email;
	private $password;
	private $avatar;
	private $birthdate;
	private $description;
	private $id_permission;
	private $date_register;

	// getter
	public function getId(){
		return $this->id;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getAvatar(){
		return $this->avatar;
	}
	public function getDate(){
		return $this->birthdate;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getIdPermission(){
		return $this->id_permission;
	}
	public function getDateRegister(){
		return $this->date_register;
	}

	// setter
	public function setLogin($login){
		if (strlen($login) > 3){
			$this->login = $login;
		}else{
			throw new Exception("Le login doit contenir 4 caractères minimum.");
		}
	}
	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)==false)
		{
			throw new Exception("Votre email n'est pas valide");
		}
		else
		{
			$this->email = $email;
		}
	}
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
	public function setBirthdate($birthdate){
		$this->date = $birthdate;
	}
	public function setDescrition($description){
		$this->description = $description;
	}
	public function setIdPermission($id_permission){
		$this->id_permission = $id_permission;
	}

	// other
	public function verifPassword($password){
		$res=password_verify($password, $this->password);
		if($res==false)
		{
			throw new Exception("Mot de passe incorrect");
		}

	}
	public function setPassword($password){
		if (strlen($password) > 5)
		{
			$this->password = password_hash($password, PASSWORD_BCRIPT, array("cost"=>11));
		}
		else
		{
			throw new Exception("Le mot de passe doit contenir 6 caractères minimum.");
		}
	}
	public function modifPassword($oldPassword, $newPassword){
		if (strlen($password) > 5){
			if($this->verifPassword($oldPassword)){
				$this->password = password_hash($newPassword, PASSWORD_BCRIPT, array("cost"=>11));
			}
			else
			{
				throw new Exception("Votre mot de passe actuel est incorrect...");
			}
		}

		else
		{
			throw new Exception("Le mot de passe doit contenir 6 caractères minimum.");
		}
	}
}
?>