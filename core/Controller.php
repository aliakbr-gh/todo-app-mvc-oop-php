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
}