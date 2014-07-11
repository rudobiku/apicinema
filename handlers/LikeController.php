<?php 

class LikeController{

	public function delete($user, $movie){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM likes WHERE user_id = :user_id AND movie_id = :movie_id');
		$req->execute(array('user_id' => $_POST['user_id'], 'movie_id' => $_POST['movie_id']));
		//API::status(204);
	}

}

