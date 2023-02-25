<?php 
session_start();
include "../app/DB.php";
include "../app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$fees = new QueryBuilder($connection);

if(isset($_POST['feeamount'])){
    $feeamount = $_POST['feeamount'];
    $created_by = $_POST['created_by'];
    if($feeamount==""){
        $_SESSION['feeamount']="Fee Amount Must Not Be Empty";
        header("location :".$_SERVER["HTTP_REFERER"]);
    }else{
        unset($_SESSION['feeamount']);
        $datas =[
            "feeamount" => $feeamount,
            "created_by" => $created_by
        ];
        if($_POST['action']=="add"){
             $status = $fees->create("fees", $datas);
             if($status){
                $_SESSION['status'] = "Fees Added Successfully";
                $_SESSION['expire'] = time();
                header("location: ../views/backend/admin.php?page=feelist");
             }
        }else if($_POST['action']=="update"){
            $id = $_POST['id'];
            
            $status = $fees->update("fees", $datas, $id);
             if($status){
                $_SESSION['status'] = "Fees Updated Successfully";
                $_SESSION['expire'] = time();
                header("location: ../views/backend/admin.php?page=feelist");
             }
        }
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = $fees->delete("fees", $id);
    if($status){
        $_SESSION['status']="Fees Deleted Successfully";
        $_SESSION['expire']=time();
    }
    header("location: ".$_SERVER['HTTP_REFERER']);
}


?>