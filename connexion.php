<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=apicinema', 'root', '');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

?>