<?php
include_once 'functions.php';

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $res = mysqli_query($con, "SELECT *, users.id from users join roles on roles.id = users.role_id and users.id = '$id'");
    $row = $res -> fetch_assoc();
    $usr = $row['id'];
    $user_role = get_user_role($con);
    if($row['name'] === 'admin' || $row['name'] === 'editor'){ ?>
        <section class="dashboard">
            <div class="dashmenu">
                <a class="inout" href="?page=admin&index=posts"><h1>Posts</h1></a>
                <a class="inout" href="?page=admin&index=categories"><h1>Categories</h1></a>
                <?php
                if($user_role === 'admin'){ ?>
                    <a class="inout" href="?page=admin&index=users"><h1>Users</h1></a>
                <?php }
                ?>
            </div>
            <div class="dashcontent">
                <?php
                    if(isset($_POST['create-post'])){
                        $title = $_POST['title'];
                        $content = $_POST['content'];
                        $timestamp = date("Y-m-d H:i:s");
                        $category = $_POST['category'];
                        $target_dir = "./uploads/";
                        $target_file = $target_dir.basename($_FILES["image"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        $file = htmlspecialchars( basename( $_FILES["image"]["name"]));
                        mysqli_query($con, "INSERT into uploads (path, user_id) VALUES ('/uploads/$file', '$usr')");
                        $uploaded_id = mysqli_insert_id($con);
                        mysqli_query($con, "INSERT into posts (title, content, user_id, category_id, date, uploads_id) VALUES ('$title', '$content','$usr', '$category', CURRENT_TIMESTAMP(), '$uploaded_id')");
                        echo "<h3 class='notify'>Post created successfully</h3>";
                        //echo mysqli_error($con);
                    }
                    if(isset($_POST['delete'])){
                        $pid = $_POST['postid'];
                        mysqli_query($con, "DELETE FROM posts where id = '$pid'");
                        echo "<h3 class='notify'>Post deleted successfully</h3>";
                    }
                    if(isset($_POST['savedata'])){
                        $title = $_POST['edit-title'];
                        $content = $_POST['edit-content'];
                        $cat = $_POST['cat-id'];
                        $pid = $_POST['pid'];
                        mysqli_query($con, "UPDATE posts set title = '$title', content = '$content', category_id = $cat where id = $pid");
                        echo "<h3 class='notify'>Post updated successfully</h3>";
                        //echo mysqli_error($con);
                    }
                    if(isset($_POST['create-category'])){
                        $title = $_POST['catname'];
                        mysqli_query($con, "INSERT into categories (name) VALUES ('$title')");
                        echo "<h3 class='notify'>Category created successfully</h3>";
                    }
                    if(isset($_POST['edit-cat'])){
                        $id = $_POST['cid'];
                        $name = $_POST['newname'];
                        mysqli_query($con, "UPDATE categories set name = '$name' where id = $id");
                        echo "<h3 class='notify'>Category updated successfully</h3>";
                    }
                    if(isset($_POST['delete-category'])){
                        $id = $_POST['catid'];
                        mysqli_query($con, "DELETE FROM categories where id = '$id'");
                        echo "<h3 class='notify'>Category deleted successfully</h3>";
                    }
                    if(isset($_POST['create-user'])){
                        $name = $_POST['username'];
                        $email = $_POST['useremail'];
                        $password = $_POST['userpass'];
                        $role_id = $_POST['role'];
                        mysqli_query($con, "INSERT into users (username, email, password, role_id) VALUES ('$name', '$email', '$password', '$role_id')");
                        echo "<h3 class='notify'>User created successfully</h3>";
                    }
                    if(isset($_POST['save-user'])){
                        $name = $_POST['uname'];
                        $email = $_POST['uemail'];
                        $password = $_POST['upass'];
                        $role_id = $_POST['role'];
                        $id = $_POST['u_id'];
                        mysqli_query($con, "UPDATE users set username = '$name', email = '$email', password = '$password', role_id =  '$role_id' where id = $id");
                        echo "<h3 class='notify'>User edited successfully</h3>";
                    }
                    if(isset($_POST['delete-user'])){
                        $id = $_POST['user_id'];
                        mysqli_query($con, "DELETE from users where id = '$id'");
                        echo "<h3 class='notify'>User deleted successfully</h3>";
                    }
                ?>
                <?php include "dashboard-controller.php";?>
            </div>
        </section>
<?php
    }
}else{
    header("Location: /", true, 301);
}

?>