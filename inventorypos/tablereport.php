<?php require_once "./header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Table Sales Report
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
            <h3 class="box-title">Page Title Goes Here</h3>
        </div> <!-- div.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker pull-right" id="datepicker_1" name="datepicker_1">
                    </div>
                </div>
                <!-- col-md-5 -->
                <div class="col-md-5">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calender"></i>
                      </div>
                      <input type="text" class="form-control datepicker pull-right" id="datepicker_2" name="datepicker_2">
                    </div>
                </div>
                <!-- col-md-5 -->
                <div class="col-md-2">
                    <div align="center">
                        <button type="submit" class="btn btn-success" name="btnDateFilter" value="Filter By Date">Filter By Date</button>
                    </div>
                </div>
                <!-- div.col-md-2 -->
            </div>
            <!-- div.row -->
            <br><br>
             <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br>
      <br>
      <div class="row">
        <div style="overflow-x:auto">
            <table  class="datatable table table-bordered table-striped">
                <thead>
                    <tr>
                       <th>Invoice Id</th>
                       <th>Customer Name</th>
                       <th>Order Date</th>
                       <th>Total</th>
                       <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                     <td>---</td>
                     <td>---</td>
                     <td>---</td>
                     <td>---</td>
                     <td>---</td>
                   </tr>

                </tbody>
                <tfoot>
                    <tr>
                       <th>Invoice Id</th>
                       <th>Customer Name</th>
                       <th>Order Date</th>
                       <th>Total</th>
                       <th>Paid</th>
                    </tr>
                </tfoot>
            </table>
        </div>
      </div>
        </div> <!-- div.box-body -->
        <div class="box-footer">

        </div> <!-- div.box-footer -->
      </div> <!-- div.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once "./footer.php"; ?>
