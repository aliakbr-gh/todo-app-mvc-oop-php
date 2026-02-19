<?php

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $path, callable|array $handler, array $middleware = []): void
    {
        $this->routes['GET'][$path] = [
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function post(string $path, callable|array $handler, array $middleware = []): void
    {
        $this->routes['POST'][$path] = [
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function dispatch(string $method, string $uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = str_replace(BASE_URL, '', $path);
        if ($path === '') $path = '/';

        RateLimiter::enforce();
        Logger::request();

        $route = $this->routes[$method][$path] ?? null;

        if (!$route) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        foreach ($route['middleware'] as $middleware) {
            if (is_callable($middleware)) {
                $middleware();
            }
        }

        $handler = $route['handler'];

        if (is_array($handler)) {
            [$class, $methodName] = $handler;
            $controller = new $class();
            return $controller->$methodName();
        } else {
            return call_user_func($handler);
        }
    }
}
