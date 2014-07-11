<?php 

class WatchController{

	public function delete(){
		global $bdd;
		$req = $bdd->prepare("UPDATE watch SET watchlist = 'false' WHERE watch_id = :watch_id");
		$req->execute(array('watch_id' => $_POST['watch_id']));
		//API::status(204);
	}

}

?>