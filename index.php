<?php 
include "./app/DB.php";
include "./app/QueryBuilder.php";

$db = new DB();
$connection = $db->connect();
$query = new QueryBuilder($connection);

include "./views/frontend/header.php";
include "./views/frontend/nav.php";

if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "courses"){
        $cols = "posts.*, posts.id as p_id, categories.id as cat_id, classes.id as c_id, fees.id as f_id, t1.id as tutor, t2.id as admin, t1.name as tutor_name, t2.name as admin_name, classes.*, fees.*";
        $join = "INNER JOIN categories ON posts.category_id = categories.id INNER JOIN classes ON posts.class_id = classes.id INNER JOIN fees ON posts.fee_id = fees.id INNER JOIN users t1 ON posts.tutor_id = t1.id INNER JOIN users t2 ON posts.created_by = t2.id";
        $where = "category_id = 2";
        $courses = $query->getAll("posts", $cols, $join, $where, "posts.id DESC");
        include "./views/frontend/pages/courses.php";
    }else if($page == "about"){

        $cols = "users.*, users.id as u_id, roles.id as r_id, roles.roleName, education.id as e_id, education.*";
        $join = "inner join roles on users.role_id=roles.id RIGHT OUTER JOIN education on users.id=education.user_id";
        $where = "roles.id=3 && user_status!='pending'";
        $tutors=$query->getAll("users", $cols, $join, $where, "users.id DESC");
        include "./views/frontend/pages/about.php";
    }else if($page == "blog"){

        $cols = "posts.*, posts.id as p_id, posts.image as p_img, categories.id as cat_id, t2.id as admin, t3.id as editor, t2.name as admin_name, t3.name as editor_name, t2.*, t3.*";
        $join = "INNER JOIN categories ON posts.category_id = categories.id INNER JOIN users t2 ON posts.created_by = t2.id LEFT OUTER JOIN users t3 ON posts.updated_by = t3.id";
        $where = "category_id = 1";
        $blogs = $query->getAll("posts", $cols, $join, $where, "posts.id DESC");
        include "./views/frontend/pages/blog.php";
    }
}else{
    include "./views/frontend/intro.php";
    include "./views/frontend/about.php";
    include "./views/frontend/course.php";
    include "./views/frontend/blog.php";
    include "./views/frontend/contact.php";
}




include "./views/frontend/footer.php";


?>
 













