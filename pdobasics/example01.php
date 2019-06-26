<?php
    require "dbconnect.php";
    if(isset($_POST["btnsave"],$_POST["productname"],$_POST["productprice"])){
        //echo "<pre>",print_r($_POST),"</pre>";
        //echo "<pre>",print_r($_REQUEST),"</pre>";
        $productname = trim($_POST["productname"]);
        $productprice = trim($_POST["productprice"]);
        //var_dump($productname);
        //var_dump($productprice);
        //var_dump(!empty($productname) && !empty($productprice));
        if(!empty($productname) && !empty($productprice)){
            $insert = $con->prepare("INSERT INTO `tbl_product` (`productname`,`productprice`) values (:name,:price)");
            $insert->bindParam(':name',$productname);
            $insert->bindParam(':price',$productprice);
            $insert->execute();
            //var_dump($insert);
            if($insert->rowCount()){
                echo "Insert Successfull";
            }
        }else{
            echo "Both The Fields Are Empty";
        }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - Insert</title>
</head>
<body>
    <form class="" action="" method="post">
        <label for="productname">Product Name</label><br>
        <input type="text" name="productname" id="productname" placeholder="Enter Product Name"> <br><br>
        <label for="productprice">Product Price</label><br>
        <input type="text" name="productprice" id="productprice" placeholder="Enter Product Price"> <br><br>
        <input type="submit" value="Add Product" name="btnsave">
    </form>
</body>
</html>
