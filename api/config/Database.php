<?php

class Database {

    private $dbConnection = null;
  
    public function __construct()
    {
    //   $host = $_ENV['DB_HOST'];
    //   $port = $_ENV['DB_PORT'];
    //   $db   = $_ENV['DB_DATABASE'];
    //   $user = $_ENV['DB_USERNAME'];
    //   $pass = $_ENV['DB_PASSWORD'];

    $host = "localhost";
    $port = "3306";
    $db = "deiko_db";
    $user = "deiko_db";
    $pass = "deiko_db";
  
      try {
        $this->dbConnection = new \PDO(
            "mysql:host=$host;port=$port;dbname=$db",
            $user,
            $pass
        );
      } catch (\PDOException $e) {
        exit($e->getMessage());
      }
    }
  
    public function connet()
    {
      return $this->dbConnection;
    }
}

?>