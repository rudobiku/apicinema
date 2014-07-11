<?php

class UserController{

	public function get(){
		global $bdd;
		$req = $bdd->prepare('SELECT * FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $_POST['user_id']));
		API::status(200);
	}

	public function put(){
		global $bdd;
		$req = $bdd->prepare('UPDATE users SET username = :username WHERE user_id = :user_id');
		$req->execute(array('username' => $_POST['username'], 'user_id' => $_POST['user_id']));
	}

	public function delete(){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $_POST['user_id']));
		API::status(204);
	}
}