<?php

class UserController{

	public function get($id){

		$users = get_user_by_id($id);


		global $bdd;
		$req = $bdd->prepare('SELECT * FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $id));

		$user = $req->fetch();

		echo json_encode($user, JSON_PRETTY_PRINT); 

		API::status(200);
	}

	public function put($user_id){
		global $bdd;
		$req = $bdd->prepare('UPDATE users SET username = :username WHERE user_id = :user_id');
		$req->execute(array('username' => $_POST['username'], 'user_id' => $user_id));
	}

	public function delete($user_id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM users WHERE user_id = :user_id');
		$req->execute(array('user_id' => $user_id));
		API::status(204);
	}
}