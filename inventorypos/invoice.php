<?php 
	require "connect_db.php";
	require "fpdf/fpdf.php";
	// A4 219 mm
	// default margin 10mm each side 
	// writable 199 mm 
	
	//create pdf object
	$pdf= new fpdf("P","mm","A4");
	$pdf->AddPage();
	$pdf->output();
	
?>