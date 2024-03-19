<?php

namespace App\Controllers;

use Database\DBConnection;

class Controller {

    protected $db;

    function __construct(DBConnection $db) {
        $this->db = $db;
    }
        
    public function view(string $path, array $params = []) {
        // start the buffering so we can take the file (index.php)
        // keep it some where before to display it with a require
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php'; // will not display
        if($params){
            $params = extract($params);
        }
        $content = ob_get_clean(); //take and clean the content from buffer
        require VIEWS . 'layout.php';
    }
}