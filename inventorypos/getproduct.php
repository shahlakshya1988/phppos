<?php
    include "connect_db.php";
    // echo "<pre>",print_r($_REQUEST),"</pre>";
    $id = trim($_GET["productid"]);
    $selectProduct = $pdo->prepare("SELECT * FROM `tbl_product` where `productid` = :productid and `stock`>0");
    $selectProduct->bindParam(":productid",$id);
    if($selectProduct->execute()){
        if($selectProduct->rowCount()){
            $row = $selectProduct->fetch(PDO::FETCH_OBJ);
           // var_dump($row);die();
            // header("ContentType: application/json");
            header('Content-Type: application/json');
            echo json_encode($row); die();
        }
    }else{

    }
?>
