<?php

class Auth
{
    private static ?array $cachedUser = null;
    private static bool $userLoaded = false;

    public static function check(): bool
    {
        return self::user() !== null;
    }

    public static function id(): ?int
    {
        $userId = Session::get('user_id');
        return $userId ? (int) $userId : null;
    }

    public static function user(): ?array
    {
        if (self::$userLoaded) {
            return self::$cachedUser;
        }

        self::$userLoaded = true;

        $id = Session::get('user_id');
        if (!$id || !is_numeric((string) $id)) {
            self::$cachedUser = null;
            return null;
        }

        $userModel = new User();
        $user = $userModel->findById((int) $id);
        if (!$user) {
            Session::remove('user_id');
            self::$cachedUser = null;
            return null;
        }

        self::$cachedUser = $user;
        return self::$cachedUser;
    }

    public static function login(array $user): void
    {
        Session::regenerate(true);
        Session::set('user_id', (int) $user['id']);
        self::$cachedUser = $user;
        self::$userLoaded = true;
    }

    public static function logout(): void
    {
        self::$cachedUser = null;
        self::$userLoaded = false;
        Session::destroy();
    }
}
