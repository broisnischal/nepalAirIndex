<?php
include './config.php';
session_start();
if (!isset($_SESSION['backlogin'])) {
    echo "<script>window.location.replace('{$localhost}');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Air Pollution Checkout Complains</title>
    </head>

    <body>

        <p>
            Under Development
        </p>
    </body>

</html>