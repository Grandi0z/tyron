<?php

namespace App\Controllers;


class BlogController extends Controller {
    public function index() {
        return $this->view('blog.index');
    }

    public function show(int $id) {
        // call $db from the parent.
        $req = $this->db->getPDO()->prepare('SELECT * FROM posts');
        $req->execute();
        $posts = $req->fetchAll();
        foreach($posts as $post){
            echo $post->title;
        }
    }
}  