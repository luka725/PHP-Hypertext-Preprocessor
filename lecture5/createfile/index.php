<?php
include 'file.php';
include 'delete.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main_wrapper">
        <section class="form_wrapper">
            <h3>Create File</h3>-
            <form method="post">
                <input type="text" name="file">
                <button name="create">Create</button>
            </form>
            <div class="list_wrapper">
                <table>
                    <?php
                        for($i = 2; $i < count(scandir($base_dir)); $i++){
                    ?>
                        <tr>
                            <td><?=scandir($base_dir)[$i]?></td>
                            <td><a href="?file=<?=scandir($base_dir)[$i]?>&action=read">Read</a></td>
                            <td><a href="?file=<?=scandir($base_dir)[$i]?>&action=edit">Edit</a></td>
                            <td><a href="?file=<?=scandir($base_dir)[$i]?>&action=delete">Delete</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </section>
        <section class="files_wrapper">
            <h3>File <?php if(isset($_GET['file'])){ echo $_GET['file']; }; ?></h3>
            <div class="content_wrapper">
                <?php 
                    if(isset($_GET['file'])){
                        include 'content.php';
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>