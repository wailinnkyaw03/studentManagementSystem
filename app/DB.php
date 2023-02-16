<?php 

class DB{
    private $host = "localhost:3308";
    private $dbname = "studentmanagement";
    private $username = "root";
    private $password = "";
    private $connection;
    public function connect(){
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        return $this->connection;
    }
}





?>