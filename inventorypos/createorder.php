<?php require_once "./header.php"; ?>
<?php
function fill_product()
{
    global $pdo;
    $output = '';
    $select_product = $pdo->prepare("SELECT `productid`,`productname` from `tbl_product` ORDER BY `productname` ASC ");
    $select_product->execute();
    if ($select_product->rowCount()) {
        while ($row = $select_product->fetch(PDO::FETCH_OBJ)) {
            $output .= "<option value='{$row->productid}'>{$row->productname}</option>";
        }
    }
    return $output;
}
?>
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
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="customername" id="customername" class="form-control" required="true">
                            </div>

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
                    <div class="col-md-12">
                        <div style="overflow-x:auto">
                            <table class="datatable1 table table-bordered table-striped" id="productTable">
                                <thead>
                                    <th>#</th>
                                    <th>Search Product</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Enter Quantity</th>
                                    <th>Total</th>
                                    <th>
                                        <center><button type="button" name="add" class="btn btn-success btnAdd btn-sm"> <span class="glyphicon glyphicon-plus"></span> </button></center>
                                    </th>
                                </thead>
                                <tbody id="productTable_tbody">


                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>Search Product</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Enter Quantity</th>
                                    <th>Total</th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div> <!-- div.box-body -->
                <div class="box-body">
                    <!--------------------------
                | THIS IS FOR DISCOUNT AND TAXES |
                -------------------------->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subtotal" class="form-label">Sub Total</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="subtotal" id="subtotal" class="form-control" placeholder="Sub Total" required="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="tax">Taxes</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="tax" id="tax" class="form-control" placeholder="Taxes" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="discount" id="discount" class="form-control" required="true" placeholder="Discount">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="total" id="total" class="form-control" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="paid">Paid</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="paid" id="paid" placeholder="Paid Amount" class="form-control" required="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Due</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="due" id="due" class="form-control" value="0" placeholder="Enter Due Amount">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Payment Method</label> <br>
                            <label for="paymentmethod1">
                                <input type="radio" name="paymentmethod" id="paymentmethod1" class="minimal-red" checked value="Cash"> Cash
                            </label> <br>
                            <label for="paymentmethod2">
                                <input type="radio" name="paymentmethod" id="paymentmethod2" class="minimal-red" value="Card"> Card
                            </label> <br>
                            <label for="paymentmethod3">
                                <input type="radio" name="paymentmethod" id="paymentmethod3" class="minimal-red" value="Cheque"> Cheque
                            </label>
                        </div>
                    </div>

                </div> <!-- div.box-body -->
                <div class="box-footer">
                    <div align="center">
                        <button type="submit" name="btnSaveOrder" class="btn btn-info">Create Order</button>
                    </div>
                </div>

            </form>
        </div> <!-- div.box -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
/*
//OLD METHOD, NOW WE ARE CALLING SAME WITH FUNCTION
  $get_product = $pdo->prepare("SELECT * FROM `tbl_product` ORDER BY `productid` DESC");
  $get_product->execute();
  $get_category = $pdo->prepare("SELECT `category` from `tbl_category` where `catid`=:catid");
  $sr_no = 1;
  $productOptionString="";
  while ($product = $get_product->fetch(PDO::FETCH_OBJ)) {
    $productOptionString.="<option value='".$product->productid."'>".$product->productname."</option>";
  }
*/
?>

<script>
    $(document).ready(function() {
        //alert("Working");
    });
    $(document).on("click", ".btnAdd", function() {
        var html = "";
        html += "<tr>";
        html += '<td><input type="hidden" class="form-control pname" name="productname[]"  required /></td>';
        html += "<td><select style=\"width:250px;\" name=\"productid[]\" id=\"\" class=\"form-control select2 productid \" ><option>Select Product</option>" + "<?php echo fill_product(); ?>" + "</select></td>";
        // html += '<td><input type="text" class="form-control pid" name="productid[]"  required /></td>';
        html += '<td><input type="text" class="form-control stock" name="productstock[]"  readonly /></td>';
        html += '<td><input type="text" class="form-control price" name="productprice[]"  readonly /></td>';
        html += '<td><input type="number" class="form-control qty" name="productqty[]" value="1" min="1"   /></td>';
        html += '<td><input type="text" class="form-control total" name="producttotal[]"  readonly /></td>';
        html += '<td><center><button class=\" btn btn-danger btnRemove \" name=\"remove\"" ><span class=\"glyphicon glyphicon-remove\"></span></button></center></td>';
        html += "</tr>";
        $("#productTable_tbody").append(html);
        // applying select2 to productid
        $('.productid').select2();
        //attaching on change event to productid
        $(".productid").on("change", function(e) {
            var productid = $(this).val().trim();
            var tr = $(this).closest("tr");
            // alert(productid);
            $.ajax({
                url: "getproduct.php",
                method: "get",
                data: {
                    productid: productid
                },
                success: function(data) {
                    console.log(data);
                    tr.find(".stock").val(data["stock"]);
                    tr.find(".price").val(data["sellprice"]);
                    tr.find(".qty").val(1);
                    var totalPrice = 1 * parseInt(data["sellprice"]);
                    tr.find(".total").val(totalPrice);
                },
                error: function() {
                    // alert("File Not Found");
                }


            });
        });

        // attaching the change event on quantity 
        /*
        $(document).on("change", ".qty", function(e) {
            var tr = $(this).closest("tr");
            var qty = $(this).val();
            var sellingprice = tr.find(".price").val();
            var totalPrice = parseInt(qty) * parseInt(sellingprice);
            tr.find(".total").val(totalPrice);
        }); */
        $("#productTable").delegate(".qty", "keyup change", function() {
            var tr = $(this).closest("tr");
            var qty = $(this).val();
            qty = parseInt(qty);
            var sellingprice = tr.find(".price").val();
            //alert(isNaN(qty));
            //alert(qty);
            if (qty > parseInt(tr.find(".stock").val())) {
                swal("Warning", "Warning! This Much Quantity Is Not Available", "warning");

                tr.find(".qty").val(1);
                var totalPrice = 1 * parseInt(sellingprice);
                tr.find(".total").val(totalPrice);
                return;

            }
            if (!isNaN(qty)) {
                var totalPrice = parseInt(qty) * parseInt(sellingprice);

            } else {
                var totalPrice = 1 * parseInt(sellingprice);
            }
            tr.find(".total").val(totalPrice);
        });

    });

    $(document).on("click", ".btnRemove", function() {
        // $(this).parentsUntil("tr").parent().remove();
        $(this).closest("tr").remove();
    });
</script>
<?php require_once "./footer.php"; ?>