<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project X</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/card.css">
</head>
<body>
<?php include "db.php"; ?>

<?php include "admin.php"; ?>

<?php include "templates/header.php"; ?>

<?php include "page.php"; ?>

<?php include "templates/footer.php"; ?>
</body>
<script src="/assets/js/notify.js"></script>
</html>

