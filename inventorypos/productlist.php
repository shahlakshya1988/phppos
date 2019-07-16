<?php require_once "./header.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product List
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

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
            </div>
            <div class="box-body">
                <div class="col-lg-12">
                    <table class="datatable table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $get_product = $pdo->prepare("SELECT * FROM `tbl_product` ORDER BY `productid` DESC");
                            $get_product->execute();
                            $get_category = $pdo->prepare("SELECT `category` from `tbl_category` where `catid`=:catid");
                            while ($product = $get_product->fetch(PDO::FETCH_OBJ)) {
                                // var_dump($product);
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $product->productname; ?></td>
                                    <td>
                                        <?php
                                        $catid = $product->productcategory;
                                        $get_category->bindParam(":catid", $catid);
                                        $get_category->execute();
                                        $category = $get_category->fetch(PDO::FETCH_OBJ);
                                        // var_dump($category);
                                        echo $category->category;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $product->purchaseprice; ?>
                                    </td>
                                    <td>
                                        <?php echo $product->sellprice; ?>
                                    </td>
                                    <td>
                                        <?php echo $product->stock; ?>
                                    </td>
                                    <td>
                                        <?php echo $product->description; ?>
                                    </td>
                                    <td>
                                        <img src="uploads/<?php echo $product->productimage; ?>" alt="<?php echo $product->productname; ?>" height="50">
                                    </td>
                                    <td>
                                        <a href="productlist.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="box-footer">

            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>