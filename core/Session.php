<?php

class Session
{
    private const SESSION_TIMEOUT = 60;

    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['LAST_ACTIVITY'])) {
            $inactive = time() - $_SESSION['LAST_ACTIVITY'];
            if ($inactive > self::SESSION_TIMEOUT) {
                self::destroy();
                session_start();
            }
        }

        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function flash(string $key, $value = null)
    {
        if ($value === null) {
            if (isset($_SESSION['flash'][$key])) {
                $val = $_SESSION['flash'][$key];
                unset($_SESSION['flash'][$key]);
                return $val;
            }
            return null;
        } else {
            $_SESSION['flash'][$key] = $value;
        }
    }

    public static function destroy(): void
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
    }
}