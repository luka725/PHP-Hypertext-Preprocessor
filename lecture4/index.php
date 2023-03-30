<?php
    include "questions.php";
    shuffle($questions);
?>
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
        <h3>Questions</h3>
        <form action="lecturer.php" method="post" class="tb">
            <table>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Max Point</th>
                </tr>
                <?php
                    for($i = 0; $i < 5; $i++):
                ?>
                <tr>
                    <td><?=$questions[$i]["question"]?><input type="hidden" name="question[]" value="<?=$questions[$i]["question"]?>"></td>
                    <td><input type="text" name="answer[]"></td>
                    <td><?=$questions[$i]["point"]?><input type="hidden" name="point[]" value="<?=$questions[$i]["point"]?>"></td>
                </tr>
                <?php
                    endfor;
                ?>
                <tr>
                    <td colspan="2">
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="lname" placeholder="Last Name">
                    </td>
                    <td>
                        <button>send</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
<?php

?>
</body>
</html>