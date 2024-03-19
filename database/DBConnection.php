<?php

namespace Database;

use PDO;

class DBConnection {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct(string $db_name, string $host, string $db_user, string $db_pass) {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $host;
    }
    
    public function getPDO(): PDO { 
        return $this->pdo = new PDO(
            "mysql:dbname={$this->db_name};host={$this->db_host}", 
            $this->db_user, $this->db_pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]
        );
    }
}