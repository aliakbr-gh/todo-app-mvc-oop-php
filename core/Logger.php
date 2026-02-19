<?php

class Logger
{
    public static function request(): void
    {
        self::log();
    }

    private static function log(): void
    {
        $payload = self::payload();

        if (defined('LOG_FILE_ENABLED') && LOG_FILE_ENABLED) {
            self::writeFile($payload);
        }

        if (defined('LOG_DB_ENABLED') && LOG_DB_ENABLED) {
            self::writeDatabase($payload);
        }
    }

    private static function payload(): array
    {
        return [
            'timestamp' => date('Y-m-d H:i:s'),
            'user_id' => Session::get('user_id'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? null,
            'method' => $_SERVER['REQUEST_METHOD'] ?? null,
            'path' => parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH),
        ];
    }

    private static function writeFile(array $payload): void
    {
        $path = defined('LOG_FILE_PATH') ? LOG_FILE_PATH : (BASE_PATH . '/storage/logs/app.log');
        $dir = dirname($path);

        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }

        $line = sprintf(
            "[%s] user_id=%s ip=%s method=%s path=%s\n",
            $payload['timestamp'],
            (string) ($payload['user_id'] ?? 'null'),
            (string) ($payload['ip'] ?? 'null'),
            (string) ($payload['method'] ?? 'null'),
            (string) ($payload['path'] ?? 'null')
        );

        @file_put_contents($path, $line, FILE_APPEND);
    }

    private static function writeDatabase(array $payload): void
    {
        try {
            $db = Database::getInstance();
            $stmt = $db->prepare(
                "INSERT INTO app_logs (user_id, ip, method, path, created_at)
                 VALUES (?, ?, ?, ?, NOW())"
            );
            $stmt->execute([
                $payload['user_id'],
                $payload['ip'],
                $payload['method'],
                $payload['path'],
            ]);
        } catch (Throwable $e) {
            // Skip DB logging failures to avoid breaking requests.
        }
    }
}
