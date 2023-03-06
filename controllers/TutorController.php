<?php 
session_start();
include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$tutors = new QueryBuilder($connection);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $skills = $_POST['skills'];
    $hobbies = $_POST['hobbies'];
    $joiningDate = $_POST['joiningDate'];
    $salary = $_POST['salary'];

    //image
    $image_arr = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../assets/profileImages/";
    $image = uniqid("tutor").$image_arr;
    move_uploaded_file($tmp_name, $folder.$image);

    if($name == "" | $email == "" | $password == "" | $dob == "" | $gender == "" | $phone == "" | $address == "" | $skills == "" | $hobbies == "" | $joiningDate == "" | $salary == ""){
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
        if($skills == ""){
            $_SESSION['skills'] = "Skills Must Not Be Empty";
        }
        if($hobbies == ""){
            $_SESSION['hobbies'] = "Hobbies Must Not Be Empty";
        }
        if($joiningDate == ""){
            $_SESSION['joiningDate'] = "Joining Date Must Not Be Empty";
        }
        if($salary == ""){
            $_SESSION['salary'] = "Salary Must Not Be Empty";
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
        unset($_SESSION['skills']);
        unset($_SESSION['hobbies']);
        unset($_SESSION['joiningDate']);
        unset($_SESSION['salary']);

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
                "skills" => $skills,
                "hobbies" => $hobbies,
                "joiningDate" => $joiningDate,
                "salary" => $salary,
                "role_id" => 3,
                "user_status"=>"pending"
            ];
            $status = $tutors->create("users", $datas);
            if($status){
                $_SESSION['status'] = "Tutor Added Successfully";
                $_SESSION['expire'] = time();
            }
            header("location: ../views/backend/admin.php?page=tutorlist");
        }else if($_POST['action']=="update"){
            $id = $_POST['id'];
            if($image_arr != null){
                $datas = [
                    "name" => $name,
                    "image" => $image,
                    "email" => $email,
                    "password" => $password,
                    "dob" => $dob,
                    "gender" => $gender,
                    "phone" => $phone,
                    "address" => $address,
                    "skills" => $skills,
                    "hobbies" => $hobbies,
                    "joiningDate" => $joiningDate,
                    "salary" => $salary,
                    "role_id" => 3,
                ];

                $status = $tutors->update("users", $datas, $id);
                if($status){
                    $_SESSION['status']="Tutors Updated With Photo Successfully";
                    $_SESSION['expire']=time();
                }
                header("location: ../views/backend/admin.php?page=tutorlist");
            }else{
                $datas = [
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "dob" => $dob,
                    "gender" => $gender,
                    "phone" => $phone,
                    "address" => $address,
                    "skills" => $skills,
                    "hobbies" => $hobbies,
                    "joiningDate" => $joiningDate,
                    "salary" => $salary,
                    "role_id" => 3,
                ];
                
                $status = $tutors->update("users", $datas, $id);
                if($status){
                    $_SESSION['status']="Tutors Updated Without Photo Successfully";
                    $_SESSION['expire']=time();
                }
                header("location: ../views/backend/admin.php?page=tutorlist");
            }
        }
    }
}
if($_POST['action']=="permission"){
    $id = $_POST['id'];
    $user_status = $_POST['user_status'];
    $datas =[
        "user_status" => $user_status
    ];
    $status=$tutors->update("users", $datas, $id);
    header("location: ".$_SERVER["HTTP_REFERER"]);
    if($_POST['user_status']=="approved"){ 
        $_SESSION['status']="Permission Approved";
        $_SESSION['expire']=time();
    }else{
        $_SESSION['status']="Permission Banned";
        $_SESSION['expire']=time();
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $tutors->delete("users", $id);
    if($status){
        $_SESSION['status']="Tutor Deleted Successfully";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}

?>