<?php 

class AdminLogin{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //login
    public function check($email, $password){
        $state = $this->conn->prepare("SELECT * FROM users WHERE email=:email && password=:password && role_id<=2");
        $state->bindParam(":email", $email);
        $state->bindParam(":password", $password);
        $state->execute();
        $result = $state->fetch(PDO::FETCH_ASSOC);
        if($result == false){
            return false;
        }else{
            $_SESSION["username"] = $result["name"];
            $_SESSION["userimage"] = $result["image"];
            $_SESSION["useremail"] = $result["email"];
            $_SESSION["userpassword"] = $result["password"];
            $_SESSION["userphone"] = $result["phone"];
            $_SESSION["useraddress"] = $result["address"];
            return true;
        }
    }
}

?>