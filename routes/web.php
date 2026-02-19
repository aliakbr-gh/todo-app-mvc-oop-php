<?php

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
