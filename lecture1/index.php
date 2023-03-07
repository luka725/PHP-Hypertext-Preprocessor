<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homework</title>
    <style>
        body{
            display: flex; 
            justify-content: center;
            align-items: center; 
            flex-direction: column;
            margin: 5vh 0 15vh 0;
        }
        h3{
            text-align:center;
        }
        .task3form > label{
            margin:0 3vw 0 0;
        }
    </style>
</head>
<body>
    <h3>დავალება 1</h3>
    <br>
    <form method="get" action="employee.php">
        <input type="text" name="name" required placeholder="სახელი">
        <br><br>
        <input type="text" name="lname" required placeholder="გვარი">
        <br><br>
        <input type="text" name="position" required placeholder="დაკავებული თანამდებობა">
        <br><br>
        <input type="number" name="salary" required placeholder="ხელფასის რაოდენობა">
        <br><br>
        <input type="number" name="tax" required placeholder="დაკავებული საშემოსავლო">
        <br><br>
        <label>პროცენტებში</label>
        <input type="radio" name="radio" value="precentage">
        <label>რაოდენობით</label>
        <input type="radio" name="radio" value="decimal">
        <br><br>
        <button>გაგზავნა</button>
    </form>
    <br><br>
    <h3>დავალება 2</h3>
    <br>
    <form method="post" action="student.php">
        <input type="text" name="name" required placeholder="სახელი">
        <br><br>
        <input type="text" name="lname" required placeholder="გვარი">
        <br><br>
        <input type="text" name="course" required placeholder="კურსი">
        <br><br>
        <input type="text" name="semestri" required placeholder="სემესტრი">
        <br><br>
        <input type="number" name="grade" required placeholder="ნიშანი">
        <br><br>
        <input type="text" name="lecname" required placeholder="ლექტორის სახელი და გვარი">
        <br><br>
        <input type="text" name="decname" required placeholder="დეკანის სახელი და გვარი">
        <br><br>
        <button>გაგზავნა</button>
    </form>
    <br><br>
    <h3>დავალება 3</h3>
    <br>
    <form class="task3form" method="post" action="quiz.php">
    <?php   
        $quiz_details = file_get_contents("quiz_details.json");
        $res = json_decode($quiz_details);
        //var_dump($quiz_details);
        if(!empty($res)):
            //var_dump($res);
            $index = 1;
            foreach($res as $key => $value):
                if($key === "question"){
                        //var_dump($value);
                        foreach($value as $single => $obj):
                            echo "<label>".$index.". ".$obj-> content."</label>";
                            echo "<br>";
                            echo "<textarea name=".$obj-> name."></textarea>";
                            echo "<br><br>";
                            $index++;
                        endforeach;
                }
                elseif($key === "test"){
                        foreach($value as $single => $obj):
                            echo "<label>".$index.". ".$obj-> content."</label>";
                            echo "<br><br>";
                            foreach($obj->answers as $key => $val):
                                echo "<input type='radio' name=".$obj->name." value=".$key.">";
                                echo "<label>$key</label>";
                            endforeach;
                            echo "<br><br>";
                            $index++;
                        endforeach;
                }else{
                    echo "Json problem!;";
                }
            endforeach;
        endif;
    ?>
    <button>გაგზავნა</button>
    </form>
</body>
</html>