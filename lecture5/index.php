<?php
include 'upload.php';
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
        <form method="post" enctype="multipart/form-data">
            <h3>Add FIle</h3>
            <input type="file" name="file"><br><br>
            <button name="upload">upload</button>
        </form>
        </section>
        <section>
            <h3>Your Files</h3>
            <table class="tb">
                <?php for($i = 2; $i < count(scandir($base_dir)); $i++){ ?>
                <tr>
                    <td><?=scandir($base_dir)[$i] ?></td>
                    <td><a href="?file=<?=scandir($base_dir)[$i]?>&action=delete">Delete</a></td>
                    <td><a href="?file=<?=scandir($base_dir)[$i]?>&action=download">Download</a></td>
                </tr>
                <?php } ?>
            </table>
        </section>
    </main>
</body>
</html>