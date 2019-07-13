<?php require_once "./header.php"; ?>
<?php
if (isset($_POST["btnDelete"])) {
    $catid = trim($_POST["btnDelete"]);
    $delete_cat = $pdo->prepare("DELETE FROM `tbl_category` where `catid` = :catid LIMIT 1");
    $delete_cat->bindParam(":catid", $catid);
    $delete_cat->execute();
    if ($delete_cat->execute()) {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    text: "Category Deleted",
                    title: "Category Deleted Succesfully",
                    icon: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    button: false
                });
            });
        </script>
        <?php
        header("refresh:3;category.php");
    } else {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    title: "Error",
                    text: "Error, Category Can't Be Deleted",
                    icon: "error",
                    button: "Ok"
                });
            });
        </script>
    <?php
    }
}
if (isset($_POST["btnEditCategory"])) {
    $catid = trim($_POST["txtid"]);
    $category = trim($_POST["txtcategory"]);
    if (!empty($category)) {
        $update = $pdo->prepare("UPDATE `tbl_category` SET `category`=:category  where `catid`=:catid LIMIT 1");
        $update->bindParam(":category", $category);
        $update->bindParam(":catid", $catid);

        if ($update->execute()) {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Update Successful",
                        text: "Category Updated Successfully",
                        icon: "success",
                        showConfirmButton: false,
                        showCancelButton: false,
                        button: false
                    });
                });
            </script>

        <?php
        } else {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Update Operation Failed",
                        text: "Error In Updating, category",
                        icon: "warning",
                        showconfirmButton: false,
                        showCancelButton: false,
                        button: false
                    });
                });
            </script>
        <?php
        }
        header("refresh:3;category.php");
    } else {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    title: "Category Name Erorr!",
                    text: "Category Name Can't Be Blank",
                    icon: "error",
                    button: "Try Again"
                });
            });
        </script>
    <?php
    }
}
if (isset($_POST["btnAddCategory"])) {
    $category = trim($_POST["txtcategory"]);
    if (!empty($category)) {
        $insert = $pdo->prepare("INSERT INTO `tbl_category` (`category`) values (:category)");
        $insert->bindParam(":category", $category);
        $insert->execute();
        if ($insert->rowCount()) {
            echo "Category Inserted Successfully";
            ?>
            <script type="text/javascript">
                window.addEventListener("load", function() {
                    swal({
                        title: "Category Inserted Successfully",
                        text: "<?php echo $category ?>, Has Been Inserted",
                        icon: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        buttons: false
                    });
                });
            </script>
        <?php
        } else {
            ?>
            <script>
                window.addEventListener("load", function() {
                    swal({
                        title: "Error",
                        text: "Category Insertion Failed",
                        icon: "error",
                        showConfirmButton: false,
                        showCancelButton: false,
                        buttons: false
                    });
                });
            </script>

        <?php
        }
        header("refresh:3,category.php");
    } else {
        ?>
        <script>
            window.addEventListener("load", function() {
                swal({
                    title: "Category Empty",
                    text: "Category Name Can't Be Empty",
                    icon: "warning",
                    button: "Continue"
                });
            });
        </script>
    <?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="POST">
                        <div class="box-body">
                            <div class="col-md-4">
                                <?php
                                if (isset($_POST["btnEdit"])) {
                                    $catid = trim($_POST["btnEdit"]);
                                    $get_cat = $pdo->prepare("SELECT * FROM `tbl_category` where `catid`= :catid");
                                    $get_cat->bindParam(":catid", $catid);
                                    $get_cat->execute();
                                    $rowCat = $get_cat->fetch(PDO::FETCH_OBJ);
                                    ?>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="hidden" name="txtid" value="<?php echo $rowCat->catid; ?>">
                                        <input type="text" class="form-control" id="category" placeholder="Enter category" name="txtcategory" value="<?php echo $rowCat->category; ?>">
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" name="btnEditCategory" class="btn btn-info">Update Category</button>
                                    </div>
                                <?php
                                } else { ?>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" placeholder="Enter category" name="txtcategory">
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" name="btnAddCategory" class="btn btn-warning">Add Category</button>
                                    </div>
                                <?php }   ?>


                            </div>
                            <div class="col-md-8">
                                <table class="datatable table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>CategoryId</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_category = $pdo->prepare("SELECT * FROM `tbl_category` order by `catid` DESC");
                                        $get_category->execute();
                                        //var_dump($get_category);
                                        while ($row = $get_category->fetch(PDO::FETCH_OBJ)) {
                                            echo "<tr>";
                                            echo "<td>{$row->catid}</td>";
                                            echo "<td>{$row->category}</td>";
                                            //echo "<td><a href='category.php?catid={$row->catid}' class='btn btn-primary'>Edit</a></td>";
                                            echo "<td><button type='submit' name='btnEdit' value='{$row->catid}'  class='btn btn-primary'>Edit</button></td>";
                                            // echo "<td><a href='category.php?del={$row->catid}' class='btn btn-danger'>Delete</a></td> ";
                                            echo "<td><button type='submit' name='btnDelete' value='{$row->catid}' class='btn btn-danger'>Delete</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>CategoryId</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>