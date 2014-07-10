<?php

class UsersController{

	public function get(){
		global $bdd;
		$req = $bdd->query('SELECT * FROM users');

		$users = array();
		while($user = $req->fetch()){
			$users[] = $user;
		}

		echo json_encode($users);
		API::status(200);
	}

	public function post(){
		if(isset($_POST['username']) && strlen(trim($_POST['username']))){
		
		global $bdd;
		$req = $bdd->prepare('INSERT INTO users(username) VALUES(:username)')
		$req->execute(array('username' => $_POST['username']));
		API::status(200);
		
		} else {
        	API::status(400);
        }
	}
}