<?php

class Controller
{
    protected function view(string $view, array $params = []): void
    {
        View::render($view, $params);
    }

    protected function redirect(string $path): void
    {
        header("Location: " . BASE_URL . $path);
        exit;
    }

    protected function requireAuth(): void
    {
        if (!Auth::check()) {
            Session::flash('error', 'Please login first.');
            $this->redirect('/login');
        }
    }

    protected function requireGuest(): void
    {
        if (Auth::check()) {
            $this->redirect('/todos');
        }
    }

    protected function requireRole(array $roles): void
    {
        $this->requireAuth();
        $user = Auth::user();
        $role = $user['role'] ?? 'user';

        if (!in_array($role, $roles, true)) {
            http_response_code(403);
            $this->view('errors/forbidden', [
                'requiredRoles' => $roles,
                'currentRole' => $role,
            ]);
            exit;
        }
    }

    protected function currentUserId(): int
    {
        return (int) Auth::id();
    }
}
