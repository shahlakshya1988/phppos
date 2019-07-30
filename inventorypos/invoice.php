<?php 
	require "connect_db.php";
	require "fpdf/fpdf.php";
	// A4 219 mm
	// default margin 10mm each side 
	// writable 199 mm 
	$invoiceNumber = rand(1111,9999);
	$date = date("d-F-Y");
	//create pdf object
	$pdf= new fpdf("P","mm","A4");
	$pdf->AddPage();
	$pdf->SetFont("Arial","B",20);
	$pdf->Cell(189,10,"Inventory POS",1,1,"C",false,"https://www.google.com");
	$pdf->setFont("Arial","",14);
	$pdf->Cell(100,10,"My Addres Goes Here ",0,0,"L",false);
	$pdf->Cell(89,10,"Date# {$date}",1,1,"R",false);
		$pdf->Cell(100,10,"shahlakshya1988@gmail.com ",0,0,"L",false);
	$pdf->Cell(89,10,"Invoice No.# {$invoiceNumber}",1,1,"R",false);
	$pdf->Cell(189,10," ",1,1,false);
	$pdf->output();
	
?>