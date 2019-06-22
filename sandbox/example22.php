<?php
if(isset($_POST["submit"])){
    $f_name = $_FILES["myfile"]["name"];
    $f_type = $_FILES["myfile"]["type"];
    $f_tmp_name = $_FILES["myfile"]["tmp_name"];
    $f_size = $_FILES["myfile"]["size"];
    $f_error = $_FILES["myfile"]["error"];
    $allowed_size = 8388608;
    $allowed_type = ["image/jpg","image/jpeg","image/gif","image/png"];
    $allowed_extension = ["jpg","jpeg","gif","png"];
    $f_extension = explode(".",$f_name);
    $f_extension = end($f_extension);
    $f_extension = strtolower($f_extension);
    //var_dump($f_extension);
    if(in_array($f_type,$allowed_type) && in_array($f_extension,$allowed_extension) && $f_size<=$allowed_size){
        //$f_new_name = time().rand(111111,999999).".".$f_extension;
        $f_new_name = uniqid('', true).".".$f_extension;
        $store = "upload/".$f_new_name;
        var_dump($store);
        if(move_uploaded_file($f_tmp_name,$store)){
            echo "<br>File Uploaded Successfull<br>";
        }
    }else{
        echo "<br>Errorooooooooooooo!!!!<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload Condition</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="POST">
        <div class="">
            <input type="file" name="myfile" id="myfile">
        </div>
        <div class="">
            <input type="submit" value="Upload" name="submit">
        </div>
    </form>
</body>
</html>
