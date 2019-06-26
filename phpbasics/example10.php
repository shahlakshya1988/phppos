<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Functions Deep Dive</title>
</head>
<body>
	<?php
		function myfunc(){
			echo "<br>I am Function<br>";
		} 
		myfunc();

		function myfunc_args($firstname,$lastname){
			echo "<br>{$firstname} {$lastname}<br>";
		}
		myfunc_args("Lakshya","Shah");

		function myfunc_args_return($firstname,$lastname){
			return "{$firstname} {$lastname}";
		}
		echo "<br>".myfunc_args_return("Lakshya","Shah")."<br>";

		function myfunc_args_default($firstname="Default First Name",$lastname="Default Last Name"){
				return "{$firstname} {$lastname}";
		}
		echo "<br>",myfunc_args_default("Lakshya","Shah"),"<br>";
		echo "<br>",myfunc_args_default("Lakshya"),"<br>";
		echo "<br>",myfunc_args_default(),"<br>";
		echo "<br>",myfunc_args_default(null,"Shah"),"<br>"; // unexpected result null is assinged
		// echo "<br>",myfunc_args_default(,"Shah"),"<br>"; // error

		function cal($x,$y){
			$z=$x+$y;
			var_dump($z);
		}

	?>
</body>
</html>