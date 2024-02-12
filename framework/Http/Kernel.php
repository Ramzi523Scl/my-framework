<?php

namespace MyFramework\Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{

    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include BASE_PATH . '/routes/web.php';

            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }
        });

        $method = $request->getMethod();
        $uri = $request->getPath();

        [$status, [$controller, $action], $vars] = $dispatcher->dispatch($method, $uri);
        $response = call_user_func_array([new $controller, $action], $vars);
        return $response;
    }
}