<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $arr = [];
    for($i = 0; $i <= 12; $i++):
        $arr[$i] = rand(10,100);
    endfor;
    echo "<pre>";
    print_r($arr);
    echo "<pre>";
    $higher = 0;
    $lower = 0;
    if(isset($_POST['number'])):
        $number = $_POST["number"];
        foreach ($arr as $item):
            if($number < $item):
                $higher++;
            elseif($number > $item):
                $lower++;
            else:
                echo "None of above";
            endif;
        endforeach;
    endif;

    echo "<h1>მასივში არის $higher-ი $number-ზე მაღალი რიცხვი</h1>";
    echo "<h1>მასივში არის  $lower-ი $number-ზე დაბალი რიცხვი</h1>";
?>
</body>
</html>
