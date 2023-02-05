<?php 

class Course{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    //create
    public function create($title, $outline, $duration, $class_id){
        try{
            $state = $this->conn->prepare("INSERT INTO courses(title, outline, duration, class_id) VALUES(:title, :outline, :duration, :class_id)");
            $state->bindParam(":title", $title);
            $state->bindParam("outline", $outline);
            $state->bindParam(":duration", $duration);
            $state->bindParam(":class_id", $class_id);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }

    //retrieve
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM courses INNER JOIN classes ON courses.class_id = classes.id");
            

        }catch(Exception $e){

        }
    }
    
}

?>