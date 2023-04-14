<?php
if(isset($_POST['edit'])){
    $file = fopen($_GET['path'], 'w');
    fwrite($file, $_POST['edit']);
    fclose($file);
}
$file = fopen($_GET['path'], 'r');
$content = fread($file, filesize($_GET['path']));
fclose($file);
?>
<h3>editing <?=$_GET['path']?></h3>
<form method='post'>
    <textarea name="edit" cols="30" rows="10"><?=$content?></textarea>
    <button>Save</button>
</form>
<?php

?>