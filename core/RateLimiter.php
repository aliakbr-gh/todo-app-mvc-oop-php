<?php

class RateLimiter
{
    public static function enforce(): void
    {
        if (!defined('RATE_LIMIT_ENABLED') || !RATE_LIMIT_ENABLED) {
            return;
        }

        $limitPerSecond = defined('RATE_LIMIT_PER_SECOND') ? (int) RATE_LIMIT_PER_SECOND : 5;
        $blockSeconds = defined('RATE_LIMIT_BLOCK_SECONDS') ? (int) RATE_LIMIT_BLOCK_SECONDS : 300;
        $storagePath = defined('RATE_LIMIT_STORAGE_PATH') ? RATE_LIMIT_STORAGE_PATH : (BASE_PATH . '/storage/rate-limit');

        if ($limitPerSecond < 1) {
            return;
        }

        if (!is_dir($storagePath)) {
            @mkdir($storagePath, 0777, true);
        }

        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $now = time();
        $key = md5($ip);
        $file = rtrim($storagePath, '/') . '/' . $key . '.json';

        $record = self::readRecord($file);
        $window = $now;

        if (($record['blocked_until'] ?? 0) > $now) {
            self::respondTooManyRequests((int) ($record['blocked_until'] - $now));
        }

        $recordWindow = (int) ($record['window'] ?? 0);
        $recordCount = (int) ($record['count'] ?? 0);

        if ($recordWindow === $window) {
            $recordCount++;
        } else {
            $recordWindow = $window;
            $recordCount = 1;
        }

        $record = [
            'window' => $recordWindow,
            'count' => $recordCount,
            'blocked_until' => 0,
        ];

        if ($recordCount > $limitPerSecond) {
            $record['blocked_until'] = $now + $blockSeconds;
            self::writeRecord($file, $record);
            self::respondTooManyRequests($blockSeconds);
        }

        self::writeRecord($file, $record);
    }

    private static function readRecord(string $file): array
    {
        if (!file_exists($file)) {
            return [];
        }

        $raw = @file_get_contents($file);
        if ($raw === false || $raw === '') {
            return [];
        }

        $decoded = json_decode($raw, true);
        return is_array($decoded) ? $decoded : [];
    }

    private static function writeRecord(string $file, array $record): void
    {
        @file_put_contents($file, json_encode($record, JSON_UNESCAPED_SLASHES));
    }

    private static function respondTooManyRequests(int $retryAfter): void
    {
        http_response_code(429);
        header('Retry-After: ' . max(1, $retryAfter));
        View::render('errors/rate-limit', [
            'retryAfter' => max(1, $retryAfter),
        ]);
        exit;
    }
}
