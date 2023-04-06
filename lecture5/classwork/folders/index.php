<?php
$name = 'root';
$name_a = "<a href=?dir=".$name.">".$name."</a>";
if(isset($_GET['dir'])):
    if($_GET['dir']!='root'):
        $name .= "/".$_GET['dir'];
        $name_a.= "/<a href=root/".$_GET['dir'].">".$_GET['dir']."</a>";
    endif;
endif;
if(isset($_POST['folder'])):
    mkdir($name."/".$_POST['folder']);
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> 
        <div class="form">
            <h2>Create folder</h2>
            <form method="post">
                <input type="text" name="folder" placeholder="Folder name">
                <br><br>
                <button>Create folder</button>
            </form>
        </div>
        <div class="list">
            <h2><?=$name_a?> items</h2>
            <ul>
                <?php
                
                for($i = 2; $i < count(scandir($name)); $i++):

                ?>
                <li><a href="?dir=<?=scandir($name)[$i]?>"><?=scandir($name)[$i]?></a></li>
                <?php 
                
                endfor;
                
                ?>
            </ul>
        </div>
    </div>
</body>
</html>