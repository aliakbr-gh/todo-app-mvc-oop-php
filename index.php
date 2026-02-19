<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Session.php';
require_once __DIR__ . '/core/Logger.php';
require_once __DIR__ . '/core/Auth.php';
require_once __DIR__ . '/core/Authorization.php';
require_once __DIR__ . '/core/View.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Middleware.php';
require_once __DIR__ . '/core/Router.php';

// Models
require_once __DIR__ . '/app/models/User.php';
require_once __DIR__ . '/app/models/Todo.php';

// Controllers
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/TodoController.php';

Session::start();

$router = new Router();

// Auth routes
$router->get('/login', [AuthController::class, 'showLogin'], [Middleware::guest()]);
$router->post('/login', [AuthController::class, 'login'], [Middleware::guest()]);
$router->get('/register', [AuthController::class, 'showRegister'], [Middleware::guest()]);
$router->post('/register', [AuthController::class, 'register'], [Middleware::guest()]);
$router->get('/logout', [AuthController::class, 'logout'], [Middleware::auth()]);

// Todo routes
$router->get('/', [TodoController::class, 'index'], [Middleware::auth(), Middleware::role(['admin', 'manager'])]);
$router->get('/todos', [TodoController::class, 'index'], [Middleware::auth(), Middleware::role(['admin', 'manager'])]);
$router->get('/todos/create', [TodoController::class, 'createForm'], [Middleware::auth()]);
$router->post('/todos', [TodoController::class, 'store'], [Middleware::auth()]);
$router->get('/todos/edit', [TodoController::class, 'editForm'], [Middleware::auth()]);
$router->post('/todos/update', [TodoController::class, 'update'], [Middleware::auth()]);
$router->post('/todos/delete', [TodoController::class, 'destroy'], [Middleware::auth()]);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
