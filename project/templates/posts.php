<?php 
$res = mysqli_query($con, "SELECT * from categories");
?>
<nav class="catmenu">
    <a href="/">ALL</a>
    <?php
    while($row = $res->fetch_assoc()) { 
    ?>
        <a href="?cat_id=<?=$row['id'] ?>"><?=$row['name'] ?></a>
    <?php 
    }
    ?>
</nav>
<?php
    if(!isset($_GET['cat_id'])){
        $res = mysqli_query($con, "SELECT *, posts.id from posts join uploads on posts.uploads_id = uploads.id join users on posts.user_id = users.id");
    }
    else{
        $cat_id = $_GET['cat_id'];
        $res = mysqli_query($con, "SELECT *, posts.id from posts join uploads on posts.uploads_id = uploads.id and posts.category_id = $cat_id join users on posts.user_id = users.id");
    }
    if(!empty($res)){
        $increment = 0;
        while($row = $res->fetch_assoc()) {
            if($increment == 0){ ?>
            <div class="container">
            <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <a href="?post_id=<?=$row['id']?>"><img src="<?=$row['path'];?>" alt=""></a>
                    </div>
                    <div class="card-body">
                        <span class="tag tag-teal"><?=date('Y-m-d', strtotime(($row['date'])));?></span>
                        <h4>
                            <a href="?post_id=<?=$row['id']?>"><?=$row['title'];?></a>
                        </h4>
                        <p><?=substr($row["content"], 0, 100);?>...</p>
                        <div class="user-info">
                            <h5>Author: <?=$row["username"]?></h5>
                        </div>
                    </div>
                </div>
        <?php 
            $increment++;
            if($increment == 3){?>
            </div>
            <?php
            $increment = 0;
            }
        }   
    }else{
        echo "No posts for this category!";
    }  
?>