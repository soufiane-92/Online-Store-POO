<?php

class Database
{
    public $db_host;
    public $db_name;
    public $db_username;
    public $db_password;
    public $connection;

    public function __construct()
    {

        $this->db_host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->db_username = $_ENV['DB_USERNAME'];
        $this->db_password = $_ENV['DB_PASSWORD'];
        $dsn = "mysql:dbname=" . $this->db_name . ";host=" . $this->db_host . ";";

        $this->connexion = new PDO($dsn, $this->db_username, $this->db_password);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

}