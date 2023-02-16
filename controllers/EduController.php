<?php 
session_start();

include "../app/DB.php";
// include "../app/Admin.php";
include "../app/Edu&Exp.php";

$db = new DB();
$connection = $db->connect();
// $admin = new Admin($connection);
$eduDB = new Education($connection);

if(isset($_POST['university'])){
    $university = $_POST['university'];
    $subject = $_POST['subject'];
    $started_date = $_POST['started_date'];
    $ended_date = $_POST['ended_date'];
    $user_id = $_POST['user_id'];
    // echo $university;
    // echo $subject;
    // echo $started_date;
    // echo $ended_date;

    if($university == "" | $subject == "" | $started_date =="" | $ended_date == ""){
        if($university==""){
            $_SESSION['university'] = "School/University Must Not Be Empty";
        }
        if($subject==""){
            $_SESSION['subject'] = "Subject Must Not Be Empty";
        }
        if($started_date==""){
            $_SESSION['started_date'] = "Started Date Must Not Be Empty";
        }
        if($ended_date==""){
            $_SESSION['ended_date'] = "Finished Date Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['university']);
        unset($_SESSION['subject']);
        unset($_SESSION['started_date']);
        unset($_SESSION['ended_date']);
    
        if($_POST['action'] == "add"){
            $status = $eduDB->create($university, $subject, $started_date, $ended_date, $user_id);
            if($status){
                $_SESSION['status'] = "Education Added Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Education Addition Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }else if($_POST['action'] == "update"){
            $edu_id = $_POST['edu_id'];
            $status = $eduDB->update($edu_id, $university, $subject, $started_date, $ended_date);
            if($status){
                $_SESSION['status'] = "Education Updated Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Education Updating Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }
    }

}


?>