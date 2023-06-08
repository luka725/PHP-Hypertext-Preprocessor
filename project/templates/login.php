<?php
if(isset($_POST['login'])){
    $username = $_POST['user'];
    $passwd = $_POST['password'];
    $res = mysqli_query($con, "SELECT * from users where username = '$username'");
    $row = $res -> fetch_assoc();
    if(!empty($row)){
        if($passwd === $_POST['password']){
            $_SESSION['user_id'] = $row['id'];
            header("Location: /", true, 301);
        }
    }else{
        echo "Please rewrite credentials";
    }
}
?>
<form class="login" action="" method="post">
    <label>Username</label>
    <input name="user" type="text">
    <br>
    <label>Password</label>
    <input name="password" type="password">
    <br>
    <button name="login">Login</button>
</form>