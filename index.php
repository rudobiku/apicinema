<?php

header('content-type: application/json; charset=utf-8');

require("connexion.php");
require("libs/toro.php");

/* require("controllers/MovieController.php");
require("controllers/MoviesController.php");
require("controllers/UsersController.php");
require("controllers/UserController.php");
require("controllers/GenresController.php"); */

function loadClass($class){
	require 'handlers/' . $class . 'Controller.php';
}

spl_autoload_register('loadClass');

ToroHook::add('400', function() {
	API::status(400);
	API::error(400, 'Bad Request');
});
ToroHook::add('401', function() {
	API::status(401);
	API::error(401, 'Unauthorized');
});
ToroHook::add('403', function() {
	API::status(403);
	API::error(403, 'Forbidden');
});
ToroHook::add('404', function() {
	API::status(404);
	API::error(404, 'Not Found');
});
ToroHook::add('500', function() {
	API::status(500);
	API::error(500, 'Internal Server Error');
});

Toro::serve(array(
    '/v1/movies' => 'Movies',
    '/v1/movies/:number' => 'Movie',
    '/v1/users' => 'Users',
    '/v1/users/:number' => 'User',
    '/v1/users/:number/dislikes' => 'Dislikes',
    '/v1/users/:number/dislikes/:number' => 'Dislikes',
    '/v1/users/:number/dislikes/:number' => 'Dislike',
    '/v1/users/:number/likes' => 'Likes',
    '/v1/users/:number/likes/:number' => 'Likes',
    '/v1/users/:number/likes/:number' => 'Like',
    '/v1/users/:number/watchlist' => 'Watchlist',
    '/v1/users/:number/watchlist/:number' => 'Watchlist',
    '/v1/users/:number/watchlist/:number' => 'Watch',
    '/v1/users/:number/watched' => 'Watchedlist',
    '/v1/users/:number/watched/:number' => 'Watchedlist',
    '/v1/users/:number/watched/:number' => 'Watched'
));
