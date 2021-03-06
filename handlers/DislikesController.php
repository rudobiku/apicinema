<?php 

class DislikesController{

	public function get($id){
		global $bdd;
		$req = $bdd->prepare("SELECT * FROM likes WHERE user_id = :user_id AND dislike_movie = 'true'");
		$req->execute(array('user_id' => $id));

		$dislikes = array();
		while($dislike = $req->fetch()){
			$dislikes[] = $dislike;
		}

		echo json_encode($dislikes);
		API::status(200);
	}

	public function post($user_id, $movie_id){

		global $bdd;

		$req1 = $bdd->prepare("SELECT * FROM likes WHERE user_id = :user_id AND movie_id = :movie_id");
		$req1->execute(array('user_id' => $user_id, 'movie_id' => $movie_id));

		if ($requete->fetch() == false){

		$req2 = $bdd->prepare('INSERT INTO likes(user_id, movie_id, dislike_movie) VALUES(:user_id, :movie_id, :dislike_movie)');
		$req2->execute(array('user_id' => $user_id, 'movie_id' => $movie_id, 'dislike_movie' => 'true'));

		}else{

		$req3 = $bdd->prepare("UPDATE likes SET dislike_movie = :dislike_movie, like_movie = 'false' WHERE user_id = :user_id AND movie_id = :movie_id");
		$req3->execute(array(
			'user_id' => $user_id, 
			'movie_id' => $movie_id, 
			'dislike_movie' => 'true'));
		}

		API::status(200);
	}

}

