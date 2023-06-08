<?php

function get_user_role($con){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $res = mysqli_query($con, "SELECT * from users join roles on roles.id = users.role_id and users.id = '$id'");
        $row = $res -> fetch_assoc();
        $user_role = $row['name'];
    }
    return $user_role;
}

?>