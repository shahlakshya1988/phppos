<?php require_once "./header.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard
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
            <div style="overflow-x:auto">
                <table  class="datatable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Invoice Id</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Payment Type</th>
                            <th>Print</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_orders = $pdo->prepare("SELECT * FROM `tbl_invoice` ORDER BY `invoice_id` DESC");
                        $get_orders->execute();
                        while($orders = $get_orders->fetch(PDO::FETCH_OBJ)){
                            echo "<tr>";
                                echo "<td>{$orders->invoice_id}</td>";
                                echo "<td>{$orders->customer_name}</td>";
                                echo "<td>{$orders->orderdate}</td>";
                                echo "<td>{$orders->total}</td>";
                                echo "<td>{$orders->paid}</td>";
                                echo "<td>{$orders->due}</td>";
                                echo "<td>{$orders->payment_type}</td>";
                                echo "<td><a href=\"vieworder.php?id={$orders->invoice_id}\" class=\"btn btn-success\" role=\"button\" data-toggle=\"tooltip\" title=\"Print Invoice\"><span class=\"glyphicon glyphicon-print\"></span></a></td>";

                                echo "<td><a href=\"editorder.php?id={$orders->invoice_id}\" class=\"btn btn-info\" role=\"button\" data-toggle=\"tooltip\" title=\"Edit Invoice\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>";

                                echo "<td><button id=\"{$orders->invoice_id}\" class=\"btn btn-danger\" role=\"button\" data-toggle=\"tooltip\" title=\"Delete Invoice\"><span class=\"glyphicon glyphicon-trash\"></span></button></td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Invoice Id</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Payment Type</th>
                            <th>Print</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
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
