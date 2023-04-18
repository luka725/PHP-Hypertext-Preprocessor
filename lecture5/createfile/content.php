<?php
$base_dir = 'root';
if(isset($_POST['editdata']) and $_POST['editdata'] != ''){
    $file = fopen($base_dir.'/'.$_GET['file'], 'w');
    fwrite($file, $_POST['editdata']);
    fclose($file);
}
if(isset($_GET['file'])){
    if($_GET['action'] === 'read'){
        if(file_exists($base_dir.'/'.$_GET['file'])){
            $file = file_get_contents($base_dir.'/'.$_GET['file']);
            echo $file;
        }
    }
    if($_GET['action'] === 'edit'){
        if(file_exists($base_dir.'/'.$_GET['file'])){
            $file = file_get_contents($base_dir.'/'.$_GET['file']);
            echo '<form method="post">';
            ?>
            <textarea name="editdata" cols="30" rows="10"><?=$file;?></textarea>
        <?php 
            echo '<button>Save</button>';
            echo '</form>';
        }
    }
}

?>