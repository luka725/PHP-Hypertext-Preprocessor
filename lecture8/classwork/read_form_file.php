<h3>Content of <?=$_GET['path']?></h3>
<div>
<?php
    //echo readfile($_GET['path']);
    $file = fopen($_GET['path'], 'r');
    //echo fread($file, filesize($_GET['path']));
    while(!feof($file)){
        echo '<br>';
        echo fgets($file);
        echo '<br>';
    }
    fclose($file);
?>
</div>