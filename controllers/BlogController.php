<?php 
session_start();
include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$blogDB = new QueryBuilder($connection);

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    //image
    $image_arr = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../assets/profileImages/";
    $image = uniqid("blog").$image_arr;
    move_uploaded_file($tmp_name, $folder.$image);

    if($title == "" | $description == ""){
        if($title == ""){
            $_SESSION['title'] = "Blog Title Must Not Be Empty";
        }
        if($description == ""){
            $_SESSION['description'] = "Blog Description Must Not Be Empty";
        }
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['title']);
        unset($_SESSION['description']);

        if($_POST['action']=='add'){
            $created_by = $_POST['created_by'];
            $datas = [
                "title" => $title,
                "image" => $image,
                "description" => $description, 
                "created_by" => $created_by,
                "category_id" => 1
            ];
            // echo "<pre>";
            // print_r($datas);
            // echo "</pre>";
            $status = $blogDB->create("posts", $datas);
            if($status){
                $_SESSION['status'] = 'Blog Created Successfully.';
                $_SESSION['expire'] = time();

            }else{
                $_SESSION['status'] = 'Blog Creation Fail.';
                $_SESSION['expire'] = time();

            }
            // header("location: ../views/backend/admin.php?page=bloglist");

        }else if($_POST['action']=='update'){
            $id = $_POST['id'];
            $updated_by = $_POST['updated_by'];
            if($image_arr != null){
                $datas = [
                    "title" => $title,
                    "image" => $image,
                    "description" => $description, 
                    "updated_by" => $updated_by,
                    "category_id" => 1
                ];
                $status = $blogDB->update("posts", $datas, $id);
                if($status){
                    $_SESSION['status'] = 'Blog Updated with Photo Successfully.';
                    $_SESSION['expire'] = time();

                }else{
                    $_SESSION['status'] = 'Blog Updating Fail.';
                    $_SESSION['expire'] = time();

                }
                header("location: ../views/backend/admin.php?page=bloglist");
            }else{
                $datas = [
                    "title" => $title,
                    "description" => $description, 
                    "duration" => $duration,
                    "updated_by" => $updated_by,
                    "category_id" => 1
                ];
                $status = $blogDB->update("posts", $datas, $id);
                if($status){
                    $_SESSION['status'] = 'Blog Updated without Photo Successfully.';
                    $_SESSION['expire'] = time();

                }else{
                    $_SESSION['status'] = 'Blog Updating Fail.';
                    $_SESSION['expire'] = time();

                }
                header("location: ../views/backend/admin.php?page=bloglist");
            }
        }
    }

    
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $blogDB->delete("posts", $id);
    if($status){
        $_SESSION['status'] = 'Blog Deleted Successfully.';
        $_SESSION['expire'] = time();

    }
    header("location: ".$_SERVER["HTTP_REFERER"]);

}


?>


