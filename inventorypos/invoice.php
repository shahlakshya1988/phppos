<?php 
	require "connect_db.php";
	require "fpdf/fpdf.php";
	// A4 219 mm
	// default margin 10mm each side 
	// writable 199 mm 
	
	//create pdf object
	$pdf= new fpdf("P","mm","A4");
	$pdf->AddPage();
	$pdf->SetFont("Arial","B",20);
	$pdf->SetFillColor(150,150,150);
	$pdf->Cell(80,10,"Hello World1",0,1,"C",true,"https://www.google.com");
	$pdf->SetFillColor(120,120,120);
	$pdf->Cell(80,10,"Hello World2",1,0,"C",false,"https://www.google.com");
	$pdf->Cell(80,10,"Hello World3",1,0,"C",true,"https://www.google.com");
	$pdf->output();
	
?>