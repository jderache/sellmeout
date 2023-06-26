<?php
namespace Model;

class Bdd {
    public $connect;
    private static $instance;

    private function __construct()
    {
        $this->connect = new \PDO("mysql:dbname=" . $_ENV["DB_DATABASE"] . ";host=" . $_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
    }

    public static function getInstance()
    {
        if (empty(self::$instance))
        {
            self::$instance = new Bdd();
        }
        return self::$instance;
    }
}