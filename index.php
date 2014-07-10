<?php

require("connexion.php");
require("libs/toro.php");
require("components/api.php");
require("controllers/MovieController.php");
require("controllers/MoviesController.php");
require("controllers/UsersController.php");
require("controllers/UserController.php");
require("controllers/GenresController.php");

ToroHook::add("404", function() {
    API::status(404);
	API::error(404, 'Not Found');
});

Toro::serve(array(
    '/movies' => 'MoviesController',
    '/movies/([0-9]+)' => 'MovieController',
    '/users' => 'UsersController',
    '/users/([0-9]+)' => 'UserController',
    '/genres' => 'GenresController',
));
