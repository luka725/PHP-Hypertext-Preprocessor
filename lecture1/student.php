<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student table</title>
    <style>
        table{
            border-collapse:collapse;
        }
        td{
            border: solid 0.5px gray;
            height: 5vh;
            width: 15vw;
            padding: 0 20px 0 20px;
        }
        tr td:nth-child(1){
            width: 5vw;
        }
        body{
            margin-top: 25vh;
            display: flex; 
            justify-content: center;
            align-items: center; 
            flex-direction: column;
        }
    </style>
</head>
<body>
<?php
    include "functions.php";

    $items = array(
        "name"      => $_POST["name"],
        "lname"     => $_POST["lname"],
        "course"  => $_POST["course"],
        "semsetri"    => $_POST["semestri"],
        "grade" => $_POST["grade"],
        "lec" => $_POST["lecname"],
        "dec"  => $_POST["decname"],
    );

    $filtered_items = student_Massive_Filter($items);

?>
<table>
        <tr>
            <td>სახელი:</td>
            <td><?php echo $filtered_items["name"] ?></td>
        </tr>
        <tr>
            <td>გვარი:</td>
            <td><?php echo $filtered_items["lname"] ?></td>
        </tr>
        <tr>
            <td>კურსი:</td>
            <td><?php echo $filtered_items["course"] ?></td>
        </tr>
        <tr>
            <td>სემესტრი:</td>
            <td><?php echo $filtered_items["semsetri"] ?></td>
        </tr>
        <tr>
            <td>ნიშანი:</td>
            <td><?php echo $filtered_items["grade"] ?></td>
        </tr>
        <tr>
            <td>ლექტორი:</td>
            <td><?php echo $filtered_items["lec"] ?></td>
        </tr>
        <tr>
            <td>დეკანი:</td>
            <td><?php echo $filtered_items["dec"] ?></td>
        </tr>
    </table>
</body>
</html>