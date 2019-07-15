<?php require_once "./header.php"; ?>
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
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product Form</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="" name="fromProduct" method="post">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="productName" required>
                                </div>
                                <div class="form-group">
                                    <label for="selectCategory">Select Category</label>
                                    <select class="form-control" name="selectCategory" id="selectCategory" required>
                                        <option value="" disabled selected>Select Product Category</option>
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
                                    <input type="text" class="form-control" id="purchasePrice" placeholder="Enter Product Purchase Price" name="purchasePrice" required>
                                </div>
                                <div class="form-group">
                                    <label for="sellPrice">Sell Price</label>
                                    <input type="text" class="form-control" id="sellPrice" placeholder="Enter Product Sell Price" name="sellPrice" required>
                                </div>
                            </div> <!-- div.col-md-6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" class="form-control" id="stock" placeholder="Enter Product Stock" name="stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>

                                    <textarea name="productDescription" id="productDescription" class="form-control" placeholder="Enter Product Description">
                                    </textarea>
                                </div>
                            </div><!-- div.col-md-6 -->
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