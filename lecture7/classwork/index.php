<?php
include 'upload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <h3>Upload File</h3>
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <input type="file" name="f_name">
                <br><br>
                <button name="upload">upload</button>
            </form>
        </div>
        <div class="list">
            <h3>Content of root folder</h3>
            <table class="tb">
            <?php for($i = 2; $i < count(scandir('root')); $i++){ ?>
                <tr>
                    <td><?=scandir('root')[$i]?></td><td><a href="?file=<?=scandir('root')[$i]?>">Delete</a></td>
                </tr>
            <?php }?>
            </table> 
        </div>
    </div>
</body>
</html>
