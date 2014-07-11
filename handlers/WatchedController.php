<?php 

class WatchedController{

	public function delete(){
		global $bdd;
		$req = $bdd->prepare("UPDATE watch SET watched = 'false' WHERE watch_id = :watch_id");
		$req->execute(array('watch_id' => $_POST['watch_id']));
		//API::status(204);
	}

}

?>