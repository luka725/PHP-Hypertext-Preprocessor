<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $starter = false;
        $col = $row = $start = $end = "";
        if(isset($_POST['col'], $_POST['row'], $_POST['start'], $_POST['end'])){
            $col = validate($_POST['col']);
            $row = validate($_POST['row']);
            $start = validate($_POST['start']);
            $end = validate($_POST['end']);
            if($col != '' && $row != '' && $start != '' && $end != ''){
                $starter = true;
            }
            echo var_dump($_POST);
        }

        function validate($data){
            $data = stripslashes($data);
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = intval($data);
            return $data;
        }

        function make_matrix($column, $row, $start, $end){ ?>
            <div class="matrix">
                <?php
                    for($i = 1; $i <= $column; $i++){ ?>
                        <div class="row">
                            <?php
                                for($j = 1; $j <= $row; $j++){ ?>
                                    <div><?=rand($start, $end)?></div>
                            <?php 
                            } ?>
                        </div>
                        <?php
                    } ?>
            </div>
            <?php
        }
    ?>
    <div class="box">
        <div class="container">
            <h3>Generate Matrix</h3>
            <form method="post" action="">
                <label>Column:</label>
                <br>
                <input type="number" name="col" value="<?=$col?>">
                <br><br>
                <label>Row:</label>
                <br>
                <input type="number" name="row" value="<?=$row?>">
                <br><br>
                <div class="ab">
                start<input type="number" name="start" style="margin-right: 10px;" value="<?=$start?>">end<input type="number" name="end" value="<?=$end?>">
                </div>
                <br><br>
                <button>Generate</button>
            </form>
        </div>
    </div>
    <section class="matrixcontainer">
        <?php 
            if($starter){
                make_matrix($row, $col, $start, $end);
            }
        ?>
    </section>
</body>
</html>
