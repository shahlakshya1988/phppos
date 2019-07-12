<?php require_once "./header.php"; ?>
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
                                        <tr>
                                            <td>CategoryId</td>
                                            <td>Category</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
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