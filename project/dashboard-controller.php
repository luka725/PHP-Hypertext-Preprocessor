<?php
if(isset($_GET['page'], $_GET['index'])){
    if($_GET['page'] === "admin"){
        switch($_GET['index']){
            case "posts":
                include "./templates/admin-posts.php";
                break;
            case "categories":
                include "./templates/admin-categories.php";
                break;
            case "users":
                include "./templates/admin-users.php";
                break;
            default:   
                include "./templates/admin-posts.php";    
        }
    }
}else{
   include "./templates/admin-posts.php";
}

?>