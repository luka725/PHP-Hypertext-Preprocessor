<?php
include_once "functions.php";
$user_role = get_user_role($con);
if($user_role === 'admin'){
    if(isset($_POST['add-user'])){ ?>
            <h3>Add new User</h3>
            <form class="usersform" action="/?page=admin&index=users" method="post">
                <label>User name</label>
                <br>
                <input type="text" name="username">
                <br>
                <br>
                <label>Email</label>
                <br>
                <input type="text" name="useremail">
                <br>
                <br>
                <label>Password</label>
                <br>
                <input type="text" name="userpass">
                <br>
                <br>
                <label>Role</label>
                <br>
                <select name="role">
                    <?php
                        $res = mysqli_query($con, "SELECT * from roles"); ?>
                        <?php 
                        while($row = $res->fetch_assoc()) { 
                        ?>
                            <option value="<?=$row['id']?>"><?=$row['name'] ?></option>
                        <?php 
                        }
                        ?>
                </select>
                <br>
                <br>
                <button name="create-user">Add</button>
            </form>
    <?php
    }
    elseif(isset($_POST['edit-user'])){ 
        $id = $_POST['user_id'];
        $res = mysqli_query($con, "SELECT * from users where id = $id");
        $row = $res -> fetch_assoc();
        ?>
        <h3>Edit User <?=$row['username']?></h3>
        <form class="usersform" action="/?page=admin&index=users" method="post">
            <label>new User name</label>
            <br>
            <input type="text" name="uname">
            <br>
            <br>
            <label>new Email</label>
            <br>
            <input type="text" name="uemail">
            <br>
            <br>
            <label>new Password</label>
            <br>
            <input type="text" name="upass">
            <input type="hidden" name="u_id" value="<?=$id?>">
            <br>
            <br>
            <label>Role</label>
            <br>
            <select name="role">
                <?php
                    $res = mysqli_query($con, "SELECT * from roles"); ?>
                    <?php 
                    while($row = $res->fetch_assoc()) { 
                    ?>
                        <option value="<?=$row['id']?>"><?=$row['name'] ?></option>
                    <?php 
                    }
                    ?>
            </select>
            <br>
            <br>
            <button name="save-user">Save</button>
    <?php
    }
    else{
        $res = mysqli_query($con, "SELECT *, users.id from users join roles on users.role_id = roles.id"); ?>
        <h1>Users</h1>
        <hr>
        <form action="" method="post">
                <button name="add-user">add new</button>
        </form>
        <ul class="allusers">
        <?php
            while($row = $res -> fetch_assoc()){ ?>
            <li>
                <div class="users">
                    <h3><?=$row['username']?></h3>
                    <h3><?=$row['email']?></h3>
                    <h3><?=$row['name']?></h3>
                    <form method="post" action="/?page=admin&index=users">
                        <input type="hidden" name="user_id" value="<?=$row['id']?>">
                        <button name="edit-user">Edit</button>
                    </form>
                    <form method="post" action="/?page=admin&index=users">
                        <input type="hidden" name="user_id" value="<?=$row['id']?>">
                        <button name="delete-user">delete</button>
                    </form>
                </div>
            </li>
            <hr>
        <?php }?>
        </ul>
    <?php
    }
}else{
    header("Location: /?page=admin", true, 301);
}
?>