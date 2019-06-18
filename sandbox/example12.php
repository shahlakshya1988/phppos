<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Associative Array</title>
</head>
<body>
	<?php
		$user=array(
			"firstname"=>"Lakshya",
			"lastname"=>"Shah",
			"age"=>31,
			"gender"=>"Male",
			"education"=>"Bachelor Of Engineering"
		);
		echo "<pre>",print_r($user),"</pre>";
		echo "<br>";
		foreach($user as $key => $value){
			echo "{$key} is {$value}<br>";

		}
		echo "<br>";
		echo $user["firstname"];
		echo "<br>";
		echo $user["lastname"];
		echo "<br>";
		echo $user["age"];
		echo "<br>";
		echo $user["gender"];
		echo "<br>";
		echo $user["education"];
	?>
</body>
</html>