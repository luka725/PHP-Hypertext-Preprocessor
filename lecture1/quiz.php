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
        $quiz_details = file_get_contents("quiz_details.json");
        $res = json_decode($quiz_details);
        $array_answers = array();
        if(!empty($res)):
            $question_count = 0;
            foreach($res as $key => $value):
                if($key === "test"):
                        foreach($value as $single => $obj):
                            $question_count++;
                            foreach($obj->answers as $key => $val):
                                $array_answers[$obj->name][$key] = $val;
                            endforeach;
                        endforeach;
                    endif;
            endforeach;
        endif;
        //var_dump($array_answers);
        $correct_answer = 0;
        foreach($array_answers as $key => $value):
            //echo $_GET[$key];
            if($value[$_GET[$key]] === true):
                $correct_answer++;
                //echo $_GET[$key];
            endif;
        endforeach;
        echo "ტესტიდან მიღებული სწორი პასუხების რაოდენობა შეადგენს: "." ".$correct_answer."/".$question_count;
    ?>