<?php 
session_start();

include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$expDB = new QueryBuilder($connection);

if(isset($_POST['company'])){
    $company = $_POST['company'];
    $position = $_POST['position'];
    $jobDesc = $_POST['jobDesc'];
    $started_date = $_POST['started_date'];
    $ended_date = $_POST['ended_date'];
    $user_id = $_POST['user_id'];

    if($company == "" | $position == "" | $jobDesc == "" | $started_date =="" | $ended_date == ""){
        if($company==""){
            $_SESSION['company'] = "Company Name Must Not Be Empty";
        }
        if($position==""){
            $_SESSION['position'] = "Position Must Not Be Empty";
        }
        if($jobDesc==""){
            $_SESSION['jobDesc'] = "Job Description Must Not Be Empty";
        }
        if($started_date==""){
            $_SESSION['started_date'] = "Started Date Must Not Be Empty";
        }
        if($ended_date==""){
            $_SESSION['ended_date'] = "Finished Date Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['company']);
        unset($_SESSION['position']);
        unset($_SESSION['jobDesc']);
        unset($_SESSION['started_date']);
        unset($_SESSION['ended_date']);
    
        if($_POST['action'] == "add"){
            $user_id = $_POST['user_id'];
            $datas = [
                "company" => $company,
                "position" => $position,
                "jobDesc" => $jobDesc,
                "started_date" => $started_date,
                "ended_date" => $ended_date,
                "user_id" => $user_id
            ];

            $status = $expDB->create("experience", $datas);
            if($status){
                $_SESSION['status'] = "Experience Added Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Experience Addition Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }else if($_POST['action'] == "update"){
            $user_id = $_POST['user_id'];
            $id = $_POST['exp_id'];
            $datas = [
                "company" => $company,
                "position" => $position,
                "jobDesc" => $jobDesc,
                "started_date" => $started_date,
                "ended_date" => $ended_date,
                "user_id" => $user_id,
                "id" => $id
            ];

            $edits = "";
            foreach($datas as $key=>$value){
                // $edit .= $key.'=:'.$key; 
                $edits .= "$key=:$key,"; 
            }
            $edits = rtrim($edits, ',');
            $id = $_POST['exp_id'];

            $status = $expDB->update("experience", $datas, $edits, $id);
            if($status){
                $_SESSION['status'] = "Experience Updated Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Experience Updating Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
            // header("location: ../views/backend/admin.php?page=expadd");
        }
    }

}
?>