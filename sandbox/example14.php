<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops</title>
</head>
<body>
    <?php
        echo "<br>********* WHILE LOOP ************<br>";
        $i=0;
        echo "Before Loop The Value of i is {$i}<br>";
        while($i<=10){
            echo "In loop ".$i."<br>";
            $i++; // This is very important, otherwise infinite loop
        } 
        echo "After The Lopp i is {$i}<br>";

        echo "<br>*********************<br>";
        $i=11;
        echo "Before Loop The Value of i is {$i}<br>";
        while($i<=10){
            echo "In loop ".$i."<br>";
            $i++; // This is very important, otherwise infinite loop
        } 
        echo "After The Lopp i is {$i}<br>";

        echo "<br>********* DO WHILE LOOP ************<br>";
        $i=0;
        echo "Before loop the i is {$i}<br>";
        do{
            echo "In loop ".$i."<br>";
            $i++;
        }while($i<=10);
        echo "After Loop the is is {$i}<br>";
        echo "<br>*********************<br>";
        $i=11;
        echo "Before Loop The Value is i is {$i}<br>";
        do{
            echo "In loop ".$i;
            $i++;
        }while($i<=10);
        echo "After Loop the is is {$i}<br>";

    ?>
</body>
</html>