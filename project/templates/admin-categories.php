<?php
    if(isset($_POST['edit-category'])){
        $id = $_POST['ctid'];
        $res = mysqli_query($con, "SELECT * from categories where id = $id");
        $row = $res -> fetch_assoc();
        ?>
        <h3>Edit Category <?=$row['name']?></h3>
        <form class="catsform" action="/?page=admin&index=categories" method="post">
            <label>new category name</label>
            <input type="text" name="newname">
            <input type="hidden" name="cid" value="<?=$row['id']?>">
            <br><br>
            <button name="edit-cat">save</button>
        </form>
    <?php }
    else if(isset($_POST['add_cat'])){ ?>
        <h3>Add new Category</h3>
        <form class="catsform" action="/?page=admin&index=categories" method="post">
            <label>Category name</label>
            <input type="text" name="catname">
            <br><br>
            <button name="create-category">create</button>
        </form>
    <?php
    }else{
        $res = mysqli_query($con, "SELECT * from categories"); ?>
        <h1>Categories</h1>
        <hr>
        <form action="" method="post">
            <button name="add_cat">add new</button>
        </form>
        <ul class="allcats">
        <?php
        while($row = $res -> fetch_assoc()){ ?>
        <li class="categories">
            <div class="cats">
                <h2><?=$row['name']?></h2>
                <form method="post" action="/?page=admin&index=categories">
                    <input type="hidden" name="ctid" value="<?=$row['id']?>">
                    <button name="edit-category">edit</button>
                </form>
                <form method="post" action="/?page=admin&index=categories">
                    <input type="hidden" name="catid" value="<?=$row['id']?>">
                    <button name="delete-category">delete</button>
                </form>
            </div>
        </li>
        <hr>
    <?php }?>
    </ul>
    <?php
    }
?>