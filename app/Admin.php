<?php 

class Admin{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    
    //create
    public function create($name, $email, $password, $phone){
        try{
            $state = $this->conn->prepare("INSERT INTO admins(name, email, password, phone) VALUES(:name, :email, :password, :phone)");
            $state->bindParam(":name", $name);
            $state->bindParam(":email", $email);
            $state->bindParam(":password", $password);
            $state->bindParam(":phone", $phone);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
        
    }

    //retrieve
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM admins");
            $state->execute();
            $admins = $state->fetchAll(PDO::FETCH_ASSOC);
            return $admins;
        }catch(Exception $e){

        }
        
    }

    //update
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM admins WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $admin = $state->fetch(PDO::FETCH_ASSOC);
            return $admin;

        }catch(Exception $e){

        }
    }
    public function update($id, $name, $email, $password, $phone){
        try{
            $state = $this->conn->prepare("UPDATE admins SET name=:name, email=:email, password=:password, phone=:phone WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":name", $name);
            $state->bindParam(":email", $email);
            $state->bindParam(":password", $password);
            $state->bindParam(":phone", $phone);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }


    //delete
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM admins WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
            
        }catch(Exception $e){

        }
    }
}

?>