<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Operators </title>
</head>
<body>
	<?php 
	/*
	Increment / Decrement Operator (++,--)
	Logical Operator (AND, OR, && , || , ! ,xor)
	String Oepratory (.,.=)
	Spaceship Operatory (<=>) [PHP 7]
	*/
	?>
	<?php
	 echo "<h2>Increment / Decrement </h2>";
		$x=5;
		echo $x++;
		echo "<br>";
		echo $x; 
		echo "<br>";
		$x=5;
		echo ++$x;
		echo "<br>";
		echo $x; 
	 echo "<h2>Logical Operators</h2>";
	 	$x= 5;
	 	$y = 5;
	 	var_dump($x==5 AND $y==5);
	 	echo "<br>";
	 	var_dump($x==5 AND $y!=5);
	 	echo "<br>";
	 	$x=5;
	 	$y=6;
	 	var_dump($x==5 OR $y==5);
	 	echo "<br>";
	 	var_dump($x!=5 OR $y==5);
	 	echo "<br>";
	 	var_dump($x==5);
	 	echo "<br>";
	 	var_dump(!$x==5);
	 	echo "<br>";
	 	var_dump($x==5 XOR $y==5);
	 	echo "<br>";
	 	var_dump($x!=5 XOR $y==5);
	 	echo "<br>";
	 	var_dump($x!=5 XOR $y==6);
	 	echo "<br>";
	 	var_dump($x==5 XOR $y==6);
	 	echo "<br>";

	 	echo "<h2>String Operators</h2>";
	 	$firstname="Lakshya";
	 	$lastname = "Shah";
	 	$string = $firstname." ".$lastname;
	 	echo $string; 
	 	echo "<br>";
	 	echo $firstname.=" ".$lastname;

	 	echo "<h2>Spaceship</h2>";
	 	var_dump(1<=>1);
	 	echo "<br>";
	 	var_dump(1<=>2);
	 	echo "<br>";
	 	var_dump(2<=>1);

	?>

</body>
</html>