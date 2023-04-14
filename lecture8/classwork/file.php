<?php

$dir = 'files';
if(isset($_POST['f_name']) and !empty($_POST['f_name'])){
    $f_path = $dir.'/'.$_POST['f_name'].'.txt';
    $file = fopen($f_path, 'w');
    fclose($file);
}

?>