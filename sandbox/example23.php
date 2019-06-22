<?php session_start(); // this will start a session ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Sessions</title>
</head>
<body>

</body>
</html>
<?php unset($_SESSION["somename"]); // this will destroy only one session with name somename ?>
<?php session_destroy(); // this will destroy all the session ?>
