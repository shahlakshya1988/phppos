<?php
session_start(); // this is required for any of the statements below
echo $_SESSION["myname"];
session_destroy();
?>
