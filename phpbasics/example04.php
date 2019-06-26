<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Datatype In PHP</title>
	</head>
	<body>
		<h2>Datatype</h2>
		<?php 
		/* 
		String - sequence of character between quotes 
		
		Integer - negative or positive - whole number 
		
		Float - Also know as double 3.14 51.90
		a number with decimal point
		
		Boolean - True/False 
		
		Array - named index collection of other values 
		
		Object - Instances Of classes
		
		Null - Special Type which has only one value 
		
		Resource - Special Variable with hold reference which are extenal to php like database connection etc
		*/ ?>
		<?php
			$x = "String"; // 'String'
			echo $x;
			echo "<br>";
			var_dump($x); // 
			echo gettype($x);// we will get the type
			
			echo "<br>**************<br>";
			echo $x=1;
			echo $x;
			echo "<br>";
			echo $x=-45;
			echo $x;
			echo "<br>";
			
			echo "<br>********************<br>";
			echo $x=1.9;
			echo $x;
			echo "<br>";
			echo $x=4.5;
			echo $x;
			echo "<br>";
			
			echo "<br>***************<br>";
			$x=true;
			if($x){
				echo "True Block";
			}else{
				echo "False Block";
			}
			echo "<br>";
			$y=false;
			if($y){
				echo "True Block";
			}else{
				echo "False Block";
			}
			
			echo "<br>**************<br>";
			$laptop=array();
			$laptop=["Dell","HP","Apple","Microsoft","Lenovo"];
			echo "<br>";
			echo "<pre>",print_r($laptop),"<pre><br>";
			echo $laptop[0]."<br>";
			echo $laptop[1]."<br>";
			echo $laptop[2]."<br>";
			echo $laptop[3]."<br>";
			echo $laptop[4]."<br>";
			 echo "<br>***************<br>";
			 $x=null;
			 var_dump($x);
			 echo gettype($x);
			 echo "<br>";
			 echo $x;
			
		?>
		
	</body>
</html>