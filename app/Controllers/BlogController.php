<?php

namespace App\Controllers;


class BlogController extends Controller {
    
    public function welcome(){
        return  $this->view("blog.welcome");
    }
    public function index() {
        $statement = $this->db->getPDO()->prepare('SELECT * FROM posts ORDER BY created_at DESC');
        $statement->execute();
        $posts = $statement->fetchAll();
        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id) {
        // call $db from the parent.
        $statement = $this->db->getPDO()->prepare('SELECT * FROM posts WHERE id = ?');
        $statement->execute([$id]);
        $post = $statement->fetch();
        //var_export($post);
        return $this->view('blog.show', compact('post'));
    }
}  