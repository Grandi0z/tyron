<?php

namespace Router;

use Database\DBConnection;

class Route {
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action) {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        // looking for the the regex pattern pathToMatch in the url 
        // the matches that we found will be populate in the array $matches
        if(preg_match($pathToMatch, $url, $matches)) {
            //array_shift($matches);
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute() {
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection('tyrion_bd', 'localhost', 'root', '')); //BlogController() is the index 0 so we create it here
        $method = $params[1];
        // the 0 index is the url
        // because if we have an id it will be in the index 1 of the matches array
        // if we have an id we execute method that need an id else we method that do not need it
        //(example: index() or show(int $id)
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : 
        $controller->$method();
    }
}