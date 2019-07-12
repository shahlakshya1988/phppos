<?php require_once "./header.php"; ?>
<?php
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
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" placeholder="Enter category" name="txtcategory" required>
                                </div>



                                <div class="form-group">
                                    <button type="submit" name="btnAddCategory" class="btn btn-warning">Add Category</button>
                                </div>

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
                                                   echo "<td><a href='category.php?catid={$row->catid}' class='btn btn-primary'>Edit</a></td>";
                                                   echo "<td><a href='category.php?del={$row->catid}' class='btn btn-danger'>Delete</a></td> ";
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