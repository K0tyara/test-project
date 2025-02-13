<?php

namespace App\Kernel\Router;

use App\Kernel\Http\Redirect;
use App\Kernel\Http\Request;
use App\Kernel\Middleware\AbstractMiddleware;
use App\Kernel\Session;
use App\Kernel\View\View;

class Router
{
    /** @var array{string, Route[]}  * */
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    private readonly View $view;
    private readonly Request $request;
    private readonly Redirect $redirect;
    private readonly Session $session;

    public function __construct(View $view, Request $request, $redirect, $session)
    {
        $this->view = $view;
        $this->request = $request;
        $this->initRoutes();
        $this->redirect = $redirect;
        $this->session = $session;
    }

    public function dispatch(string $url, $method): void
    {
        $route = $this->findRoute($url, $method);
        if (!$route) {
            $this->notFound();
            return;
        }

        if ($route->hasMiddleware()) {
            foreach ($route->middleware as $middleware) {
                /** @var AbstractMiddleware $middleware */
                $middleware = new $middleware($this->request, $this->redirect);
                $middleware->handle();
            }
        }
        if (is_array($route->action)) {
            [$controller, $action] = $route->action;

            $controller = new $controller();

            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setView'], $this->view);

            call_user_func([$controller, $action]);

        } else {
            call_user_func($route->action);
        }
    }


    private function notFound(): void
    {
        echo '404 not found';
    }

    private function findRoute(string $url, string $method): Route|false
    {
        /** @var Route $route */
        if (!isset($this->routes[$method][$url])) {
            return false;
        }

        return $this->routes[$method][$url];
    }

    private function initRoutes(): void
    {
        /** @var Route $route */
        foreach ($this->getRoutes() as $route) {
            $this->routes[$route->method][$route->url] = $route;
        }
    }

    private function getRoutes(): array
    {
        return include_once APP_PATH . '/config/routes.php';
    }
}