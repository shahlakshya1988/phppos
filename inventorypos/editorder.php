<?php require_once "./header.php"; ?>
<?php
if(isset($_GET["id"]) && trim($_GET["id"])!=''){
    $invoice_id = trim($_GET["id"]);
    $get_invoice = $pdo->prepare("SELECT * FROM `tbl_invoice` where `invoice_id` = :invoice_id LIMIT 1");
    $get_invoice->bindParam(":invoice_id",$invoice_id);
    if($get_invoice->execute()){
        if($get_invoice->rowCount()){
            $invoice = $get_invoice->fetch(PDO::FETCH_OBJ);
            // var_dump($invoice);
        }else{
            header("refresh:0;orderlist.php");
        }
    }else{
        header("refresh:0;orderlist.php");
    }


}else{
    header("refresh:0;orderlist.php");
}

$invoice_details_query = $pdo->prepare("SELECT * FROM `tbl_invoice_details` where `invoice_id` = :invoice_id");
$invoice_details_query->bindParam(":invoice_id",$invoice_id);
$invoice_details_query->execute();



/*
foreach($row_invoice_details as $item_details){
	echo "<br>";
	echo "<pre>",print_r($item_details),"</pre>";
	echo "<br>";
} */

function fill_product($arg_productid=null)
{
    global $pdo;
    $output = '';
    $select_product = $pdo->prepare("SELECT `productid`,`productname` from `tbl_product` ORDER BY `productname` ASC ");
    $select_product->execute();
    if ($select_product->rowCount()) {
        while ($row = $select_product->fetch(PDO::FETCH_OBJ)) {
            if($arg_productid == $row->productid){
                $output .= "<option value='{$row->productid}' selected>{$row->productname}</option>";
            }else{
                $output .= "<option value='{$row->productid}'>{$row->productname}</option>";
            }
            
        }
    }
    return $output;
}


if(isset($_POST['btnUpdateOrder'])){
    //echo "<pre>",print_r($_POST),"</pre>";
    $invoice_id = trim($_GET["id"]);
    $customer_name = trim($_POST['customername']);
    $orderdate = trim($_POST['orderdate']);
    $orderdate_timestamp = strtotime($orderdate);
    $subtotal = trim($_POST['subtotal']);
    $tax = trim($_POST['tax']);
    $discount = trim($_POST['discount']);
    $total = trim($_POST['total']);
    $paid = trim($_POST['paid']);
    $due = trim($_POST['due']);
    $payment_type = trim($_POST['paymentmethod']);

    /*** GETTTING VALUES IN FORM OF ARRAYS ***/
    $arr_productname = $_POST["productname"];
    $arr_productid = $_POST["productid"];
    $arr_productstock = $_POST["productstock"];
    $arr_productprice = $_POST["productprice"];
    $arr_productqty = $_POST["productqty"];
    $arr_producttotal = $_POST["producttotal"];
    /*** GETTTING VALUES IN FORM OF ARRAYS ***/
	
	
	/*** writting values back for existing product quantities to product table ***/
	while($row_invoice_details = $invoice_details_query->fetch(PDO::FETCH_OBJ)){
		
		$updateProductStock = $pdo->prepare("UPDATE `tbl_product` SET `stock` = `stock`+:invoice_stock where `productid` = :invoice_product_id LIMIT 1");
		$updateProductStock->bindParam(":invoice_stock",$row_invoice_details->qty);
		$updateProductStock->bindParam(":invoice_product_id",$row_invoice_details->productid);
		$updateProductStock->execute();
	}
	/*** writting values back for existing product quantities to product table ***/
	
	/*** deleting the invoice details table with the matching invoiceid ***/
	$delete_invoice_details = $pdo->prepare("DELETE FROM `tbl_invoice_details` where `invoice_id` = :invoice_id");
	$delete_invoice_details -> bindParam(":invoice_id",$invoice_id);
	$delete_invoice_details -> execute();
	/*** deleting the invoice details table with the matching invoiceid ***/
	
	/****  UPDATING INVOICE MAIN TABLE `tbl_invoice`****/
	$update_invoice_query = "UPDATE `tbl_invoice` SET 
	`customer_name` = :customer_name,
	`orderdate` = :orderdate,
	`orderdate_timestamp` = :orderdate_timestamp,
	`subtotal` = :subtotal,
	`tax` = :tax,
	`discount` = :discount,
	`total` = :total,
	`paid` = :paid,
	`due` = :due,
	`payment_type` =  :payment_type
	WHERE `invoice_id` = :invoice_id";
	$update_invoice = $pdo->prepare($update_invoice_query);
	$update_invoice->bindParam(":customer_name",$customer_name);
	$update_invoice->bindParam(":orderdate",$orderdate);
	$update_invoice->bindParam(":orderdate_timestamp",$orderdate_timestamp);
	$update_invoice->bindParam(":subtotal",$subtotal);
	$update_invoice->bindParam(":tax",$tax);
	$update_invoice->bindParam(":discount",$discount);
	$update_invoice->bindParam(":total",$total);
	$update_invoice->bindParam(":paid",$paid);
	$update_invoice->bindParam(":due",$due);
	$update_invoice->bindParam(":payment_type",$payment_type);
	$update_invoice->bindParam(":invoice_id",$invoice_id);
	$update_invoice->execute();
	/****  UPDATING INVOICE MAIN TABLE `tbl_invoice`****/
	
	
	/*** INSERTING DATA INTO tbl_invoice_details ****/
	$insert_tbl_invoice_details_query = "INSERT INTO `tbl_invoice_details` (`invoice_id`,`productid`,`productname`,`qty`,`price`,`total`,`orderdate`,`orderdate_timestamp`) values (:invoice_id,:productid,:productname,:qty,:price,:total,:orderdate,:orderdate_timestamp)";
	$insert_tbl_invoice_details = $pdo->prepare($insert_tbl_invoice_details_query);
	$insert_tbl_invoice_details->bindParam(":invoice_id",$invoice_id);
	$insert_tbl_invoice_details->bindParam(":orderdate",$orderdate);
	$insert_tbl_invoice_details->bindParam(":orderdate_timestamp",$orderdate_timestamp);
	for($i=0;$i<count($arr_productid);$i++){
		$productid = $arr_productid[$i];
		$productname = $arr_productname[$i];
		$qty = $arr_productqty[$i];
		//var_dump($qty);
		//echo "<br>**************<br>";
		$price = $arr_productprice[$i];
		$total = $arr_producttotal[$i];
		
		$insert_tbl_invoice_details->bindParam(":productid",$productid);
		$insert_tbl_invoice_details->bindParam(":productname",$productname);
		$insert_tbl_invoice_details->bindParam(":qty",$qty);
		$insert_tbl_invoice_details->bindParam(":price",$price);
		$insert_tbl_invoice_details->bindParam(":total",$total);
		$insert_tbl_invoice_details->execute();
		$invoice_details_id = $pdo->lastInsertId();
		if($invoice_details_id != null){
			$udpate_product_stock_query = "UPDATE `tbl_product` SET 
			`stock` = `stock` - :qty 
			WHERE `productid` = :productid LIMIT 1";
			$update_product_stock = $pdo->prepare($udpate_product_stock_query);
			$update_product_stock->bindParam(":qty",$qty);
			$update_product_stock->bindParam(":productid",$productid);
			$update_product_stock->execute();
		}
	}
	
	/*** INSERTING DATA INTO tbl_invoice_details ****/
	?>
	<script type="text/javascript">
		window.addEventListener("load",function(){
			swal({
				title:"Order Updated",
				text:"Order Updated Successfully",
				button:false,
				showCancelButton:false,
				showConfirmButton:false,
				icon:'success'
			});
		});
	</script>
	<?php  
	header("refresh:4;orderlist.php");

} //if(isset($_POST['btnUpdateOrder'])){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Order
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
                    <h3 class="box-title">Edit Order</h3>
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
                                <input type="text" name="customername" id="customername" class="form-control" required="true" value="<?php echo $invoice->customer_name; ?>">
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
                                <input type="text" name="orderdate" class="form-control pull-right datepicker" id="orderdate" readonly value="<?php echo $invoice->orderdate; ?>" >
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
                                        <center><button type="button" name="add" class="btn btn-info btnAdd btn-sm"> <span class="glyphicon glyphicon-plus"></span> </button></center>
                                    </th>
                                </thead>
                                <tbody id="productTable_tbody">
                                    <?php 
                                    $get_invoice_details = $pdo->prepare("SELECT * from `tbl_invoice_details` where `invoice_id` = :invoiceid");
                                    $get_invoice_details->bindParam(":invoiceid",$invoice_id);
                                    if($get_invoice_details->execute()){
                                        while($invoice_details = $get_invoice_details->fetch(PDO::FETCH_OBJ)){
                                            // getting lastest product stock
                                            $get_stock = $pdo->prepare("SELECT `stock` FROM `tbl_product` where `productid` = :invoice_productid");
                                            $get_stock -> bindParam(":invoice_productid",$invoice_details->productid);
                                            $get_stock -> execute();
                                            $stock = $get_stock->fetch(PDO::FETCH_OBJ);
                                            // getting lastest product stock
                                            echo "<tr>";
                                                echo "<td><input type=\"hidden\" class=\"form-control pname\" name=\"productname[]\"  required value=\"".$invoice_details->productname."\" /></td>";
                                                echo "<td><select style=\"width:250px;\" name=\"productid[]\" id=\"\" class=\"form-control select2 productid \" ><option>Select Product</option>".fill_product($invoice_details->productid)."</select></td>";
                                                echo "<td><input type=\"text\" class=\"form-control stock\" name=\"productstock[]\"  readonly value=\"".$stock->stock."\" /></td>";
                                                echo "<td><input type=\"text\" class=\"form-control price\" name=\"productprice[]\"  readonly value=\"".$invoice_details->price."\" /></td>";
                                                echo "<td><input type=\"number\" class=\"form-control qty\" name=\"productqty[]\" value=\"".$invoice_details->qty."\" min=\"1\"   /></td>";
                                                echo "<td><input type=\"text\" class=\"form-control total\" name=\"producttotal[]\"  readonly  value=\"".$invoice_details->total."\"/></td>";
                                                echo "<td><center><button class=\" btn btn-danger btnRemove \" name=\"remove\" ><span class=\"glyphicon glyphicon-remove\"></span></button></center></td>";
                                            echo "</tr>";
                                        }
                                    }
                                 
                                    ?>

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
                                <input type="number" name="subtotal" id="subtotal" class="form-control" placeholder="Sub Total" required="" readonly value="<?php echo $invoice->subtotal; ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="tax">Taxes (5%)</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="tax" id="tax" class="form-control" placeholder="Taxes" required readonly value="<?php echo $invoice->tax; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="discount" id="discount" class="form-control" required="true" placeholder="Discount" value="<?php echo $invoice->discount; ?>" >
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
                                <input type="number" name="total" id="total" class="form-control" required readonly value="<?php echo $invoice->total; ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="paid">Paid</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="paid" id="paid" placeholder="Paid Amount" class="form-control" required="" value="<?php echo $invoice->paid; ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">Due</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <input type="number" name="due" id="due" class="form-control" value="<?php echo $invoice->due; ?>" placeholder="Enter Due Amount" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6 pull-right">
                        <div class="form-group">
                            <label for="">Payment Method</label> <br>
                            <label for="paymentmethod1">
                                <input type="radio" name="paymentmethod" id="paymentmethod1" class="minimal-red"  value="Cash" <?php if($invoice->payment_type=="Cash"){ echo "checked"; } ?> > Cash
                            </label> &nbsp;
                            <label for="paymentmethod2">
                                <input type="radio" name="paymentmethod" id="paymentmethod2" class="minimal-red" value="Card" <?php if($invoice->payment_type=="Card"){ echo "checked"; } ?> > Card
                            </label> &nbsp;
                            <label for="paymentmethod3">
                                <input type="radio" name="paymentmethod" id="paymentmethod3" class="minimal-red" value="Cheque" <?php if($invoice->payment_type=="Cheque"){ echo "checked"; } ?> > Cheque
                            </label>
                        </div>
                    </div>

                </div> <!-- div.box-body -->
                <div class="box-footer">
                    <div align="center">
                        <button type="submit" name="btnUpdateOrder" class="btn btn-warning">Update Order</button>
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
                    tr.find(".pname").val(data["productname"]);
                    tr.find(".stock").val(data["stock"]);
                    tr.find(".stock").val(data["stock"]);
                    tr.find(".price").val(data["sellprice"]);
                    tr.find(".qty").val(1);
                    var totalPrice = 1 * parseInt(data["sellprice"]);
                    tr.find(".total").val(totalPrice);
					calculate();
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
			calculate();
        });


		calculate();

    });
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
			calculate();
        });

    $(document).on("click", ".btnRemove", function() {
        // $(this).parentsUntil("tr").parent().remove();
        $(this).closest("tr").remove();
		calculate();
    });
    $(document).on("keyup change","#paid,#discount",function(){
        calculate();
    });
	function calculate(){

		var subtotal = 0;
		var tax = 0;
		var discount = 0;
		var net_total = 0;
		var paid_amount = 0;
		var due = 0;
		$(".total").each(function(){
			subtotal = subtotal+($(this).val()*1);
		});

        var taxamount= subtotal * 0.05;
        $("#tax").val(taxamount.toFixed(2));
		//alert(subtotal);
		$("#subtotal").attr("value",subtotal.toFixed(2));

        net_total = subtotal + taxamount;
        discount = Number($("#discount").val().trim());
        net_total -= discount;
        paid_amount = Number($("#paid").val().trim());
        due = net_total - paid_amount;
        $("#total").val(net_total.toFixed(2));
        $("#due").val(due.toFixed(2));
	}
</script>
<?php require_once "./footer.php"; ?>
