<?php

namespace App\Core;

use PDO;

class Database
{
    private $pdo;

    public function __construct($host, $dbname, $username, $password, $port = 3306)
    {
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}