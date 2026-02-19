<?php

require_once __DIR__ . '/bootstrap/app.php';
require_once __DIR__ . '/routes/web.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
