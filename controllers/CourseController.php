<?php 
session_start();
include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$courseDB = new QueryBuilder($connection);

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $class_id = $_POST['class_id'];
    $fee_id = $_POST['fee_id'];
    $tutor_id = $_POST['tutor_id'];
    $started_date = $_POST['started_date'];
    

    //image
    $image_arr = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../assets/profileImages/";
    $image = uniqid("course").$image_arr;
    move_uploaded_file($tmp_name, $folder.$image);

    if($title == "" | $description == "" | $duration == "" | $class_id == "" | $fee_id == "" | $tutor_id == "" | $started_date == ""){
        if($title == ""){
            $_SESSION['title'] = "Title Must Not Be Empty";
        }
        if($description == ""){
            $_SESSION['description'] = "Course Outline Must Not Be Empty";
        }
        if($duration == ""){
            $_SESSION['duration'] = "Duration Must Not Be Empty";
        }
        if($class_id == ""){
            $_SESSION['class_id'] = "Class Type Must Not Be Empty";
        }
        if($fee_id == ""){
            $_SESSION['fee_id'] = "Fee Amount Must Not Be Empty";
        }
        if($tutor_id == ""){
            $_SESSION['tutor_id'] = "Tutor Must Not Be Empty";
        }
        if($started_date == ""){
            $_SESSION['started_date'] = "Started Date Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['title']);
        unset($_SESSION['description']);
        unset($_SESSION['duration']);
        unset($_SESSION['class_id']);
        unset($_SESSION['fee_id']);
        unset($_SESSION['tutor_id']);
        unset($_SESSION['started_date']);

        if($_POST['action']=='add'){
            $created_by = $_POST['created_by'];
            $datas = [
                "title" => $title,
                "image" => $image,
                "description" => $description, 
                "duration" => $duration,
                "class_id" => $class_id,
                "fee_id" => $fee_id,
                "tutor_id" => $tutor_id,
                "started_date" => $started_date,
                "created_by" => $created_by,
                "category_id" => 2
            ];
            // echo "<pre>";
            // print_r($datas);
            // echo "</pre>";
            $status = $courseDB->create("posts", $datas);
            if($status){
                $_SESSION['status'] = 'Course Created Successfully.';
                $_SESSION['expire'] = time();

            }else{
                $_SESSION['status'] = 'Course Creation Fail.';
                $_SESSION['expire'] = time();

            }
            header("location: ../views/backend/admin.php?page=courselist");

        }else if($_POST['action']=='update'){
            $id = $_POST['id'];
            $updated_by = $_POST['updated_by'];
            if($image_arr != null){
                $datas = [
                    "title" => $title,
                    "image" => $image,
                    "description" => $description, 
                    "duration" => $duration,
                    "class_id" => $class_id,
                    "fee_id" => $fee_id,
                    "tutor_id" => $tutor_id,
                    "started_date" => $started_date,
                    "updated_by" => $updated_by,
                    "category_id" => 2
                ];
                $status = $courseDB->update("posts", $datas, $id);
                if($status){
                    $_SESSION['status'] = 'Course Updated with Photo Successfully.';
                    $_SESSION['expire'] = time();

                }else{
                    $_SESSION['status'] = 'Course Updating Fail.';
                    $_SESSION['expire'] = time();

                }
                header("location: ../views/backend/admin.php?page=courselist");
            }else{
                $datas = [
                    "title" => $title,
                    "description" => $description, 
                    "duration" => $duration,
                    "class_id" => $class_id,
                    "fee_id" => $fee_id,
                    "tutor_id" => $tutor_id,
                    "started_date" => $started_date,
                    "updated_by" => $updated_by,
                    "category_id" => 2
                ];
                $status = $courseDB->update("posts", $datas, $id);
                if($status){
                    $_SESSION['status'] = 'Course Updated without Photo Successfully.';
                    $_SESSION['expire'] = time();

                }else{
                    $_SESSION['status'] = 'Course Updating Fail.';
                    $_SESSION['expire'] = time();

                }
                header("location: ../views/backend/admin.php?page=courselist");
            }
        }
    }

    
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $courseDB->delete("posts", $id);
    if($status){
        $_SESSION['status'] = 'Course Deleted Successfully.';
        $_SESSION['expire'] = time();

    }
    header("location: ".$_SERVER["HTTP_REFERER"]);

}


?>


