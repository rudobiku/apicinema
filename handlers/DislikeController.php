<?php 

class DislikeController{

	public function delete($user_id, $movie_id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM likes WHERE user_id = :user_id AND movie_id = :movie_id');
		$req->execute(array('user_id' => $user_id, 'movie_id' => $movie_id));
		API::status(204);
	}

}

