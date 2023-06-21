<?php
use Controller\EspecialistController;

require './../includes/app.php';
error();

use Controller\LoginController;
use MVC\Router;

header("Access-Control-Allow-Origin: *");

// require 'Router.php';

$router = new Router;

// Login, signup
$router->post('/api/login', [LoginController::class, 'login']);
$router->post('/api/signup', [LoginController::class, 'signup']);
$router->get('/', [LoginController::class, 'index']);

// datos
$router->get('/api/especialista', [EspecialistController::class, 'especialist']);

$router->comprobarRutas();