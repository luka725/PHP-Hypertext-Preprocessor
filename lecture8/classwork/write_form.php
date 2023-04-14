<?php
    if(isset($_POST['fcontent'])){
        $file = fopen($_GET['path'], 'a');
        fwrite($file, $_POST['fcontent']);
        fclose($file);
    }
?>
<h3>Write to <?=$_GET['path']?></h3>
<form method="post">
    <textarea name="fcontent" id="mytextarea" cols="30" rows="10"></textarea>
    <br><br>
    <button>Write</button>
</form>