<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Super Global Variables GET & POST</title>
</head>
<body>
<h2>Get Method</h2>
<!-- method ="GET" or method="POST" -->
    <form action="data.php" method="GET">
        <input type="text" name="firstname" id="firstname">
        <input type="password" name="password" id="password">
        <input type="submit" value="submit" name="submit_form">
    </form>

<h2>Post Method</h2>
<!-- method ="GET" or method="POST" -->
<form action="data.php" method="POST">
        <input type="text" name="firstname" id="firstname">
        <input type="password" name="password" id="password">
        <input type="submit" value="submit" name="submit_form">
    </form>
</body>
</html>