<?php

require './../includes/app.php';
error();

use Controller\LoginController;
use MVC\Router;


// require 'Router.php';

$router = new Router;

// Login, signup
$router->post('/api/login', [LoginController::class, 'login']);
$router->post('/api/signup', [LoginController::class, 'signup']);
$router->get('/', [LoginController::class, 'index']);

$router->comprobarRutas();