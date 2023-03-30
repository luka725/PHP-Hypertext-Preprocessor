<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3><?=$_POST['name']." ".$_POST['lname']?></h3>
        <form action="" method="post" class="tb">
            <table>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Grade</th>
                    <th>Max Point</th>
                </tr>
                <?php
                    for($i = 0; $i < count($_POST['answerr']); $i++):
                ?>
                <tr>
                    <td><?=$_POST['questionn'][$i]?></td>
                    <td><?=$_POST['answerr'][$i]?></td>
                    <td><?=$_POST['grade'][$i]?></td>
                    <td><?=$_POST['pointss'][$i]?></td>
                </tr>
                <?php
                    endfor;
                ?>
            </table>
        </form>
    </div>
<?php

?>
</body>
</html>