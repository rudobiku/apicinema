<?php 

class WatchedlistController{

	public function get(){
		global $bdd;
		$req = $bdd->prepare('SELECT * FROM watch WHERE user_id = :user_id');
		$req->execute(array('user_id' => $_POST['user_id']));

		$liste = array();
		while($watch = $req->fetch()){
			$liste[] = $watch;
		}

		echo json_encode($liste);
		API::status(200);
	}

	public function post(){
		if(isset($_POST['user_id']) && isset($_POST['movie_id'])){
		global $bdd;
		$req1 = $bdd->prepare("SELECT * FROM watch WHERE user_id = :user_id AND movie_id = :movie_id");
		$req1->execute(array('user_id' => $_POST['user_id'], 'movie_id' => $_POST['movie_id']));

		if ($requete->fetch() == false){		
		$req = $bdd->prepare('INSERT INTO watch(user_id, movie_id, watched, watchlist) VALUES(:user_id, :movie_id, :watched, :watchlist)');
		$req->execute(array(
			'user_id' => $_POST['user_id'], 'movie_id' => $_POST['movie_id'],
			'watched' => 'true', 'watchlist' => 'false'));
		}else{
		$req3 = $bdd->prepare("UPDATE watch SET watchlist = 'true' WHERE user_id = :user_id AND movie_id = :movie_id");
		$req3->execute(array(
			'user_id' => $_POST['user_id'], 
			'movie_id' => $_POST['movie_id']));
		}

		API::status(200);
		} else {
        API::status(400);
        }

	}

}

