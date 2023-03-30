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
            width: 10vw;
        }
        .myform{
            display: flex;
            flex-direction: column;
            width: 20vw;
            height: auto;
            padding: 50px;
            border: solid 1px black;
        }
        .gender{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <h1>დავალება 1</h1>
    <h4>განსაზღვრეთ 12 ელემენტიანი რიცხვითი მასივი. ელემენტებს მნიშვნელობები მიანიჭეთ [10; 100]-შუალედიდან. დაადგინეთ
        რამდენი ელემენტია მასივში შეტანილ X რიცხვზე ნაკლები და რამდენი მეტი. X რიცხვის შეტანა მოახდინეთ $_POST მეთოდის
        საშუალებით.</h4>
    <form method="post" action="random.php">
        <input type="number" name="number" required>
        <input type="submit">
    </form>
    <h1>დავალება 2</h1>
    <h4>განსაზღვრეთ 4x4 რიცხვითი მატრიცა. ელემენტებს მნიშვნელობები მიანიჭეთ [10; 100]-შუალედიდან. გამოიტანეთ მატრიცის
        ელემენტები ცხრილის სახით, გამოიტანეთ მატრიცის მთავარი დიაგონალის ზემოთ მდგომი ელემენტები ცხრილის სახით. შეიტანეთ
        X რიცხვი $_POST მეთოდის საშუალებით, გამოიტანეთ მატრიცაში არსებული X რიცხვის ჯერადი რიცხვები, გამოიტანეთ
        მატრიცის ელემენტების ჯამი, ნამრავლი, საშუალო არითმეტიკული, განი, თითოეული ელემენტის ციფრთა ჯამი ცხრილის
        სახით.</h4>
    <?php 
        include "matrix.php";
        session_start();
        $rangeOfRandoms = [10, 100];
        $mymatrix = makeMatrix(4, 4, $rangeOfRandoms, 2);
        $diagonalUpper = sumOfMainDiagonalUpperElems($mymatrix);
        $_SESSION['4x4'] = $mymatrix;
        // echo "<pre>";
        // print_r($mymatrix);
        // echo "</pre>";
    ?>
    <p>გამოიტანეთ მატრიცის ელემენტები ცხრილის სახით.</p>
    <section class="matrixcontainer"><?php drawMatrix($mymatrix) ?></section>
    <br>
    <p>გამოიტანეთ მატრიცის მთავარი დიაგონალის ზემოთ მდგომი ელემენტები ცხრილის სახით.</p>
    <section class="matrixcontainer"><?php drawMatrix($diagonalUpper) ?></section>
    <p>შეიტანეთ X რიცხვი $_POST მეთოდის საშუალებით.</p>
    <form method="post" action="nisjeradi.php">
        <input type="number" name="number1" required>
        <input type="submit">
    </form>
    <p>გამოიტანეთ მატრიცის ელემენტების ჯამი, ნამრავლი, საშუალო არითმეტიკული, განი, თითოეული ელემენტის ციფრთა ჯამი ცხრილის სახით.</p>
    <?php 
        $listkeys = [ 
            [
                "ჯამი", "ნამრავლი", "საშუალო", "განი", "ციფრთა ჯამი"
            ]
        ];
        $results = eachNumberOperations($mymatrix);
    ?>
    <section class="matrixcontainer"><?php drawMatrix($listkeys); drawMatrix($results) ?></section>
    <h1>დავალება 3</h1>
    <h4>განსაზღვრეთ 6x5 რიცხვითი მატრიცა. ელემენტებს მიანიჭეთ ინდექსების ჯამი. გამოიტანეთ მატრიცა ცხრილის სახით.</h4>
    <?php $mymatrix2 = makeMatrix(5, 6, [], 3) ?>
    <section class="matrixcontainer"><?php drawMatrix($mymatrix2) ?></section>
    <?php
    $cars =
    [
        [
        "Make"=>"Toyota",
        "Model"=>"Corolla",
        "Color"=>"White",
        "Mileage"=>24000,
        "Status"=>"Sold"
        ],
        [
        "Make"=>"Toyota",
        "Model"=>"Camry",
        "Color"=>"Black",
        "Mileage"=>56000,
        "Status"=>"Available"
        ],
        [
        "Make"=>"Honda",
        "Model"=>"Accord",
        "Color"=>"White",
        "Mileage"=>15000,
        "Status"=>"Sold"
        ] 
    ];
    $carkeys =
    [
        ["Make", "Model", "Color", "Mileage", "Status"]
    ]
    ?>
    <h1>დავალება 4</h1>
    <section class="matrixcontainer"><?php drawMatrix($carkeys); drawMatrix($cars) ?></section>
    <h1>დავალება 5</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="myform">
        Name: <input type="text" name="name">
        E-mail: <input type="text" name="email">
        Website: <input type="text" name="website">
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        Gender:
        <div class="gender">
        Female<input type="radio" name="gender" value="female">
        Male<input type="radio" name="gender" value="male">
        Other<input type="radio" name="gender" value="other">
        </div>
        <input type="submit" name="submit">
    </div>
    </form>
    <?php
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $website = test_input($_POST["website"]);
            $comment = test_input($_POST["comment"]);
            $gender = test_input($_POST["gender"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        return $data;
        }
    ?>
    <h2>Your Input: </h2>
        <p>Name: <?php echo $name ?></p>
        <p>Email: <?php echo $email ?></p>
        <p>Website: <?php echo $website ?></p>
        <p>Comment: <?php echo $comment ?></p>
        <p>Gender: <?php echo $gender ?></p>
</body>
</html>