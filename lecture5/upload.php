<?php
$extensions = ['txt', 'jpg', 'gif'];
$base_dir = 'uploads/';
if(isset($_POST['upload']) and $_FILES['file']['error'] === 0){
    $file = $_FILES['file'];
    $error = '';
    if($file['size'] < 50000){
        if(in_array(strtolower(pathinfo($file['name'])['extension']), $extensions)){
            move_uploaded_file($file['tmp_name'], $base_dir.'/'.$file['name']);
        }
        else{
            $error .= 'Uploaded file should be .png, .jph or .gif';
        }
    }
    else{
        $error .= 'Maximum file size is 100MB';
    }
    // echo '<pre>';
    // print_r($file);
    // echo '</pre>';
}
if(isset($_GET['file'])){
    if(file_exists($base_dir.'/'.$_GET['file'])){
        if($_GET['action'] == 'delete'){
            unlink($base_dir.'/'.$_GET['file']);
        }
        if($_GET['action'] == 'download'){
            header("Content-type: text/plain");
            header("Content-Length: ".filesize($exportfile));
            header("Content-Disposition: attachment; filename=" .$_GET['file']);
            readfile($base_dir.'/'.$_GET['file']);
        }
    }
}

?>