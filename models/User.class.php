<?php
class User{
	// propriétés
	private $id;
	private $login;
	private $email;
	private $password;
	private $avatar;
	private $date;
	private $description;
	private $id_permission;

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
		return $this->date;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getIdPermission(){
		return $this->id_permission;
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
		$this->email = $email;
	}
	public function setAvatar($avatar){
		$this->avatar = $avatar;
	}
	public function setDate($date){
		$this->date = $date;
	}
	public function setDescrition($description){
		$this->description = $description;
	}
	public function setIdPermission($id_permission){
		$this->id_permission = $id_permission;
	}

	// other
	public function verifPassword($password){
		return password_verify($password, $this->password);
	}
	public function modifPassword($oldPassword, $newPassword){
		if (strlen($password) > 5){
			if($this->verifPassword($oldPassword)){
				$this->password = password_hash($newPassword, PASSWORD_BCRIPT, array("cost"=>11));
			}else{
				return false;
			}
		}else{
			throw new Exception("Le mot de passe doit contenir 6 caractères minimum.");
		}
	}
}
?>