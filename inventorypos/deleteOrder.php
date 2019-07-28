<?php
    include "connect_db.php";
    // echo "<pre>",print_r($_REQUEST),"</pre>";
    $invoice_id = trim($_POST["id"]);
    $delete_invoice_query = "DELETE FROM `tbl_invoice` where `invoice_id` = :invoice_id LIMIT 1";
	$delete_invoice=$pdo->prepare($delete_invoice_query);
	$delete_invoice->bindParam(":invoice_id",$invoice_id);
	$delete_invoice->execute();
	if($delete_invoice->rowCount()){
		$delete_invoice_details_query="DELETE FROM `tbl_invoice_details` where `invoice_id` = :invoice_id";
		$delete_invoice_details = $pdo->prepare($delete_invoice_details_query);
		$delete_invoice_details->bindParam(":invoice_id",$invoice_id);
		$delete_invoice_details->execute();
	}
?>
