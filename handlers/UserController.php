<?php

class UserController{

	public function get($id){
		global $bdd;
		$req = $bdd->prepare('SELECT * FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $id));

		$user = $req->fetch();
		echo $user['username']; 

		//API::status(200);
	}

	public function put($id){
		global $bdd;
		$req = $bdd->prepare('UPDATE users SET username = :username WHERE user_id = :user_id');
		$req->execute(array('username' => $_POST['username'], 'user_id' => $id));
	}

	public function delete($id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $id));
		//API::status(204);
	}
}