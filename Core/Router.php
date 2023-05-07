<?php

namespace App\Core;

use App\Core\Exceptions\NotFoundException;

class Router
{
    public Response $response;
    public Request $request;
    private array $routeMap = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, $callback)
    {
        $this->routeMap['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routeMap['post'][$path] = $callback;
    }

    public function getRouteMap($method): array
    {
        return $this->routeMap[$method] ?? [];
    }

    public function getCallback()
    {
        $method = $this->request->method();
        $url = $this->request->getPath();

        $url = trim($url, "/");

        $routes = $this->getRouteMap($method);

        $routeParams = false;

        foreach($routes as $route => $callback){
            $route = trim($route, "/");
            $routeNames = [];

            if(!$route)
                continue;

            if(preg_match_all("/\{(\w+)(:[^}]+)?}/", $route, $matches)){
                $routeNames = $matches[1];
            }

            $routeMapegex = "@^". preg_replace_callback("/\{\w+(:([^}]+))?}/",
            fn($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)',
            $route) ."$@";

            if(preg_match_all($routeMapegex, $url, $valueMatches)){
                $values = [];
                for($i = 1; $i < count($valueMatches); $i++){
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouterParams($routeParams);

                return $callback;
            }
        }

        return false;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routeMap[$method][$path] ?? false;

        if(!$callback){
            $callback = $this->getCallback();
            if($callback === false)
                throw new NotFoundException();
        }

        if(is_string($callback)){
            return Application::$app->view->render($callback);
        }

        if(is_array($callback)){
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $callback[0] = $controller;
            return call_user_func($callback, $this->request, $this->response);
        }
    }
}
