<?php
    if(isset($_POST['upload'])){
        echo "<pre>",print_r($_FILES),"</pre>";
        echo "<pre>",print_r($_FILES["myfile"]),"</pre>";
        $myfile = $_FILES["myfile"];
        $f_name = $myfile["name"];
        $f_tmp_name = $myfile["tmp_name"];
        $f_error = $myfile["error"];
        $f_size = $myfile["size"];
        $f_type= $myfile["type"];
        $upload = "upload/".$f_name; // USER DIRECTORY_SEPERATOR HERE INSTEAD OF HARD CODING IT
        $fileuploadstatus = move_uploaded_file($f_tmp_name,$upload); // NEVER DIRECTLY UPLOAD FILE THIS IS DEMO - SECURITY RISK
        if($fileuploadstatus){
            echo "File Successfully Uploaded";
        }else{
            echo "File Upload Failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Files In PHP P-1</title>
</head>
<body>
    <form class="" enctype="multipart/form-data" action="" method="post">
        <div class="">
            <input type="file" name="myfile" id="myfile"> <br>
            <input type="submit" value="Upload" name="upload">
        </div>
    </form>
</body>
</html>
