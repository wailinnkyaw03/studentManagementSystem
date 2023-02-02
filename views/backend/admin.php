<?php 
session_start();

include "../../app/DB.php";
include "../../app/Admin.php";


$db = new DB();
$connection = $db->connect();
$adminDB = new Admin($connection);


if(!isset($_SESSION['auth'])){
    header("location: login.php");
}



include "header.php";
include "nav.php";

if(isset($_GET["page"])){
    $page = $_GET["page"];
    if($page=="dashboard"){
        include "dashboard.php";
    }else if($page=="addAdmin"){//admin
        include "./admins/addAdmin.php";
    }else if($page=="adminlist"){
        $admins = $adminDB->getAll();
        include "./admins/adminlist.php";
    }else if($page=="adminedit"){
        $id = $_GET['id'];
        $admin = $adminDB->get($id);
        include "./admins/adminedit.php";
    }else if($page=="addStudent"){//student
        include "./students/addStudent.php";
    }else if($page=="studentlist"){
        include "./students/studentlist.php";
    }else if($page=="studentedit"){
        include "./students/studentedit.php";
    }else if($page=="addTutor"){//tutor
        include "./tutors/addTutor.php";
    }else if($page=="tutorlist"){
        include "./tutors/tutorlist.php";
    }else if($page=="tutoredit"){
        include "./tutors/tutoredit.php";
    }else if($page=="addClass"){//class
        include "./classes/addClass.php";
    }else if($page=="classlist"){
        include "./classes/classlist.php";
    }else if($page=="classedit"){
        include "./classes/classedit.php";
    }else if($page=="addCourse"){//course
        include "./courses/addCourse.php";
    }else if($page=="courselist"){
        include "./courses/courselist.php";
    }else if($page=="courseedit"){
        include "./courses/courseedit.php";
    }
}else{
    // $id = $_GET['id'];
    // $admin = $adminDB->check($id);
    include "dashboard.php";
}



include "footer.php";







?>