<?php

class Middleware
{
    public static function auth(): callable
    {
        return function (): void {
            if (!Auth::check()) {
                Session::flash('error', 'Please login first.');
                header("Location: " . BASE_URL . '/login');
                exit;
            }
        };
    }

    public static function guest(): callable
    {
        return function (): void {
            if (Auth::check()) {
                header("Location: " . BASE_URL . '/todos');
                exit;
            }
        };
    }

    public static function role(array $roles): callable
    {
        return function () use ($roles): void {
            if (!Auth::check()) {
                Session::flash('error', 'Please login first.');
                header("Location: " . BASE_URL . '/login');
                exit;
            }

            $user = Auth::user();
            $role = $user['role'] ?? 'user';

            if (!in_array($role, $roles, true)) {
                http_response_code(403);
                View::render('errors/forbidden', [
                    'requiredRoles' => $roles,
                    'currentRole' => $role,
                ]);
                exit;
            }
        };
    }
}
