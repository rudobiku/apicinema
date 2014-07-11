<?php

/* header('content-type: application/json; charset=utf-8'); */

require("connexion.php");
require("api.php");
require("libs/toro.php");

require("handlers/MovieController.php");
require("handlers/MoviesController.php");

require("handlers/UserController.php");
require("handlers/UsersController.php");

require("handlers/LikeController.php");
require("handlers/LikesController.php");

require("handlers/DislikeController.php");
require("handlers/DislikesController.php");

require("handlers/WatchController.php");
require("handlers/WatchlistController.php");

require("handlers/WatchedController.php");
require("handlers/WatchedlistController.php");


/*
function loadClass($class){
	require 'handlers/' . $class . 'Controller.php';
}

spl_autoload_register('loadClass'); */

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
    '/v1/movies' => 'MoviesController',
    '/v1/movies/:number' => 'MovieController',
    '/v1/users' => 'UsersController',
    '/v1/users/:number' => 'UserController',
    '/v1/users/:number/dislikes' => 'DislikesController',
    '/v1/users/:number/dislikes/:number' => 'DislikesController',
    '/v1/users/:number/dislikes/:number' => 'DislikeController',
    '/v1/users/:number/likes' => 'LikesController',
    '/v1/users/:number/likes/:number' => 'LikesController',
    '/v1/users/:number/likes/:number' => 'LikeController',
    '/v1/users/:number/watchlist' => 'WatchlistController',
    '/v1/users/:number/watchlist/:number' => 'WatchlistController',
    '/v1/users/:number/watchlist/:number' => 'WatchController',
    '/v1/users/:number/watched' => 'WatchedlistController',
    '/v1/users/:number/watched/:number' => 'WatchedlistController',
    '/v1/users/:number/watched/:number' => 'WatchedController'
));
