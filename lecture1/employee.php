<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee table</title>
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
        "name"      => $_GET["name"],
        "lname"     => $_GET["lname"],
        "position"  => $_GET["position"],
        "salary"    => $_GET["salary"],
        "taxammount"=> $_GET["tax"],
        "taxtype"  => $_GET["radio"],
    );

    $filtered_items = employee_Massive_Filter($items);

?>
<table>
        <tr>
            <td>სახელი:</td>
            <td><?php echo $filtered_items["Name"] ?></td>
        </tr>
        <tr>
            <td>გვარი:</td>
            <td><?php echo $filtered_items["LastName"] ?></td>
        </tr>
        <tr>
            <td>დაკავებული თანამდებობა:</td>
            <td><?php echo $filtered_items["Position"] ?></td>
        </tr>
        <tr>
            <td>ხელფასის რაოდენობა:</td>
            <td><?php echo $filtered_items["Salary"] ?></td>
        </tr>
        <tr>
            <td>დაკავებული საშემოსავლო:</td>
            <td><?php echo $filtered_items["TaxAmmount"] ?></td>
        </tr>
        <tr>
            <td>დარიცხული ხელფასი:</td>
            <td><?php echo $filtered_items["SalaryAmmount"] ?></td>
        </tr>
    </table>
</body>
</html>