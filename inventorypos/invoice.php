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
	$pdf->Cell(189,10,"Inventory POS",0,1,"C",false,"https://www.google.com");
	$pdf->setFont("Arial","",14);
	$pdf->Cell(100,10,"My Addres Goes Here ",0,0,"L",false);
	$pdf->Cell(89,10,"Date# {$date}",0,1,"R",false);
		$pdf->Cell(100,10,"shahlakshya1988@gmail.com ",0,0,"L",false);
	$pdf->Cell(89,10,"Invoice No.# {$invoiceNumber}",0,1,"R",false);
	$pdf->Cell(189,10," ",0,1,"C",false);
	$pdf->Line(5,10,205,10);
	$pdf->Line(5,45,205,45);
	$pdf->Ln(10);
	$pdf->SetFont("Arial","BI","12");
	$pdf->Cell(89,10,"Bill To",0,0,"L",false);
	$pdf->SetFont("Arial","BI","12");
	$pdf->Cell(100,10,"Customer Name Goes Here",0,1,"R",false);
	$pdf->Ln(10);
	$pdf->SetFont("Arial","BI","16");
	$pdf->SetFillColor(208,208,208);
	$pdf->Cell(99,12,"Products",1,0,"C",true);
	$pdf->Cell(20,12,"Qty",1,0,"C",true);
	$pdf->Cell(30,12,"Price",1,0,"C",true);
	$pdf->Cell(40,12,"Total",1,1,"C",true);
	$pdf->SetFont("Arial","I","12");
	$pdf->Ln(2);
	$pdf->Cell(99,10,"Products Name Goes Here and Here",0,0,"L",false);
	$pdf->Cell(20,10,"Qty",0,0,"C",false);
	$pdf->Cell(30,10,"Price",0,0,"C",false);
	$pdf->Cell(40,10,"Total",0,1,"R",false);
	$pdf->Ln(1);
	$pdf->Cell(99,10,"Products Name Goes Here and Here",0,0,"L",false);
	$pdf->Cell(20,10,"Qty",0,0,"C",false);
	$pdf->Cell(30,10,"Price",0,0,"C",false);
	$pdf->Cell(40,10,"Total",0,1,"R",false);
	$pdf->Ln(1);
	$pdf->Cell(99,10,"Products Name Goes Here and Here",0,0,"L",false);
	$pdf->Cell(20,10,"Qty",0,0,"C",false);
	$pdf->Cell(30,10,"Price",0,0,"C",false);
	$pdf->Cell(40,10,"Total",0,1,"R",false);
	$pdf->Ln(1);
	$pdf->Cell(99,10,"Products Name Goes Here and Here",0,0,"L",false);
	$pdf->Cell(20,10,"Qty",0,0,"C",false);
	$pdf->Cell(30,10,"Price",0,0,"C",false);
	$pdf->Cell(40,10,"Total",0,1,"R",false);
	$pdf->Ln(2);
	$pdf->SetFont("Arial","BI","16");
	$pdf->Cell(149,12," ",1,0,"C",true);
	$pdf->Cell(40,12,"Total",1,1,"C",true);

	$pdf->output();
	
?>