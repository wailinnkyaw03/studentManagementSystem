<?php 
session_start();

include "../../app/DB.php";
include "../../app/Admin.php";
include "../../app/AdminLogin.php";
include "../../app/Classes.php";
include "../../app/Course.php";
include "../../app/Edu&Exp.php";


$db = new DB();
$connection = $db->connect();
$adminDB = new Admin($connection);
$adminlogin = new AdminLogin($connection);
$classDB = new Classes($connection);
$courseDB = new Course($connection);
$eduDB = new Education($connection);
$expDB = new Experience($connection);

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
        $user_id = $_GET['id'];
        $educations = $eduDB->getAll($user_id);
        include "./admins/adminedit.php";
    }else if($page=="detail"){
        $id = $_GET['id'];
        $admin = $adminDB->get($id);
        $user_id = $_GET['id'];
        $educations = $eduDB->getAll($user_id);
        include "./admins/detail.php";//detail
    }else if($page=="eduadd"){
        $id = $_GET['id'];
        $admin = $adminDB->get($id);
        $user_id = $_GET['id'];
        $educations = $eduDB->getAll($user_id);
        include "./education/eduadd.php";//education
    }else if($page=="eduedit"){
        $id = $_GET['id'];
        $admin = $adminDB->get($id);
        $edu_id = $_GET['edu_id'];
        $education = $eduDB->get($edu_id);
        include "./education/eduedit.php";//education
    }else if($page=="addStudent"){//student
        $classes = $classDB->getAll();
        $courses = $courseDB->getAll();
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
        $classes = $classDB->getAll();
        include "./classes/classlist.php";
    }else if($page=="classedit"){
        $id = $_GET['id'];
        $class = $classDB->get($id);
        include "./classes/classedit.php";
    }else if($page=="addCourse"){//course
        $classes = $classDB->getAll();
        include "./courses/addCourse.php";
    }else if($page=="courselist"){
        $courses = $courseDB->getAll();
        include "./courses/courselist.php";
    }else if($page=="courseedit"){
        $id = $_GET['id'];
        $course = $courseDB->get($id);
        $classes = $classDB->getAll();
        include "./courses/courseedit.php";
    }else if($page=="addfee"){//fee
        include "./fees/addfee.php";
    }else if($page=="feelist"){
        include "./fees/feelist.php";
    }else if($page=="feeEdit"){
        include "./fees/feeEdit.php";
    }
}else{
    include "dashboard.php";
}



include "footer.php";







?>