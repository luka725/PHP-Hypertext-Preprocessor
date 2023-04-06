<?php
    $s = "Who \n s Peter Griffin?\"";
    echo $s;
    echo "<br>";
    echo stripslashes($s);
    $error_ms = "";
    $name = "";
    $email = "";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(isset($_POST["send"])){
       $name = stripslashes(htmlspecialchars(trim($_POST["user"])));
       $email = htmlspecialchars(trim($_POST["email"]));
       echo $name;
       echo "<br>";
       echo $email;
       if(strlen($name)<4){
         $error_ms .= "User is not valid!!<br>";
         $nema_b = TRUE;
       }
       if(strlen($email)<4){
         $error_ms .= "Email is not valid!!<br>";
         $email_b = TRUE;
       }
       if(!isset($nema_b) and !isset($email_b)){
         $name = "";
         $email = "";
       }
    }
?>

<div class="container">
    <h3>Form</h3>
    <div class="error"><?=$error_ms?></div>
    <form action="" method="post">
        <input type="hidden" value="1234">
        <input type="text" name="user" placeholder="user" value="<?=$name ?>"> - *
        <br><br>
        <input type="text" name="email" placeholder="email" value="<?=$email ?>"> - *
        <br><br>
        <button name="send">Send</button>
    </form>
</div>

<!-- <script>
    while(true);   
</script> -->

<!-- <b>Hello</b> -->