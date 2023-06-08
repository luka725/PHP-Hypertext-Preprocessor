<?php
include "functions.php";

if(isset($_GET['page'])){
    switch ($_GET['page']){
        case "login":
            include "templates/login.php";
            break;
        case "registration":
            include "templates/registration.php";
            break;
        case "admin":
            include "templates/dashboard.php";
            break;
        default:
            include "templates/posts.php";    
    }
}
else if(isset($_GET['post_id'])){
        if(isset($_GET['action']) && $_GET['action'] === 'edit'){
            $role = get_user_role($con);
            if($role === 'admin' || $role === 'editor'){
                include "templates/edit-post.php";
            }else{
                header("Location: /", true, 301);
            }
        }
        else{
        include "templates/single-post.php";
        }
    }
else{
    include "templates/posts.php";  
}
?>