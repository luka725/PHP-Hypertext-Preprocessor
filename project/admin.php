<?php
session_start();
if(isset($_GET['page'])){
    if($_GET['page'] === 'logout'){
        unset($_SESSION['user_id']);
        session_destroy();
        header("Location: /", true, 301);
    }
}
if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $res = mysqli_query($con, "SELECT * from users join roles on roles.id = users.role_id and users.id = '$id'");
    $row = $res -> fetch_assoc();
    if($row['name'] === 'admin' || $row['name'] === 'editor'){ ?>
            <div class="admin">
                <a class="dashtext" href="?page=admin"><img class="dashimage" src="/assets/images/dashboard.png" alt=""/><h3>Dashboard</h3></a>
                <?php
                if(isset($_GET['post_id'])){ ?>
                    <h3 class="posteditaction"><a href="?action=edit&post_id=<?=$_GET['post_id']?>">Edit</a></h3>
               <?php }
                ?>
                <h2 class="greeting">Hello <?=$row['username'];?></h2>
            </div>
    <?php
    }
}
?>