<?php
$post_id = $_GET['post_id'];
$res = mysqli_query($con, "SELECT * from posts join uploads on posts.uploads_id = uploads.id and posts.id = $post_id join categories on posts.category_id = categories.id join users on posts.user_id = users.id");
$row = $res->fetch_assoc();
?>

<section class="singlepost">
        <h2><a href="/">/Home</a></h2>
        <br>
        <div class="singleinner">
        <img class="singleimg" src="<?=$row['path'];?>" alt="">  
        <div class='title'>
                <h1><?=$row['title'];?></h1>
                <h1>Category: <a href="?cat_id=<?=$row['id'] ?>"><?=$row['name'] ?></a></h1>
        </div>
        <h5><?=date('Y-m-d', strtotime(($row['date'])))?></h5>
        <h5>Author: <?=$row['username']?></h5>
        <p class="content"><?=$row['content']?></p>
        </div>
</section>