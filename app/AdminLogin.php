<?php 

class AdminLogin{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //login
    public function check($email, $password){
        $state = $this->conn->prepare("SELECT * FROM admins WHERE email=:email && password=:password");
        $state->bindParam(":email", $email);
        $state->bindParam(":password", $password);
        $state->execute();
        $result = $state->fetch(PDO::FETCH_ASSOC);
        if($result == false){
            return false;
        }else{
            return true;
        }
    }
}

?>