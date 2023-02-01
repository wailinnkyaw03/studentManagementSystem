<?php 

class DB{
    private $host = "127.0.0.1:3308";
    private $dbname = "studentmanagement";
    private $username = "root";
    private $password = "";
    public $connection;
    public function connect(){
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        return $this->connection;
    }
}





?>