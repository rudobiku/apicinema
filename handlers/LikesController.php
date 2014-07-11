<?php 

class LikesController{

	public function get($id){
		global $bdd;
		$req = $bdd->prepare("SELECT * FROM likes WHERE user_id = :user_id AND like_movie = 'true'");
		$req->execute(array('user_id' => $id));

		$dislikes = array();
		while($dislike = $req->fetch()){
			$dislikes[] = $dislike;
		}

		echo json_encode($dislikes);
		//API::status(200);
	}

	public function post(){
		if(isset($_POST['like_movie']) && is_bool($_POST['like_movie'])
			 && $_POST['user_id'] > 0 && $_POST['movie_id'] > 0 
			 && isset($_POST['user_id']) && isset($_POST['movie_id'])){
		global $bdd;

		$req1 = $bdd->prepare("SELECT * FROM likes WHERE user_id = :user_id AND movie_id = :movie_id");
		$req1->execute(array('user_id' => $_POST['user_id'], 'movie_id' => $_POST['movie_id']));

		if ($requete->fetch() == false){

		$req2 = $bdd->prepare('INSERT INTO likes(user_id, movie_id, like_movie) VALUES(:user_id, :movie_id, :like_movie)');
		$req2->execute(array('user_id' => $_POST['user_id'], 'movie_id' => $_POST['movie_id'], 'like_movie' => $_POST['like_movie']));

		}else{

		$req3 = $bdd->prepare("UPDATE likes SET like_movie = :like_movie, dislike_movie = 'false' WHERE user_id = :user_id AND movie_id = :movie_id");
		$req3->execute(array(
			'user_id' => $_POST['user_id'], 
			'movie_id' => $_POST['movie_id'], 
			'like_movie' => $_POST['like_movie']));
		}

		//API::status(200);
		} else {
        //API::status(400);
        }
	}

}

