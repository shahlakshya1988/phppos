<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Implode | Explode Methods </title>
</head>
<body>
    <?php
        /*** explode() -> string to array ***/
        /*** implode() -> array to string ***/
        echo "<h2>Explode Function</h2>";
        $string = "Apple,Banana,Grapes,WaterMelon,Pumpkin,Carrot";
        $array = explode(",",$string);
        echo "<pre>",print_r($array),"</pre>";

        echo "<br>*************<br>";
        $string = "Hello My Name Is Shah Lakshya Pradhyuman";
        $array = explode(" ",$string);
        echo "<pre>",print_r($array),"</pre>";

        echo "<h2>Implode Function</h2>";
        $array = ["Maruti","Jeep","Mahindra","Tata","Scropio","Nano","Tiago"];
        $string = implode(", ",$array);
        echo $string;
        echo "<br>";
        $array = ["Hello", "My", "Name", "Is", "Shah" ,"Lakshya" ,"Pradhyuman"];
        $string = implode(" , ",$array);
        echo $string;
    ?>
</body>
</html>
