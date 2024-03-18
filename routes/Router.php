<?php

namespace Router;

class Router {
    public $url;
    public $routes = [];

    public function __construct($url) {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action) {
        // store Routes objects in the $routes array
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run() {
        //instead of calling routes['GET'] or routes['POST'] directly, 
        //we use the $_SERVER['REQUEST_METHOD'] to get the current request method
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->matches($this->url)) {
                $route->execute();
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }
}