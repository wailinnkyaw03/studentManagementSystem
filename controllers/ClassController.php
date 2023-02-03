<?php 
session_start();

include "../app/DB.php";
include "../app/Classes.php";

$db = new DB();
$connection = $db->connect();
$classes = new Classes($connection);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    if($name == ""){
        $_SESSION['name'] = "Class Type Must Not Be Empty";
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['name']);

        if($_POST['action']=='add'){
            $status = $classes->create($name);
            if($status){
                $_SESSION['status'] = "Class Type Added Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Class Type Added Fail";
            }
            header("location: ../views/backend/admin.php?page=classlist");
            // header("location: ".$_SERVER["HTTP_REFERER"]);

        }else if($_POST['action']=='update'){
            $id = $_POST['id'];
            $status = $classes->update($id, $name);
            
            if($status){
                $_SESSION['status'] = "Class Type Updated Successfully";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Class Type Updated Fail";
            }
            header("location: ../views/backend/admin.php?page=classlist");
            // header("location: ".$_SERVER["HTTP_REFERER"]);
        }
        
    }
}

if($_GET['action']=='delete'){
    $id = $_GET['id'];
    $status = $classes->delete($id);
    if($status){
        $_SESSION['status'] = "Class Type Deleted Successfully";
        $_SESSION['expire'] = time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}

?>