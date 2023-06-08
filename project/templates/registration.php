<?php
if(isset($_POST['register'])){
    $uname = $_POST['uname'];
    $mail = $_POST['email'];
    $pass = $_POST['passwd'];
    $con->query("INSERT into users (username, email, password, role_id) VALUES ('$uname', '$mail', '$pass', 3)");
    header("Location: /", true, 301);
}
?>
<form action="" method="post" class="registration">
    <label>username</label>
    <input type="text" name="uname">
    <br>
    <label>email</label>
    <input type="text" name="email">
    <br>
    <label>password</label>
    <input type="password" name="passwd">
    <br>
    <button name="register">register</button>
</form>