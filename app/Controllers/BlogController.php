<?php

namespace App\Controllers;

class BlogController {
    public function index() {
        echo "home page";
    }

    public function show(int $id) {
        echo "post numero: $id\n";
    }
}  