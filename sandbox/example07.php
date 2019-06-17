<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Operators</title>
</head>
<body>
<?php
/**
Arithmetic Operators (+,-,*,/,%)
Assignment Operators ( = )
Comparison Operatorys (==,!=,<,>,<=,>=)
Spaceship Operator (PHP 7)(<=>)
**/ 
?>
<?php 
	$x = 31; // assignment operator
	$y = 4 ; // assignment operator 
	echo "<h2>Arithematic</h2>";
	echo "Addition ",($x+$y); // Arithematic Operator
	echo "<br>";
	echo "Substration ",($x-$y); // Arithematic Operatory
	echo "<br>";
	echo "Multiplication ",($x*$y); // Arithematic Operator 
	echo "<br>";
	echo "Division ",($x/$y); // Arithematic Operator
	echo "<br>";
	echo "Modulus ",($x%$y); // Arithematic Operator
	echo "<br>";

	echo "<h2>Comparision Operators</h2>";
	$x=29;
	$y=4;
	var_dump($x==$y);
	echo "<br>";
	var_dump($x!=$y);
	echo "<br>";
	var_dump($x>$y);
	echo "<br>";
	var_dump($x<$y);
	echo "<br>";
	var_dump($x>=$y);
	echo "<br>";
	var_dump($y<=$x);
	echo "<br>";
	echo "<h2>SpaceShip Operator</h2>";
	$x=30;
	$y=30;
	var_dump($x<=>$y);
	echo "<br>";

	$x=35;
	$y=30;
	var_dump($x<=>$y);
	echo "<br>";

	$x=30;
	$y=35;
	var_dump($x<=>$y);
	echo "<br>";

	echo "<h2>Strict Comparision Operator</h2>";
	$x=18;
	$y="18";
	var_dump($x==$y);
	echo "<br>";
	var_dump($x===$y);
	echo "<br>";
	var_dump($x!=$y);
	echo "<br>";
	var_dump($x!==$y);

?>
</body>
</html>