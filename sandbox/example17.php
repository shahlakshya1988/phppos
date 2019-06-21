<?php 
    if(isset($_GET['username'],$_GET['password'])){
        "<br>GET Method Demo ::: <br>";
        echo "Username is ".$_GET['username']."<br>";
        echo "Password is ".$_GET['password']."<br>";
    }
    if(isset($_POST['username'],$_POST['password'])){
        echo "<br>POST Method Demo ::: <br>";
        echo "Username is ".$_POST['username']."<br>";
        echo "Password is ".$_POST['password']."<br>";
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Get | POST | ISSET Method</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="username" id="username"><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Login" name="login">
    </form>
    <br>
    <br>
    <form action="" method="post">
        <input type="text" name="username" id="username"><br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>