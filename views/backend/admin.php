<?php 
session_start();

include "../../app/DB.php";
include "../../app/QueryBuilder.php";
include "../../app/AdminLogin.php";

$db = new DB();
$connection = $db->connect();
$query = new QueryBuilder($connection);
$adminlogin = new AdminLogin($connection);


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
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "roles.id=2 || roles.id=1";
        $admins=$query->getAll("users", $cols, $join, $where, "users.id DESC");
        include "./admins/adminlist.php";

    }else if($page=="adminedit"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $admin = $query->get("users", $cols, $join, $where);
        
        $where = "user_id=$id";
        $educations = $query->getAll("education", "*", null, $where, "id DESC");
        $experiences = $query->getAll("experience", "*", null, $where, "id DESC");
        include "./admins/adminedit.php";
        
    }else if($page=="detail"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $admin = $query->get("users", $cols, $join, $where);

        $where = "user_id=$id";
        $educations = $query->getAll("education", "*", null, $where, "id DESC");
        $experiences = $query->getAll("experience", "*", null, $where, "id DESC");
        include "./admins/detail.php";//detail

    }else if($page=="eduadd"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $user = $query->get("users", $cols, $join, $where);

        $where = "user_id=$id";
        $educations = $query->getAll("education", "*", null, $where, "id DESC");
        include "./education/eduadd.php";//education

    }else if($page=="eduedit"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $user = $query->get("users", $cols, $join, $where);

        $edu_id = $_GET['edu_id'];
        $cols = "education.*, education.id as e_id, users.id as u_id, users.*";
        $join = "inner join users on education.user_id=users.id";
        $where = "education.id=$edu_id && users.id=$id";
        $education = $query->get("education", $cols, $join, $where);
        include "./education/eduedit.php";//education
        
    }else if($page=="expadd"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $user = $query->get("users", $cols, $join, $where);

        $where = "user_id=$id";
        $experiences = $query->getAll("experience", "*", null, $where, "id DESC");
        include "./experience/expadd.php";//experience

    }else if($page=="expedit"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $user = $query->get("users", $cols, $join, $where);

        $exp_id = $_GET['exp_id'];
        $cols = "experience.*, experience.id as e_id, users.id as u_id, users.*";
        $join = "inner join users on experience.user_id=users.id";
        $where = "experience.id=$exp_id && users.id=$id";
        $experience = $query->get("experience", $cols, $join, $where);
        include "./experience/expedit.php";//experience
        
    }else if($page=="addStudent"){//student
        $classes = $query->getAll("classes", "*", null, null, null);
        include "./students/addStudent.php";
    }else if($page=="studentlist"){
        include "./students/studentlist.php";
    }else if($page=="studentedit"){
        $classes = $query->getAll("classes", "*", null, null, null);
        include "./students/studentedit.php";
    }else if($page=="addTutor"){//tutor
        
        include "./tutors/addTutor.php";
    }else if($page=="tutorlist"){
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "roles.id=3";
        $tutors=$query->getAll("users", $cols, $join, $where, "users.id DESC");
        include "./tutors/tutorlist.php";
    }else if($page=="tutordetail"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $tutor=$query->get("users", $cols, $join, $where);
        $where = "user_id=$id";
        $educations = $query->getAll("education", "*", null, $where, "id DESC");
        $experiences = $query->getAll("experience", "*", null, $where, "id DESC");
        include "./tutors/detail.php";
    }else if($page=="tutoredit"){
        $id = $_GET['id'];
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "users.id=$id";
        $user=$query->get("users", $cols, $join, $where);

        $where = "user_id=$id";
        $educations = $query->getAll("education", "*", null, $where, "id DESC");
        $experiences = $query->getAll("experience", "*", null, $where, "id DESC");


        include "./tutors/tutoredit.php";
    }else if($page=="addClass"){//class start
        include "./classes/addClass.php";
    }else if($page=="classlist"){
        $cols = "classes.*, classes.id as c_id, users.id as u_id, users.name";
        $classes = $query->getAll("classes", $cols, "inner join users on classes.created_by=users.id", null, null);
        include "./classes/classlist.php";
    }else if($page=="classedit"){
        $id = $_GET['id'];
        $where = "id=$id";
        $class = $query->get("classes", "*", null, $where);
        include "./classes/classedit.php"; //class end
    }else if($page=="addCourse"){//course start
        $classes = $query->getAll("classes", "*", null, null, null);
        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName";
        $join = "inner join roles on users.role_id=roles.id";
        $where = "roles.id=3";
        $tutors=$query->getAll("users", $cols, $join, $where, "users.id DESC");
        
        $cols = "fees.*, fees.id as f_id, users.id as u_id, users.*";
        $join = "inner join users on fees.created_by=users.id";
        $fees = $query->getAll("fees", $cols, $join, null, null);
        include "./courses/addCourse.php";
    }else if($page=="courselist"){
        $cols = "posts.*, posts.id as p_id, classes.id as c_id, classes.*, users.id as u_id, users.name, fees.id as f_id, fees.feeamount";
        $join = "inner join classes on posts.class_id=classes.id inner join users t1 on posts.tutor_id=t1.id inner join users t2 on posts.created_by=t2.id inner join fees on posts.fee_id=fees.id";
        $where = "category_id = 2";
        $courses = $query->getAll("posts", $cols, $join, $where, "posts.id DESC");
        
        include "./courses/courselist.php";
    }else if($page=="courseedit"){
        $id = $_GET['id'];
        $classes = $query->getAll("classes", "*", null, null, null);
        
        $cols = "fees.*, fees.id as f_id, users.id as u_id, users.*";
        $join = "inner join users on fees.created_by=users.id";
        $fees = $query->getAll("fees", $cols, $join, null, null);
        include "./courses/courseedit.php"; //course end
    }else if($page=="addfee"){//fee
        include "./fees/addfee.php";
    }else if($page=="feelist"){
        $cols = "fees.*, fees.id as f_id, users.id as u_id, users.*";
        $join = "inner join users on fees.created_by=users.id";
        $fees = $query->getAll("fees", $cols, $join, null, null);
        include "./fees/feelist.php";
    }else if($page=="feeEdit"){
        $id = $_GET['id'];
        $where = "id=$id";
        $fee = $query->get("fees", "*", null, $where);
        include "./fees/feeEdit.php";
    }
}else{
    include "dashboard.php";
}



include "footer.php";







?>