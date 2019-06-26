<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>String Function</title>
	</head>
	<body>
	<?php
/*
strlen -> Used for finding length of string
str_word_count -> How many words are in the string 
strrev -> reversing the string 
strpos-> finding the position of a word in the string
str_replace -> Replace the string from one to another 
*/	
	?>
<?php 
$name = "Shah Lakshya Pradhyuman";
echo "Strlen => ".strlen($name);
echo "<br>";
echo "str_word_count => ".str_word_count($name);
echo "<br>";
echo "String Reverse => ".strrev($name);
echo "<br>";
echo "String Position => ".strpos($name,"Lakshya");
echo "<br>";
echo "String Replace => ".str_replace("Lakshya","Tanmay",$name);
?>
	</body>
</html>