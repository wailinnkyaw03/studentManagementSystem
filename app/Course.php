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
            $state = $this->conn->prepare("SELECT courses.course_id, courses.title, courses.outline, courses.duration, classes.className FROM courses INNER JOIN classes ON courses.class_id = classes.class_id");
            $state->execute();
            $courses = $state->fetchAll(PDO::FETCH_ASSOC);
            return $courses;            

        }catch(Exception $e){

        }
    }

    //update
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM courses WHERE course_id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $course = $state->fetch(PDO::FETCH_ASSOC);
            return $course;            

        }catch(Exception $e){

        }
    }

    public function update($id, $title, $outline, $duration, $class_id){
        try{
            $state = $this->conn->prepare("UPDATE courses SET title=:title, outline=:outline, duration=:duration, class_id=:class_id WHERE course_id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":title", $title);
            $state->bindParam("outline", $outline);
            $state->bindParam(":duration", $duration);
            $state->bindParam(":class_id", $class_id);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }

    //delete
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM courses WHERE course_id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        }catch(Exception $e){
            
        }
    }
    
}

?>