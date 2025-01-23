<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (array_key_exists($uri, $this->routes)) {
            call_user_func($this->routes[$uri]);
        } else {
            http_response_code(404);
            echo "404 - Page Not Found";
        }
    }
}