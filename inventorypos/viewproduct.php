<?php require_once "./header.php";?>
<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
	$productid = trim($_GET["id"]);
	$getProduct = $pdo->prepare("SELECT * FROM `tbl_product` where `productid` = :productid");
	$getProduct->bindParam(":productid", $productid);
	$getProduct->execute();
	if (!$getProduct->rowCount()) {
		header("refresh:1;productlist.php");
	}

} else {
	header("refresh:1;productlist.php");
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Product
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title"> <a href="productlist.php" class="btn btn-primary" role="button">Back To Product List</a> </h3>
        </div> <!-- div.box-header -->
        <div class="box-body">
               <?php while ($resultProduct = $getProduct->fetch(PDO::FETCH_OBJ)) {
				   $categoryid = $resultProduct->productcategory;
				   $getCategory = $pdo->prepare("SELECT `category` from `tbl_category` where `catid`=:categoryid");
				   $getCategory->bindParam(":categoryid",$categoryid);
				   $getCategory->execute();
				   $resultCategory = $getCategory->fetch(PDO::FETCH_OBJ);
				 // var_dump($resultCategory);
				   
	echo '
                 <div class="col-md-6" style="font-size:larger">
                 <center><p class="list-group-item list-group-item-success"><strong>Product</strong></p></center>
                    <ul class="list-group">
                        <li class="list-group-item">ID <span class="label label-primary pull-right">' . $resultProduct->productid . '</span></li>
                        <li class="list-group-item">Product Name <span class="label label-info pull-right">' . $resultProduct->productname . '</span></li>
                        <li class="list-group-item">Category <span class="label label-info pull-right">'.$resultCategory->category.'</span></li>
						<li class="list-group-item">Purchase Price <span class="label label-warning pull-right">'.$resultProduct->purchaseprice.'</span></li>
						<li class="list-group-item">Selling Price <span class="label label-warning pull-right">'.$resultProduct->sellprice.'</span></li>
						<li class="list-group-item">Product Profit <span class="label label-success pull-right">'.($resultProduct->sellprice - $resultProduct->purchaseprice ).'</span></li>
						<li class="list-group-item">Stock <span class="label label-danger pull-right">'.$resultProduct->stock.'</span></li>
						<li class="list-group-item"><strong>Description :- </strong> <span class="">'.$resultProduct->description.'</span></li>
                    </ul>
                 </div>
                 <div class="col-md-6">
                 <center><p class="list-group-item list-group-item-success"><strong>Product Image</strong></p></center>
                    <ul class="list-group">
                        <li class="list-group-item"><img src="uploads/'.$resultProduct->productimage.'" alt="Product Image" style="max-width:100%;" class="img-responsive"></li>
                    </ul>
                 </div>';

}?>
        </div> <!-- div.box-body -->
        <div class="box-footer">

        </div> <!-- div.box-footer -->
      </div> <!-- div.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once "./footer.php";?>