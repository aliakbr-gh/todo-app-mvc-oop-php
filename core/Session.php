<?php

class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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

    // Flash messages for toaster
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
        session_destroy();
    }
}