<?php 
session_start();
include "../app/DB.php";
include "../app/Course.php";

$db = new DB();
$connection = $db->connect();
$courseDB = new Course($connection);

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $outline = $_POST['outline'];
    $duration = $_POST['duration'];
    $class_id = $_POST['class_id'];
    if($title == "" | $outline == "" | $duration == "" | $class_id == ""){
        if($title == ""){
            $_SESSION['title'] = "Title Must Not Be Empty";
        }
        if($outline == ""){
            $_SESSION['outline'] = "Outline Must Not Be Empty";
        }
        if($duration == ""){
            $_SESSION['duration'] = "Duration Must Not Be Empty";
        }
        if($class_id == ""){
            $_SESSION['class_id'] = "Class Type Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['title']);
        unset($_SESSION['outline']);
        unset($_SESSION['duration']);
        unset($_SESSION['class_id']);

        if($_POST['action']=='add'){
            $status = $courseDB->create($title, $outline, $duration, $class_id);
            if($status){
                $_SESSION['status'] = 'Course Created Successfully.';
                $_SESSION['expire'] = time();

            }else{
                $_SESSION['status'] = 'Course Creation Fail.';
                $_SESSION['expire'] = time();

            }
            header("location: ".$_SERVER["HTTP_REFERER"]);

        }
    }
}


?>


