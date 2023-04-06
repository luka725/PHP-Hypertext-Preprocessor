<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3><?=$_POST['name']." ".$_POST['lname']?></h3>
        <form action="grade.php" method="post" class="tb">
            <input type="hidden" name="lname" value="<?=$_POST['name']?>">
            <input type="hidden" name="name" value="<?=$_POST['lname']?>">
            <table>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Grade</th>
                    <th>Max Point</th>
                </tr>
                <?php
                    for($i = 0; $i < count($_POST['answer']); $i++):
                ?>
                <tr>
                    <td><?=$_POST['question'][$i]?><input type="hidden" name="questionn[]" value="<?=$_POST['question'][$i]?>"></td>
                    <td><?=$_POST['answer'][$i]?><input type="hidden" name="answerr[]" value="<?=$_POST['answer'][$i]?>"></td>
                    <td><input type="number" name="grade[]"></td>
                    <td><?=$_POST['point'][$i]?><input type="hidden" name="pointss[]" value="<?=$_POST['point'][$i]?>"></td>
                </tr>
                <?php
                    endfor;
                ?>
                <tr>
                    <td colspan="3">
                    </td>
                    <td>
                        <button>Action</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php

?>
</body>
</html>