<?php
define('BASE_PATH', dirname(__DIR__));
define('DB_HOST', 'localhost');
define('DB_NAME', 'todo_mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('BASE_URL', '/mvc');

// Session config
define('SESSION_TIMEOUT', 1);

// Logging config
define('LOG_FILE_ENABLED', true);
define('LOG_DB_ENABLED', true);
define('LOG_FILE_PATH', BASE_PATH . '/storage/logs/app.log');
