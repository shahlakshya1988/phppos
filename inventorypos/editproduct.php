<?php require_once "./header.php"; ?>
<?php
if(isset($_GET["id"]) && trim($_GET["id"])!=''){
	$productid = trim($_GET["id"]);
	$getProduct = $pdo->prepare("SELECT * FROM `tbl_product` where `productid` = :productid");
	$getProduct->bindParam(":productid",$productid);
	if($getProduct->execute()){
		if($getProduct->rowCount()){
			$product = $getProduct->fetch(PDO::FETCH_OBJ);
			var_dump($product);
		}else{
			header("refresh:1;productlist.php");
		}
		
	}else{
		header("refresh:1;productlist.php");
	}
}else{
	header("refresh:1;productlist.php");
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Product 
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
            <h3 class="box-title"> <a href="productlist.php" class="btn btn-primary" role="button">Product Listing</a> </h3>
        </div> <!-- div.box-header -->
        <div class="box-body">
                        <form action="" name="fromProduct" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="productName" required value="<?php echo $product->productname; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="productcategory">Select Category</label>
                                    <select class="form-control" name="productcategory" id="productcategory" required>
                                        <option value="" disabled selected>Select Product Category</option>
                                        <?php
                                        $get_category = $pdo->prepare("SELECT * FROM `tbl_category` order by `catid` DESC");
                                        $get_category->execute();
                                        while ($fh_category = $get_category->fetch(PDO::FETCH_OBJ)) {
											if($fh_category->catid == $product->productcategory){
												echo "<option selected value='" . $fh_category->catid . "'>" . $fh_category->category . "</option>";
											}else{
												echo "<option value='" . $fh_category->catid . "'>" . $fh_category->category . "</option>";
											}
                                            
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="purchasePrice">Purchase Price</label>
                                    <input type="number" min="1" step="1" class="form-control" id="purchasePrice" placeholder="Enter Product Purchase Price" name="purchasePrice" required value="<?php echo $product->purchaseprice; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="sellPrice">Sell Price</label>
                                    <input type="number" min="1" step="1" class="form-control" id="sellPrice" placeholder="Enter Product Sell Price" name="sellPrice" required value="<?php echo $product->sellprice; ?>" >
                                </div>
                            </div> <!-- div.col-md-6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" min="1" step="1" class="form-control" id="stock" placeholder="Enter Product Stock" name="stock" required value="<?php echo $product->stock; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    <textarea name="productDescription" id="productDescription" class="form-control" placeholder="Enter Product Description" required><?php echo $product->description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
									<br>
									<img src="uploads/<?php echo $product->productimage; ?>" height="50px" class="img-rounded">
									<br>
									<br>
                                    <input type="file" name="productImage" id="productImage" placeholder="Upload Product Image" class="form-control" accept="image/*" required>
                                </div>
                            </div><!-- div.col-md-6 -->
                            <div class="clearfix"></div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info" name="btnEditProduct">Update Product</button>

                            </div>
                        </form>
                    </div>
                    <!-- div.box-body -->
      </div> <!-- div.box -->
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>