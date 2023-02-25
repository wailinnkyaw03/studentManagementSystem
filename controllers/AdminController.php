<?php 
session_start();

include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$admin = new QueryBuilder($connection);

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

        if($_POST['action']=="add"){
            $datas=[
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "phone" => $phone,
                "role_id" => 2
            ];
            $status = $admin->create("users", $datas);
            if($status){
                $_SESSION['status']="Users Created Successfully";
                $_SESSION['expire']=time();
            }
            header("location: ../views/backend/admin.php?page=adminlist");

        }else if($_POST['action']=="update"){
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $skills = $_POST['skills'];
            $hobbies = $_POST['hobbies'];

            if($address == "" | $gender == "" | $dob == "" | $skills == "" | $hobbies == ""){
                if($address == ""){
                    $_SESSION['address'] = "*Address Must Not Be Empty!";
                }
                if($gender == ""){
                    $_SESSION['gender'] = "*Gender Must Not Be Empty!";
                }
                if($dob == ""){
                    $_SESSION['dob'] = "*Birthday Must Not Be Empty!";
                }
                if($skills == ""){
                    $_SESSION['skills'] = "*Skills Must Not Be Empty!";
                }if($hobbies == ""){
                    $_SESSION['hobbies'] = "*Please Write Down At Least 1 Hobby!";
                }
                header("location: ".$_SERVER["HTTP_REFERER"]);
            }else{
                unset($_SESSION['name']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                unset($_SESSION['phone']);

                //image
                $image_arr = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $folder = "../assets/profileImages/";
                $image = uniqid("admin").$image_arr;
                
                move_uploaded_file($tmp_name, $folder.$image);

                

                $id = $_POST['id'];
                // $status = $admin->photoCheck("users", $id);
                
                if($image_arr != null){
                    $datas=[
                        "name" => $name,
                        "image" => $image,
                        "email" => $email,
                        "password" => $password,
                        "phone" => $phone,
                        "address" => $address,
                        "gender" => $gender,
                        "dob" => $dob,
                        "skills" => $skills,
                        "hobbies" => $hobbies,
                        "role_id" => 2
                    ];
                    
                    
                    $status = $admin->update("users", $datas, $id);
                    if($status){
                        $_SESSION['status']="Users Updated With Photo Successfully";
                        $_SESSION['expire']=time();
                    }
                    header("location: ../views/backend/admin.php?page=adminlist");

                }else{
                    $datas=[
                        "name" => $name,
                        "email" => $email,
                        "password" => $password,
                        "phone" => $phone,
                        "address" => $address,
                        "gender" => $gender,
                        "dob" => $dob,
                        "skills" => $skills,
                        "hobbies" => $hobbies,
                        "role_id" => 2
                    ];
                    
                    
                    $status = $admin->update("users", $datas, $id);
                    if($status){
                        $_SESSION['status']="Users Updated Without Photo Successfully";
                        $_SESSION['expire']=time();
                    }
                    header("location: ../views/backend/admin.php?page=adminlist");
                }

            } 

        }
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $admin->delete("users", $id);
    if($status){
        $_SESSION['status']="Users Deleted Successfully";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}





?>