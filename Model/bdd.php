<?php
    namespace Model;

    class Bdd {
        public $connect;
        private static $instance;

        private function __construct()
        {
            $this->connect = new \PDO("mysql:dbname=gehz3738_sellmeout;host=localhost","gehz3738","-cWfYkA_Z?LS");
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