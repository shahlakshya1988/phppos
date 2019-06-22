<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Cookie</title>
</head>
<body>
    <?php
    // checking if our cookie exists or not
    print_r($_COOKIE);
    // checking if our cookie exists or not
        // setcookie($name,$content,$expire,$path,$domain,$secure);
        $name = 'VisitCount';
        $content = 1 + $_COOKIE['VisitCount'];
        $expire=time()+(60*60*24*7);
        setcookie($name,$content,$expire);
 // by giving negative time we can remove the cookie time() - (60*60*24*7)

    ?>
</body>
</html>
