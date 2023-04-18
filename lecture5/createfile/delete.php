<?php
$base_dir = 'root';
if(isset($_GET['file'])){
    if($_GET['action'] === 'delete'){
        if(file_exists($base_dir.'/'.$_GET['file'])){
            unlink($base_dir.'/'.$_GET['file']);
        }
    }
}
?>