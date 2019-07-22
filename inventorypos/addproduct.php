<?php require_once "./header.php"; ?>
<?php
$allowed_type = ["image/jpg", "image/jpeg", "image/gif", "image/png"];
$allowed_ext = ["png", "jpg", "jpeg", "gif"];
$allowed_size = 10485760;
if (isset($_POST["btnAddProduct"])) {
    //echo "<pre>", print_r($_REQUEST), "</PRE>";
    $productname = trim($_POST["productName"]);
    $productcategory = trim($_POST["productcategory"]);
    $purchaseprice = trim($_POST["purchasePrice"]);
    $sellprice = trim($_POST["sellPrice"]);
    $stock = trim($_POST["stock"]);
    $description = trim($_POST["productDescription"]);

    $name = $_FILES["productImage"]["name"];
    $ext = explode(".", $name);
    $ext = strtolower(end($ext));
    $type = $_FILES["productImage"]["type"];
    $tmp_name = $_FILES["productImage"]["tmp_name"];
    $size = $_FILES["productImage"]["size"];
    $error = $_FILES["productImage"]["error"];
    $newname = uniqid("", true) . "." . $ext;
    $storefile = "uploads/" . $newname;

    if (in_array($type, $allowed_type) && in_array($ext, $allowed_ext) && $size <= $allowed_size) {
        if (move_uploaded_file($tmp_name, $storefile)) {
            $insert = $pdo->prepare("INSERT INTO `tbl_product` (`productname`,`productcategory`,`purchaseprice`,`sellprice`,`stock`,`description`,`productimage`) values (:productname,:productcategory,:purchaseprice,:sellprice,:stock,:description,:newname)");
            $insert->bindParam(":productname", $productname);
            $insert->bindParam(":productcategory", $productcategory);
            $insert->bindParam(":purchaseprice", $purchaseprice);
            $insert->bindParam(":sellprice", $sellprice);
            $insert->bindParam(":stock", $stock);
            $insert->bindParam(":description", $description);
            $insert->bindParam(":newname", $newname);
            $insert->execute();
            if ($insert->rowCount()) {
                ?>
                <script type="text/javascript">
                    window.addEventListener("load", function() {
                        swal({
                            title: "Product Added",
                            text: "<?php echo $productname ?> Has Been Added Successfully",
                            icon: "success",
                            showConfirmButton: false,
                            showCancelButton: false,
                            button: false
                        });
                    });
                </script>
                <?php
                header("refresh:4;addproduct.php");
            } else {
                ?>
                <script type="text/javascript">
                    window.addEventListener("load", function() {
                        swal({
                            title: "Operation Failed",
                            text: "Product Can't Be Added",
                            icon: "error",
                            button: "Ok"

                        });
                    });
                </script>
            <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                window.addEventListener("load", function() {
                    swal({
                        title: "File Operation Failed",
                        text: "Product Can't be Added",
                        icon: "error",
                        button: "Ok"
                    });
                });
            </script>
        <?php
        }
    } else {
        if (!in_array($type, $allowed_type) || !in_array($ext, $allowed_ext)) {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Please Upload Image Of Proper Format",
                        text: "Image can only be of gif, jpeg, jpg, png format only",
                        icon: "error",
                        button: "Ok"
                    });
                });
            </script>
        <?php
        }

        if ($size > $allowed_size) {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Image Size Error!",
                        text: "Please upload Image of Proper size Under 9 MB",
                        icon: "error",
                        button: "ok"
                    });
                });
            </script>
        <?php
        }
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Product
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><a href="productlist.php" class="btn btn-primary" role="button">Back To List</a></h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="" name="fromProduct" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="productName" required>
                                </div>
                                <div class="form-group">
                                    <label for="productcategory">Select Category</label>
                                    <select class="form-control select2" name="productcategory" id="productcategory" required>
                                        <option value="" selected>Select Product Category</option>
                                        <?php
                                        $get_category = $pdo->prepare("SELECT * FROM `tbl_category` order by `catid` DESC");
                                        $get_category->execute();
                                        while ($fh_category = $get_category->fetch(PDO::FETCH_OBJ)) {
                                            echo "<option value='" . $fh_category->catid . "'>" . $fh_category->category . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="purchasePrice">Purchase Price</label>
                                    <input type="number" min="1" step="1" class="form-control" id="purchasePrice" placeholder="Enter Product Purchase Price" name="purchasePrice" required>
                                </div>
                                <div class="form-group">
                                    <label for="sellPrice">Sell Price</label>
                                    <input type="number" min="1" step="1" class="form-control" id="sellPrice" placeholder="Enter Product Sell Price" name="sellPrice" required>
                                </div>
                            </div> <!-- div.col-md-6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" min="1" step="1" class="form-control" id="stock" placeholder="Enter Product Stock" name="stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    <textarea name="productDescription" id="productDescription" class="form-control" placeholder="Enter Product Description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
                                    <input type="file" name="productImage" id="productImage" placeholder="Upload Product Image" class="form-control" accept="image/*" required>
                                </div>
                            </div><!-- div.col-md-6 -->
                            <div class="clearfix"></div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info" name="btnAddProduct">Add Product</button>

                            </div>
                        </form>
                    </div>
                    <!-- div.box-body -->

                </div> <!-- div.box.box-warning -->
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>