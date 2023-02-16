<?php 

class Education{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    //create education
    public function create($university, $subject, $started_date, $ended_date, $user_id){
        try{
            $state = $this->conn->prepare("INSERT INTO education(university, subject, started_date, ended_date, user_id) VALUES(:university, :subject, :started_date, :ended_date, :user_id)");
            $state->bindParam(":university", $university);
            $state->bindParam(":subject", $subject);
            $state->bindParam(":started_date", $started_date);
            $state->bindParam(":ended_date", $ended_date);
            $state->bindParam(":user_id", $user_id);
            $state->execute();
            
            return true;
        }catch(Exception $e){
            
        }
    }
    //read education
    public function getAll($user_id){
        try{
            $state = $this->conn->prepare("SELECT * FROM education WHERE user_id=:user_id");
            $state->bindParam(":user_id", $user_id);
            $state->execute();
            $educations = $state->fetchAll(PDO::FETCH_ASSOC);
            return $educations;

        }catch(Exception $e){

        }
    }

    //update
    public function get($edu_id){
        try{
            $state = $this->conn->prepare("SELECT * FROM education WHERE edu_id=:edu_id");
            $state->bindParam(":edu_id", $edu_id);
            $state->execute();
            $education = $state->fetch(PDO::FETCH_ASSOC);
            return $education;
            
        }catch(Exception $e){

        }
    }
    public function update($edu_id, $university, $subject, $started_date, $ended_date){
        try{
            $state = $this->conn->prepare("UPDATE education SET university=:university, subject=:subject, started_date=:started_date, ended_date=:ended_date WHERE edu_id=:edu_id");
            $state->bindParam(":edu_id", $edu_id);
            $state->bindParam(":university", $university);
            $state->bindParam(":subject", $subject);
            $state->bindParam(":started_date", $started_date);
            $state->bindParam(":ended_date", $ended_date);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }
    
    //delete
    public function delete($edu_id){
        try{
            $state = $this->conn->prepare("DELETE FROM education WHERE edu_id=:edu_id");
            $state->bindParam(":edu_id", $edu_id);
            $state->execute();
            return true;
            
        }catch(Exception $e){

        }
    }
}




class Experience{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }
    //create experience
    public function create($companyName, $position, $jobDesc, $started_date, $ended_date, $user_id){
        try{
            $state = $this->conn->prepare("INSERT INTO experience(companyName, position, jobDesc, started_date, ended_date, user_id) VALUES(:companyName, :position, :jobDesc, :started_date, :ended_date, :user_id)");
            $state->bindParam(":companyName", $companyName);
            $state->bindParam(":position", $position);
            $state->bindParam(":jobDesc", $jobDesc);
            $state->bindParam(":started_date", $started_date);
            $state->bindParam(":ended_date", $ended_date);
            $state->bindParam(":user_id", $user_id);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
    //read experience
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM experience");
            $state->execute();
            $experiences = $state->fetchAll(PDO::FETCH_ASSOC);
            return $experiences;

        }catch(Exception $e){

        }
    }

    //update
    public function get($exp_id){
        try{
            $state = $this->conn->prepare("SELECT * FROM experience WHERE exp_id=:exp_id");
            $state->bindParam(":exp_id", $exp_id);
            $state->execute();
            $experience = $state->fetch(PDO::FETCH_ASSOC);
            return $experience;
            
        }catch(Exception $e){

        }
    }
    public function update($exp_id, $companyName, $position, $jobDesc, $started_date, $ended_date){
        try{
            $state = $this->conn->prepare("UPDATE experience SET companyName=:companyName, position=:position, jobDesc=:jobDesc, started_date=:started_date, ended_date=:ended_date WHERE exp_id=:exp_id");
            $state->bindParam(":exp_id", $exp_id);
            $state->bindParam(":companyName", $companyName);
            $state->bindParam(":position", $position);
            $state->bindParam(":jobDesc", $jobDesc);
            $state->bindParam(":started_date", $started_date);
            $state->bindParam(":ended_date", $ended_date);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }
    
    //delete
    public function delete($exp_id){
        try{
            $state = $this->conn->prepare("DELETE FROM experience WHERE exp_id=:exp_id");
            $state->bindParam(":exp_id", $exp_id);
            $state->execute();
            return true;
            
        }catch(Exception $e){

        }
    }
}

?>