<?php 
session_start();

include "../app/DB.php";
// include "../app/Admin.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
// $admin = new Admin($connection);
$eduDB = new QueryBuilder($connection);

if(isset($_POST['university'])){
    $university = $_POST['university'];
    $subject = $_POST['subject'];
    $started_date = $_POST['started_date'];
    $ended_date = $_POST['ended_date'];
    $user_id = $_POST['user_id'];

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
            $user_id = $_POST['user_id'];
            $datas = [
                "university" => $university,
                "subject" => $subject,
                "started_date" => $started_date,
                "ended_date" => $ended_date,
                "user_id" => $user_id
            ];

            $status = $eduDB->create("education", $datas);
            if($status){
                $_SESSION['status'] = "Education Added Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Education Addition Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
        }else if($_POST['action'] == "update"){
            $user_id = $_POST['user_id'];
            $id = $_POST['edu_id'];
            $datas = [
                "university" => $university,
                "subject" => $subject,
                "started_date" => $started_date,
                "ended_date" => $ended_date
            ];

            $status = $eduDB->update("education", $datas, $id);
            if($status){
                $_SESSION['status'] = "Education Updated Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Education Updating Fail";
                $_SESSION['expire'] = time();
            }
            header("location: ".$_SERVER["HTTP_REFERER"]);
            // header("location: ../views/backend/admin.php?page=eduadd");
        }
    }

}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $eduDB->delete("education", $id);
    if($status){
        $_SESSION['status']="Education Deleted Successfully";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER['HTTP_REFERER']);
}


?>