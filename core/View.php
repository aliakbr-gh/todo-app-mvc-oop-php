<?php

class View
{
    public static function render(string $view, array $params = []): void
    {
        extract($params);
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';
        $layoutFile = __DIR__ . '/../app/views/layouts/main.php';

        ob_start();
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            echo "View not found: $viewFile";
        }
        $content = ob_get_clean();

        require $layoutFile;
    }
}