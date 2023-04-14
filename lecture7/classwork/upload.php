<?php
$file_types = ['exe', 'pptx', 'txt', 'ai', 'gif', 'php'];
if(isset($_POST['upload']) && $_FILES['f_name']['error']==0)
{
    $f_name = $_FILES['f_name'];
    $base_path = 'root/'.$f_name['name'];
    echo '<pre>';
    print_r($f_name);
    echo '</pre>';
    if(in_array(strtolower(pathinfo($base_path)['extension']), $file_types)){
        if(file_exists($base_path)){
            echo "File Exists!!!";
            $base_path = "root/".time().$f_name['name'];
        }
        move_uploaded_file($f_name['tmp_name'], $base_path);
    }
}
if(isset($_GET['file']) && file_exists("root/".$_GET['file'])){
    unlink("root/".$_GET['file']);
}
// file type
// doble upload
?>