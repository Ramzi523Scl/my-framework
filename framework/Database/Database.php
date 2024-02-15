<?php

namespace MyFramework\Framework\Database;

use PDO;

class Database
{
    private $driver = 'mysql';
    private $host = '127.0.0.1';
    private $dbname = 'test';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    private function connect()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_STRINGIFY_FETCHES => false,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $dst = "{$this->driver}:host={$this->host};dbname={$this->dbname}";


        try {
            return new PDO($dst, $this->username, $this->password, $options);
        } catch (\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}