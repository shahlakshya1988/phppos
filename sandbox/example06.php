<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Conditional Statements | If Else | Switch</title>
</head>
<body>
	<?php 
		echo "<h2>If Else</h2>";
		$condition=true;
		if($condition){
			echo "Condition is True<br>";
		}else{
			echo "Condition is False<br>";
		}

		$condition = false;
		if($condition){
			echo "Condition is True<br>";
		}else{
			echo "Condition is False<br>";
		}

		$age = 18;
		if($age<=18){
			echo "You are not suppose to drive <br>";
		}else if($age <= 21){
			echo "You are not suppose to drink <br>";
		}else{
			echo "You Can Do Anything You Want To Do <br>";
		}
		echo "<h2>Switch</h2>";
		$age = 18;
		switch($age){
			case '18':
				echo "You Are 18 Years Old";
				break;
			case $age<18:
				echo "You Are Not Even 18";
				break;
			case $age ==18:
				echo "You Are 18 Years Old";
				break;
			default:
				echo "What is your Age";
		}

		echo "<br>";
		$color = "green";
		switch($color){
			case 'green':
				echo "Color is Green";
				break;
			case 'red';
				echo "Color is red";
				break;
			case 'blue':
				echo "Color is Blue";
				break;
			default:
				echo "Please Enter Green, Red, Blue";
		}
		echo "<br>";
		$color = "green";
		switch($color){
			case 'green':
				echo "Color is Green<br>";
				
			case 'red';
				echo "Color is red<br>";
				break;
			case 'blue':
				echo "Color is Blue<br>";
				break;
			default:
				echo "Please Enter Green, Red, Blue";
		}
	?>
</body>
</html>