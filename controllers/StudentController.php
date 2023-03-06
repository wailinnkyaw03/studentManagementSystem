<?php 
session_start();
include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$stuDB = new QueryBuilder($connection);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $course_id = $_POST['course_id'];
    //image
    $image_arr = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../assets/profileImages/";
    $image = uniqid("student").$image_arr;
    move_uploaded_file($tmp_name, $folder.$image);

    if($name == "" | $email == "" | $password == "" | $dob == "" | $gender == "" | $phone == "" | $address == "" | $class_id == "" | $course_id == ""){
        if($name == ""){
            $_SESSION['name'] = "Name Must Not Be Empty";
        }
        if($email == ""){
            $_SESSION['email'] = "Email Must Not Be Empty";
        }
        if($password == ""){
            $_SESSION['password'] = "Password Must Not Be Empty";
        }
        if($dob == ""){
            $_SESSION['dob'] = "Brith-Date Must Not Be Empty";
        }
        if($gender == ""){
            $_SESSION['gender'] = "Gender Must Not Be Empty";
        }
        if($phone == ""){
            $_SESSION['phone'] = "Phone Must Not Be Empty";
        }
        if($address == ""){
            $_SESSION['address'] = "Address Must Not Be Empty";
        }
        if($class_id == ""){
            $_SESSION['class_id'] = "Class Type Must Not Be Empty";
        }
        if($course_id == ""){
            $_SESSION['course_id'] = "Course Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['dob']);
        unset($_SESSION['gender']);
        unset($_SESSION['phone']);
        unset($_SESSION['address']);
        unset($_SESSION['class_id']);
        unset($_SESSION['course_id']);

        if($_POST['action']=="add"){
            $datas = [
                "name" => $name,
                "image" => $image,
                "email" => $email,
                "password" => $password,
                "dob" => $dob,
                "gender" => $gender,
                "phone" => $phone,
                "address" => $address,
                "class_id" => $class_id,
                "course_id" => $course_id,
                "role_id" => 4,
                "user_status" => "pending"
            ];
            $stuCreate = $stuDB->create("users", $datas);
            if($stuCreate){
                $_SESSION['status']="Student Created Successfully";
                $_SESSION['expire']=time();
            }else{
                $_SESSION['status']="Student Creation Fail";
                $_SESSION['expire']=time();
            }
            // header("location: ".$_SERVER["HTTP_REFERER"]);
            header("location: ../views/backend/admin.php?page=studentlist");
        }
    }  
}
if($_POST['action']=="permission"){
    $id = $_POST['id'];
    $user_status = $_POST['user_status'];
    $datas =[
        "user_status" => $user_status
    ];
    $status=$stuDB->update("users", $datas, $id);
    header("location: ".$_SERVER["HTTP_REFERER"]);
    if($_POST['user_status']=="approved"){ 
        $_SESSION['status']="Permission Approved";
        $_SESSION['expire']=time();
    }else{
        $_SESSION['status']="Permission Banned";
        $_SESSION['expire']=time();
    }
}

?>