<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops - For Loop and Foreach</title>
</head>
<body>
    <?php
        // when we know how mnay times the script should run 
        echo "<br>For Loop<br>";
        for($i=0;$i<=10;$i++){
            echo "In Loop {$i}<br>";
        }
        echo "After Loop {$i}<br>";
        echo "<br>For Loop<br>";
        $i=0;
        for(;$i<=10;$i++){
            echo "In Loop {$i}<br>";
        }
        echo "After Loop {$i}<br>";
        echo "<br>For Loop<br>";
        $i=0;
        for(;$i<=10;){
            echo "In Loop {$i}<br>";
            $i++;
        }
        echo "After Loop {$i}<br>";

        echo "<br><br>For Each<br><br>";
        $array = ["Maruti","Tata","Mahindra","Renault","Bajaj"];
        foreach($array as $a){
            echo $a."<br>";
        }
        echo "<br>";
        $personal=[
            "firstname"=>"Lakshya",
            "lastname"=>"Shah",
            "age"=>"30",
            "email"=>"shahlakshya1988@gmail.com"
        ];
        foreach($personal as $key=>$value){
            echo "{$key} is {$value}<br>";
        }
    ?>
</body>
</html>