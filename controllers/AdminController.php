<?php 
session_start();

include "../app/DB.php";
include "../app/Admin.php";

$db = new DB();
$connection = $db->connect();
$admin = new Admin($connection);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    if($name == "" | $email == "" | $password == "" | $phone == ""){
        if($name == ""){
            $_SESSION['name'] = "*Name Must Not Be Empty!";
        }
        if($email == ""){
            $_SESSION['email'] = "*Email Must Not Be Empty!";
        }
        if($password == ""){
            $_SESSION['password'] = "*Password Must Not Be Empty!";
        }
        if($phone == ""){
            $_SESSION['phone'] = "*Phone Must Not Be Empty!";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
        
    }else{
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['phone']);

        if($_POST['action']=='add'){
            $status = $admin->create($name, $email, $password, $phone);
            if($status){
                $_SESSION['status'] = "Admin User Created Successfully.";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Admin User Creation Fail";
            }
            // header("location: ".$_SERVER["HTTP_REFERER"]);
            header("location: ../views/backend/admin.php?page=adminlist");

        }else if($_POST['action']=='update'){
            $id = $_POST['id'];
            $status = $admin->update($id, $name, $email, $password, $phone);
            if($status){
                $_SESSION['status'] = "Admin User Updated Successfully.";
                $_SESSION['expire'] = time();
            }else{
                $_SESSION['status'] = "Admin User Updating Fail";
            }
            // header("location: ".$_SERVER["HTTP_REFERER"]);
            header("location: ../views/backend/admin.php?page=adminlist");
        }
    }
}

if($_GET['action']=='delete'){
    $id = $_GET['id'];
    $status = $admin->delete($id);
    if($status){
        $_SESSION['status'] = "Admin User Deleted Successfully";
        $_SESSION['expire'] = time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}

?>