<?php 

class AdminLogin{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //login
    public function check($email, $password){
        // $state = $this->conn->prepare("SELECT * FROM users WHERE email=:email && password=:password && role_id<=2 && user_status!='pending'");
        $state = $this->conn->prepare("SELECT * FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE users.email = :email AND users.password = :password && role_id<=2 && user_status!='pending'");
        $state->bindParam(":email", $email);
        $state->bindParam(":password", $password);
        $state->execute();
        $result = $state->fetch(PDO::FETCH_ASSOC);

        if($result == false){
            return false;
        }else{
            $_SESSION["user_id"] = $result["id"];
            $_SESSION["username"] = $result["name"];
            $_SESSION["userimage"] = $result["image"];
            $_SESSION["useremail"] = $result["email"];
            $_SESSION["userpassword"] = $result["password"];
            $_SESSION["userphone"] = $result["phone"];
            $_SESSION["useraddress"] = $result["address"];
            $_SESSION["value"] = $result["value"];
            $_SESSION["roleName"] = $result["roleName"];
            $_SESSION["userdob"] = $result["dob"];
            $_SESSION["sex"] = $result["gender"];
            $_SESSION["userskills"] = $result["skills"];
            $_SESSION["userhobbies"] = $result["hobbies"];
            return true;
        }
    }
}

?>