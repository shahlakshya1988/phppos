<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Date Function</title>
</head>
<body>
    <?php 
    date_default_timezone_set('Asia/Kolkata'); 
    date_default_timezone_set('Australia/Sydney'); 
        echo "<h2>Basic Date</h2>";
        echo date("d"); // date 
        echo "<br>";
        echo date("m")."<br>"; // month number
        echo date("F")."<br>"; // month - text
        echo date("l")."<br>"; //week name
        echo date("y")."<br>"; // year 
        echo date("Y")."<br>"; // Year 4 dig
        echo date("d-F-Y")."<br>";
        echo date("d-m-Y l")."<br>";


        echo "<h2>Time</h2>";
        echo date("h")."<br>"; // hour 12
        echo date("H")."<br>"; // hours 24
        echo date("i")."<br>"; // minute
        echo date("s")."<br>"; // second
        echo date("a")."<br>"; // am, pm

        echo "<h2>General</h2>";
        echo date("d-F-Y h:i:s a, l")."<br>";
        echo date("m, d F H:i:s - l")."<br>";
    ?>
</body>
</html>