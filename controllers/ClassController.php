<?php 
session_start();

include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$classes = new QueryBuilder($connection);

if(isset($_POST['type'])){
    $type = $_POST['type'];
    if($type == ""){
        $_SESSION['type'] = "Class Type Must Not Be Empty";
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['type']);

        if($_POST['action']=='add'){
            $created_by = $_POST['created_by'];
            $datas = [
                "type"=> $type,
                "created_by"=>$created_by
            ];
            $status = $classes->create("classes", $datas);
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
            $created_by = $_POST['created_by'];
            $datas = [
                "type"=> $type,
                "created_by"=>$created_by
            ];

            $status = $classes->update("classes", $datas, $id);
            
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

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $classes->delete("classes", $id);
    if($status){
        $_SESSION['status']="Classes Deleted Successfully";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER["HTTP_REFERER"]);
}

?>