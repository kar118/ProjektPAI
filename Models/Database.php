<?php

class Database{
    private $host;
    private $user;
    private $name;
    private $password;

    private $conn = null;

    public function __construct(
        $host,
        $name,
        $user,
        $password
    ){
        $this->host = $host;
        $this->user = $user;
        $this->name = $name;
        $this->password = $password;
    }

    public function getConn(): PDO{
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }

    public function beginTransaction(){
        try{
            return $this->conn->beginTransaction();
        }catch(PDOException $e){
            $e->getMessage();
        }
        return null;
    }

    public function closeConnection(){
        $this->conn = null;
    }
}