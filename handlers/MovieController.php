<?php

class MovieController{

	public function get(){
		global $bdd;
		$req = $bdd->prepare('SELECT * FROM movies WHERE movie_id = :movie_id');
		$req->execute(array('movie_id' => $_POST['movie_id']));
		//API::status(200);
	}

	public function put(){
		global $bdd;
		$req = $bdd->prepare('UPDATE movies SET title = :title, src = :src, genre = :genre WHERE movie_id = :movie_id');
		$req->execute(array('title' => $_POST['title'], 'src' => $_POST['src'], 'genre' => $_POST['genre']));
	}

	public function delete($id){
		global $bdd;
		$req = $bdd->prepare('DELETE FROM movies WHERE movie_id = :movie_id');
		$req->execute(array('movie_id' => $_POST['movie_id']));
		//API::status(204);
	}
}