<?php
define('BASE_PATH', dirname(__DIR__));
define('DB_HOST', 'localhost');
define('DB_NAME', 'todo_mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('BASE_URL', '/mvc');

// Session config
define('SESSION_TIMEOUT', 1200);

// Logging config
define('LOG_FILE_ENABLED', true);
define('LOG_DB_ENABLED', true);
define('LOG_FILE_PATH', BASE_PATH . '/storage/logs/app.log');

// Rate limiter config
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_PER_SECOND', 5);
define('RATE_LIMIT_BLOCK_SECONDS', 300);
define('RATE_LIMIT_STORAGE_PATH', BASE_PATH . '/storage/rate-limit');
