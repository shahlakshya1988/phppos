<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP FUNCTIONS</title>
</head>
<body>
	<?php
	function function_name($firstname,$middlename="Default Middle Name",$lastname="Default Last Name"){
		var_dump($firstname);
		var_dump($middlename);
		var_dump($lastname);
	} 
	function_name("First Name","Middle Name","Last Name");
	echo "<br>";
	function_name("First Name"," ","Last Name");
	echo "<br>";
	//function_name("First Name", ,"Last Name");
	function_name("First Name");
	?>
</body>
</html>