<?php

function makeMatrix( $column, $row, $range, $task )
{
    $matrix = [];
    for($i = 1; $i <= $row; $i++):
        $matrix[$i] = [];
        for($k = 1; $k <= $column; $k++):
            $matrix[$i][$k] = ($task === 2 ) ? rand($range[0], $range[1]) : ($task === 3 ) ? $i + $k : "Incorrect Task Number Accoured\n Please Enter Either 2 Or 4";
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