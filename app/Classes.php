<?php 

class Classes{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //create
    public function create($name){
        try{
            $state = $this->conn->prepare("INSERT INTO classes(className) VALUES(:name)");
            $state->bindParam(":name", $name);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
        
    }

    //retrieve
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM classes");
            $state->execute();
            $classes = $state->fetchAll(PDO::FETCH_ASSOC);
            return $classes;

        }catch(Exception $e){

        }
        
    }

    //update 
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM classes WHERE class_id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $class = $state->fetch(PDO::FETCH_ASSOC);
            return $class;

        }catch(Exception $e){
            
        }
        
    }
    public function update($id, $name){
        try{
            $state = $this->conn->prepare("UPDATE classes SET className=:name WHERE class_id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":name", $name);
            $state->execute();
            return true;

        }catch(Exception $e){
            
        }
    }
    
    //delete
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM classes WHERE class_id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;

        }catch(Exception $e){
            
        }
    }
}


?>