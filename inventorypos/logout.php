<?php
    session_start();
    session_destroy();
    header("refresh:0;index.php");
    die();
?>
