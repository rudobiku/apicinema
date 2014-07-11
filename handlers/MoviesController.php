<?php

class MoviesController{

	public function get(){
		global $bdd;
		$req = $bdd->query('SELECT * FROM movies');

		$movies = array();
		while($movie = $req->fetch()){
			$movies[] = $movie;
		}

		echo json_encode($movies);
		API::status(200);
	}

	public function post(){
		 if(isset($_POST['title']) && isset($_POST['genre']) && $_POST['src'] &&
            strlen(trim($_POST['title'])) > 0 && strlen(trim($_POST['genre'])) > 0){

			global $bdd;
			$req = $bdd->prepare('INSERT INTO movies(title, src, genre) VALUES(:title, :src, :genre)');
			$req->execute(array('title' => $_POST['title'], 'src' => $_POST['src'], 'genre' => $_POST['genre']));

			API::status(200);
        }
        else{
        	API::status(400);
        }
	}
}