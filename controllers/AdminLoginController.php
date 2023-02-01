<?php 
session_start();
include "../app/DB.php";
// include "../app/Admin.php";
include "../app/AdminLogin.php";

$db = new DB();
$connection = $db->connect();
// $adminDB = new Admin($connection);
// $admin = $adminDB->get($id);
$login = new AdminLogin($connection);

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "" | $password == ""){
        if($email == ""){
            $_SESSION['email'] = 'Email Must Not Be Empty';
        }

        if($password == ""){
            $_SESSION['password'] = 'Password Must Not Be Empty';
        }

        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        $status = $login->check($email, $password);
        if($status){
            $_SESSION['auth'] = true;
        }else{
            $_SESSION['status'] = 'Email or Password was wrong';
            $_SESSION['expire'] = time();
        }
        header("location: ../views/backend/admin.php");
    }
}

if(isset($_GET['action'])){
    if($_GET['action']=='logout'){
        unset($_SESSION["auth"]);
        header("location: ../views/backend/login.php");
    }
}

?>