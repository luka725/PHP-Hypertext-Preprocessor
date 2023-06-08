<?php
$post_id = $_GET['post_id'];
$res = mysqli_query($con, "SELECT *, posts.id from posts join uploads on posts.uploads_id = uploads.id and posts.id = $post_id join categories on posts.category_id = categories.id");
$row = $res->fetch_assoc();
?>

<section class="singlepost">
        <h2><a href="/">/Home</a></h2>
        <br>
        <div class="singleinner">
        <img class="singleimg" src="<?=$row['path'];?>" alt="">
        <form class="editpostform" action="/?page=admin" method="post">
            <label>Title</label>
            <textarea type="text" name="edit-title"><?=$row['title'];?></textarea>
            <label>Content</label>
            <textarea type="text" cols="30" rows="10" name="edit-content"><?php echo $row['content'];?></textarea>
            <br>
            <label>Category</label>
            <select name="cat-id">
                <?php
                    $nres = mysqli_query($con, "SELECT * from categories"); ?>
                    <?php 
                    while($nrow = $nres->fetch_assoc()) { 
                    ?>
                        <option value="<?=$nrow['id']?>"><?=$nrow['name'] ?></option>
                    <?php 
                    }
                    ?>
            </select>
            <input type="hidden" name="pid" value="<?php echo $row['id'];?>">
            <br>
            <button name="savedata">save</button>
        </form>
</section>