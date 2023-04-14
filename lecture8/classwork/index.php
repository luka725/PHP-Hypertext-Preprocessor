<?php
include 'file.php';
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
    <main>
        <section class="left">
            <h3>Create File</h3>
            <form method="post">
                <input type="text" name="f_name">
                <button>Create File</button>
            </form>
            <h3>List of File</h3>
            <table class="tb_list">
                <?php
                    for($i = 2; $i < count(scandir($dir)); $i++ ){
                ?>
                    <tr>
                        <td><?=scandir($dir)[$i]?></td>
                        <td><a href="?action=write&path=<?=$dir.'/'.scandir($dir)[$i]?>">write</a></td>
                        <td><a href="?action=read&path=<?=$dir.'/'.scandir($dir)[$i]?>">read</a></td>
                        <td><a href="?action=edit&path=<?=$dir.'/'.scandir($dir)[$i]?>">edit</a></td>
                    </tr>
                <?php } ?>    
            </table>
        </section>
        <section class="right">
            <?php
                if(isset($_GET['action']) and $_GET['action'] === 'write' ){
                    include 'write_form.php';
                }
                elseif (isset($_GET['action']) and $_GET['action'] === 'read' ) {
                    include 'read_form_file.php';
                }
                elseif (isset($_GET['action']) and $_GET['action'] === 'edit' ) {
                    include 'edit_form_file.php';
                }
            ?>
        </section>
    </main>
</body>
</html>