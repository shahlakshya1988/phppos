<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Multidimensional Array</title>
</head>
<body>
	<?php
	$human=array(
		"personal"=>array("firstname"=>"Lakshya","lastname"=>"Shah","gender"=>"Male","age"=>31),
		"professional"=>array("education"=>"BE Computer Science","job"=>"Web Developer","experience"=>4.5)

	); 
	echo "<pre>",print_r($human),"</pre>";
	echo "<pre>",print_r($human["personal"]),"</pre>";
	echo "<pre>",print_r($human["professional"]),"</pre>";

	echo $human["personal"]["firstname"]."<br>";
	echo $human["personal"]["lastname"]."<br>";
	echo $human["personal"]["gender"]."<br>";
	echo $human["personal"]["age"]."<br>";
	echo $human["professional"]["education"]."<br>";
	?>
</body>
</html>