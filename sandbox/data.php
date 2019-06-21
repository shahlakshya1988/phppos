<?php 
    echo "<br>********* GET METHOD ***********<br>";
    echo "<pre>",print_r($_GET),"</pre>";
    echo "<br>".$_GET["firstname"]."<br>";
    echo "<br>".$_GET["password"]."<br>";
    echo "<br>********* POST METHOD ***********<br>";
    echo "<pre>",print_r($_POST),"</pre>";
    echo "<br>".$_POST["firstname"]."<br>";
    echo "<br>".$_POST["password"]."<br>";
    echo "<br>********* REQUEST METHOD ***********<br>";
    echo "<pre>",print_r($_REQUEST),"</pre>";
    echo "<br>".$_REQUEST["firstname"]."<br>";
    echo "<br>".$_REQUEST["password"]."<br>";
?>