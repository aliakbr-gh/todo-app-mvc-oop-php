<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Session.php';
require_once __DIR__ . '/core/View.php';
require_once __DIR__ . '/core/Controller.php';
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
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

// Todo routes
$router->get('/', [TodoController::class, 'index']);
$router->get('/todos', [TodoController::class, 'index']);
$router->get('/todos/create', [TodoController::class, 'createForm']);
$router->post('/todos', [TodoController::class, 'store']);
$router->get('/todos/edit', [TodoController::class, 'editForm']);
$router->post('/todos/update', [TodoController::class, 'update']);
$router->post('/todos/delete', [TodoController::class, 'destroy']);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
