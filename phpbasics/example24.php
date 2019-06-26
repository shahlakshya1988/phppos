<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Session - Practile</title>
</head>
<body>
    <?php
        $name = "Shah Lakshya Pradhyuman";
        $_SESSION["myname"] = $name;
        echo "<pre>",print_r($_SESSION),"</pre>";
    ?>
</body>
</html>
