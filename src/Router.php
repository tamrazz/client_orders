<?php

namespace Src;

use Src\Responses\Response;

class Router
{
    private array $routes = [];
    private static $instance = null;

    private function __construct() {
        $this->routes = [
            'GET' => [
                '/' => 'Controller@index',
                'orders' => 'OrderController@get',
            ],
            'POST' => [
                'orders/new' => 'OrderController@create',
            ],
        ];
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            $controllerAction = $this->routes[$method][$path];
            [$controller, $action] = explode('@', $controllerAction);
            $controller = 'Src\\Controllers\\' . $controller;
            if (class_exists($controller)) {
                $controllerInstance = new $controller();
                if (method_exists($controllerInstance, $action) && is_callable([$controllerInstance, $action])) {
                    $response = call_user_func([$controllerInstance, $action]);
                    return $response->render();
                }
            }
        }

        Response::make(404)->toHtml();
    }
}
