<?php require_once "./header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Order
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
        <form action="" method="POST">
            
            <div class="box-header with-border">
                <h3 class="box-title">New Order</h3>
            </div> <!-- div.box-header -->
            <div class="box-body">
              <!--------------------------
                | THIS IS FOR CUSTOMER AND DATE |
                -------------------------->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customername">Customer Name</label>
                        <input type="text" name="customername" id="customername" class="form-control" required="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Purchase Date:</label>

                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="purchasedate" class="form-control pull-right datepicker" id="purchasedate">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
            </div> <!-- div.box-body -->
            <div class="box-body">
              <!--------------------------
                | THIS IS FOR TABLE |
                -------------------------->
            </div> <!-- div.box-body -->
            <div class="box-body">
              <!--------------------------
                | THIS IS FOR DISCOUNT AND TAXES |
                -------------------------->
            </div> <!-- div.box-body -->
            
            
        </form>
      </div> <!-- div.box -->
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php require_once "./footer.php"; ?>