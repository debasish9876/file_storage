<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY CODE</title>
</head>
<body>
    <h1>jay shree RAM </h1>
    <h2>
        <?php
        echo $_SESSION['username'];
        ?>
    </h2>
    <button style="backgroung-color=sky"><a href="logout.php">Log out</a></button>
</body>
</html>