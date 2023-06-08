<?php
if(isset($_POST['addnew'])){ ?>
    <h3>Add new Post</h3>
    <form class="postform" action="/?page=admin" method="post" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title">
        <br>
        <label>Content</label>
        <textarea name="content" cols="30" rows="10"></textarea>
        <br>
        <label>Category</label>
        <select name="category">
            <?php
                $res = mysqli_query($con, "SELECT * from categories"); ?>
                <?php 
                while($row = $res->fetch_assoc()) { 
                ?>
                    <option value="<?=$row['id']?>"><?=$row['name'] ?></option>
                <?php 
                }
                ?>
        </select>
        <label>Image</label>
        <input type="file" name="image">
        <br>
        <button name="create-post">Create post</button>
    </form>
<?php
}else{
    $res = mysqli_query($con, "SELECT *, posts.id from posts join uploads on posts.uploads_id = uploads.id"); ?>
    <h1>Posts</h1>
    <hr>
    <form action="" method="post">
        <button name="addnew">add new</button>
    </form>
    <ul class="allpost">
    <?php
    while($row = $res -> fetch_assoc()){ ?>
        <li>
            <div class="insideposts">
                <img class="dashpost" src="<?=$row['path']?>" alt="">
                <h2><?=$row['title']?></h2>
                <a href="?action=edit&post_id=<?=$row['id']?>"><button>edit</button></a>
                <form method="post" action="/?page=admin">
                    <input type="hidden" name="postid" value="<?=$row['id']?>">
                    <button name="delete">delete</button>
                </form>
            </div>
        </li>
    <?php }?>
    </ul>
<?php
}
?>