<?php

function makeMatrix( $column, $row, $range, $task )
{
    $matrix = [];
    for($i = 1; $i <= $row; $i++):
        $matrix[$i] = [];
        for($k = 1; $k <= $column; $k++):
            if($task === 2 ):
                $matrix[$i][$k] = rand($range[0], $range[1]);
            elseif($task === 3):
                $matrix[$i][$k] = $i + $k;
            else:
                echo "Incorrect Task Number Accoured\n Please Enter Either 2 Or 4";
            endif;
        endfor;
    endfor;

    return $matrix;
}
function drawMatrix($matrix){
    foreach($matrix as $row):
        echo "<div class='rowmatrix'>";
        foreach($row as $column):
            echo "<div class='colmatrix'>";
            echo $column;
            echo "</div>";
        endforeach;
        echo "</div>";
    endforeach;
}

?>