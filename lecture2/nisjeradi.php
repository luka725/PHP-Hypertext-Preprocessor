<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .matrixcontainer, .rowmatrix, .colmatrix{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .matrixcontainer{
            flex-direction: column;
        }
        .rowmatrix{
            flex-direction: row;
        }
        .colmatrix{
            border: solid 0.5px black;
            height: 5vh;
            width: 5vw;
        }
    </style>
</head>
<body>
    <?php
        include 'matrix.php';
        session_start();
        $matrix = $_SESSION['4x4'];
    ?>
    <h1>დავალება 2</h1>
    <h4>
        გამოიტანეთ მატრიცაში არსებული X რიცხვის ჯერადი რიცხვები
    </h4>
    <br><br>
    <section class="matrixcontainer"><?php drawMatrix($matrix) ?></section>
    <?php jeradi($matrix, $_POST['number1']) ?>
</body>
</html>