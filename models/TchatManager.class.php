<?php
class TchatManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	/**
	*   Recherche sur l'id
	*
	*   @param Integer $id
	*   @return Chat $chat
	*/
	public function selectById($id)
	{
		$request = "SELECT * FROM chat WHERE id = '".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		if($res){
			$chat = mysqli_fetch_object($res, 'Tchat', array($this->link));
			return $chat;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}

	/**
	*   Recherche les 100 derniers messages du chat
	*
	*   @return Array $listMessage
	*/
	public function selectLasts(){
		$request="SELECT * FROM chat ORDER BY id DESC LIMIT 100";
		$res = mysqli_query($this->link, $request);
		if($res){
			$listMessage = array();
			while($message = mysqli_fetch_object($res, 'Tchat', array($this->link))){
				$listMessage[] = $message;
			}
			return $listMessage;
		}else{
			throw new Exception("Erreur : Votre requête n'a pas abouti.");
		}
	}

	/**
	*   Creation message
	*
	*   @param Chat $chat
	*   @return Chat $chat
	*/
	public function create($chat){
		$message = mysqli_real_escape_string($this->link, $chat->getAttr("message"));
		$id_user = intval($chat->getAttr("id_user"));
		$request = "INSERT INTO chat (message, id_user) VALUES ('".$message."', '".$id_user."')";
		$res = mysqli_query($this->link, $request);
		if($res){
			return $this->selectById(mysqli_insert_id($this->link));
		}else{
			throw new Exception ("Erreur : Votre requête n'a pas abouti.");
		}
	}
}
?>