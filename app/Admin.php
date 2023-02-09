<?php 

class Admin{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    
    //create
    public function create($name, $email, $password, $phone, $role_id){
        try{
            $state = $this->conn->prepare("INSERT INTO users(name, email, password, phone, role_id) VALUES(:name, :email, :password, :phone, :role_id)");
            $state->bindParam(":name", $name);
            $state->bindParam(":email", $email);
            $state->bindParam(":password", $password);
            $state->bindParam(":phone", $phone);
            $state->bindParam(":role_id", $role_id);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
        
    }

    //retrieve
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM users INNER JOIN roles on users.role_id=roles.role_id");
            $state->execute();
            $admins = $state->fetchAll(PDO::FETCH_ASSOC);
            return $admins;
        }catch(Exception $e){

        }
        
    }

    //update
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM users INNER JOIN roles on users.role_id=roles.role_id WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $admin = $state->fetch(PDO::FETCH_ASSOC);
            return $admin;

        }catch(Exception $e){

        }
    }
    public function update($id, $name, $image, $email, $password, $phone, $address, $role_id){
        try{
            $state = $this->conn->prepare("UPDATE users SET name=:name, image=:image, email=:email, password=:password, phone=:phone, address=:address, role_id=:role_id WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":name", $name);
            $state->bindParam(":image", $image);
            $state->bindParam(":email", $email);
            $state->bindParam(":password", $password);
            $state->bindParam(":phone", $phone);
            $state->bindParam(":address", $address);
            $state->bindParam(":role_id", $role_id);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }


    //delete
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
            
        }catch(Exception $e){

        }
    }
}

?>