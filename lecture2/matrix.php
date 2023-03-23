<?php

function makeMatrix( $column, $row, $range, $task )
{
    $matrix = [];
    for($i = 1; $i <= $row; $i++):
        $matrix[$i] = [];
        for($k = 1; $k <= $column; $k++):
            if($task === 2):
                $matrix[$i][$k] = rand($range[0], $range[1]);
            elseif($task === 3):
                $matrix[$i][$k] = $i + $k;
            else:
                echo "wrong task!";
            endif;
        endfor;
    endfor;

    return $matrix;
}
function drawMatrix($matrix){
    foreach($matrix as $row):
        echo "<div class='rowmatrix'>";
        foreach($row as $column):
            echo "<div class='colmatrix'>$column</div>";
        endforeach;
        echo "</div>";
    endforeach;
}
function sumOfMainDiagonalUpperElems($matrix){
    //print_r($matrix);
    $column = count($matrix);
    $row = count($matrix[1]);
    $uppers = [[]];
    for($i = 1; $i <= $row;  $i++):
        for($k = 1; $k <= $column; $k++):
            if($k > $i):
                array_push($uppers[0], $matrix[$i][$k]);
            endif;
        endfor;
    endfor;
    //print_r($uppers);
    return $uppers;
}
function jeradi($matrix, $x){
    echo "<h3> $x-ის ჯერადებია:</h3>";
    foreach($matrix as $row):
        foreach($row as $column):
            if($column % $x == 0 ):
                echo "<span> $column </span>";
            endif;
        endforeach;
    endforeach;
}
function eachNumberOperations($matrix){
    $itemcount = 0;
    $count = 0; 
    $multiplication = 1;
    $avg = 0;
    $gani = "don't know";
    $numbercount = 0;
    foreach($matrix as $row):
        foreach($row as $column):
            $itemcount ++;
            $count += $column;
            $multiplication *= $column;
        endforeach;
    endforeach;
    $avg = $count / $itemcount;

    $res= [
        [ $count, $multiplication, $avg, $gani, $numbercount]
    ];

    return $res;
}
?>