<?php
$base_dir = "root";
if(isset($_POST['create'])){
    $file = fopen($base_dir.'/'.$_POST["file"].'.txt', 'a');
    fclose($file);
}

?>