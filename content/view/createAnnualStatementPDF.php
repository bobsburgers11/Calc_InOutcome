<?php

if(!isset($_SESSION)){ session_start(); }

include("../../fpdf/fpdf.php");
include_once '../dao/Database.php';
include_once '../dao/annualStatementDAO/AnnualStatementDAOImpl.php';

// Begin configuration

$textColour = array( 0, 0, 0 );
$headerColour = array( 0, 0, 0 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 0, 50, 140 );
$tableBorderColour = array( 0, 50, 140 );
$tableRowFillColour = array( 127, 184, 255 );
$reportName = ("Periodenabrechnung");
$columnLabels = array( "Bereich", "Strasse", "Nr.", "PLZ", "Ort", "Betrag" , "Summe" );

// End configuration

// Data receive

            $date_begin = $_SESSION['date_begin'];
            $date_end = $_SESSION['date_end'];
            $date_begin_fm = (DateTime::createFromFormat('Y-m-d', $date_begin));
            $date_end_fm = (DateTime::createFromFormat('Y-m-d', $date_end));
        
            $payed='1';
            $payedNeg='0';

            $totalAmountPayed = (new AnnualStatementDAOImpl(Database::connect()))->findTotal($payed, $date_begin, $date_end);
            $totalAmountPayedNeg = (new AnnualStatementDAOImpl(Database::connect()))->findTotal($payedNeg, $date_begin, $date_end);
            $totalSuccess = $totalAmountPayed->getTotalAmount() - $totalAmountPayedNeg->getTotalAmount();

            $invoiceTypes = (new AnnualStatementDAOImpl(Database::connect()))->findAll($payed, $date_begin, $date_end);
            foreach ($invoiceTypes as $invoiceType) {
                $reportPropertys = (new AnnualStatementDAOImpl(Database::connect()))->findAllReportPropertys($payed, $invoiceType->getInvoice_type(), $date_begin, $date_end);

                $invoiceType->setReportPropertys($reportPropertys);
            }

            $invoiceNegTypes = (new AnnualStatementDAOImpl(Database::connect()))->findAll($payedNeg, $date_begin, $date_end);
            foreach ($invoiceNegTypes as $invoiceNegType) {
                $reportNegPropertys = (new AnnualStatementDAOImpl(Database::connect()))->findAllReportPropertys($payedNeg, $invoiceNegType->getInvoice_type(), $date_begin, $date_end);

                $invoiceNegType->setReportPropertys($reportNegPropertys);
            }

/**
  Create the title page
**/

$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );

// Report Name
$pdf->AddPage();
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 17 );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
$pdf->Ln(8);
$pdf->SetFont( 'Arial', '', 14 );
$pdf->Cell( 0, 15, 'Von: ' . $date_begin_fm->format('d.m.Y') . '   Bis: ' . $date_end_fm->format('d.m.Y') , 0, 0, 'C' );
$pdf->Ln(15);
$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 14 );
$pdf->Cell( 0, 15, 'bezahlte Rechnungen', 0, 0, 'C' );

/**
 * Create Datatable 1
 */

$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 14 );


// Remaining header cells
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

  $pdf->Cell( 28, 10, $columnLabels[0], 1, 0, 'L', true );
  $pdf->Cell( 36, 10, $columnLabels[1], 1, 0, 'L', true );
  $pdf->Cell( 16, 10, $columnLabels[2], 1, 0, 'C', true );
  $pdf->Cell( 20, 10, $columnLabels[3], 1, 0, 'C', true );
  $pdf->Cell( 36, 10, $columnLabels[4], 1, 0, 'L', true );
  $pdf->Cell( 25, 10, $columnLabels[5], 1, 0, 'C', true );
  $pdf->Cell( 25, 10, $columnLabels[6], 1, 0, 'C', true );

$pdf->Ln();

// Create the table data rows

$fill = false;
$row = 0;

foreach ( $invoiceTypes as $invoiceType ) {

    
    if( $pdf->GetY() >= 190){
        $pdf->AddPage();
        
        // Create the table header row
        $pdf->SetFont( 'Arial', 'B', 14 );


        // Remaining header cells
        $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
        $pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

          $pdf->Cell( 28, 10, $columnLabels[0], 1, 0, 'L', true );
          $pdf->Cell( 36, 10, $columnLabels[1], 1, 0, 'L', true );
          $pdf->Cell( 16, 10, $columnLabels[2], 1, 0, 'C', true );
          $pdf->Cell( 20, 10, $columnLabels[3], 1, 0, 'C', true );
          $pdf->Cell( 36, 10, $columnLabels[4], 1, 0, 'L', true );
          $pdf->Cell( 25, 10, $columnLabels[5], 1, 0, 'C', true );
          $pdf->Cell( 25, 10, $columnLabels[6], 1, 0, 'C', true );

        $pdf->Ln();
    }
    // Create the data cells
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
    $pdf->SetFont( 'Arial', '', 10 );

    $pdf->Cell(28, 10, ($invoiceType->getInvoice_type()), 'LT', 0, 'L', $fill);
    $pdf->Cell(36, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(16, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(20, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'RT', 0, 'C', $fill);
    $pdf->Ln();
    foreach ($invoiceType->getReportPropertys() as $reportProperty) {
        $pdf->Cell(28, 10, (""), 'L', 0, 'C', $fill);
        $pdf->Cell(36, 10, ($reportProperty->getStreet()), 0, 0, 'L', $fill);
        $pdf->Cell(16, 10, ($reportProperty->getStreetnumber()), 0, 0, 'C', $fill);
        $pdf->Cell(20, 10, ($reportProperty->getPostcode()), 0, 0, 'C', $fill);
        $pdf->Cell(36, 10, ($reportProperty->getCity()), 0, 0, 'L', $fill);
        $pdf->Cell(25, 10, ($reportProperty->getTotal()), 0, 0, 'R', $fill);
        $pdf->Cell(25, 10, (""), 'R', 0, 'C', $fill);
        $pdf->Ln();
    }
    $pdf->Cell(28, 10, ("Total"), 'LB', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(16, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(20, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'B', 0, 'C', $fill);
    $pdf->SetFont( 'Arial', 'B', 10 );
    $pdf->Cell(25, 10, ('CHF '.$invoiceType->getTotal()), 'RB', 0, 'R', $fill);
    $pdf->Ln();

  $fill = !$fill;
  
}
  
  /**
   * PAGE 2
   */
  
$pdf->AddPage();  

$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
$pdf->SetFont( 'Arial', '', 14 );
$pdf->Cell( 0, 15, 'offene Rechnungen', 0, 0, 'C' );


$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
$pdf->Ln( 15 );

// Create the table header row
$pdf->SetFont( 'Arial', 'B', 14 );

  // Remaining header cells
$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

  $pdf->Cell( 28, 10, $columnLabels[0], 1, 0, 'L', true );
  $pdf->Cell( 36, 10, $columnLabels[1], 1, 0, 'L', true );
  $pdf->Cell( 16, 10, $columnLabels[2], 1, 0, 'C', true );
  $pdf->Cell( 20, 10, $columnLabels[3], 1, 0, 'C', true );
  $pdf->Cell( 36, 10, $columnLabels[4], 1, 0, 'L', true );
  $pdf->Cell( 25, 10, $columnLabels[5], 1, 0, 'C', true );
  $pdf->Cell( 25, 10, $columnLabels[6], 1, 0, 'C', true );

$pdf->Ln();

// Create the table data rows

$fill = false;
$row = 0;


foreach ( $invoiceNegTypes as $invoiceNegType ) {

    
    if( $pdf->GetY() >= 190){
        $pdf->AddPage();
        
        // Create the table header row
        $pdf->SetFont( 'Arial', 'B', 14 );


        // Remaining header cells
        $pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
        $pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );

          $pdf->Cell( 28, 10, $columnLabels[0], 1, 0, 'L', true );
          $pdf->Cell( 36, 10, $columnLabels[1], 1, 0, 'L', true );
          $pdf->Cell( 16, 10, $columnLabels[2], 1, 0, 'C', true );
          $pdf->Cell( 20, 10, $columnLabels[3], 1, 0, 'C', true );
          $pdf->Cell( 36, 10, $columnLabels[4], 1, 0, 'L', true );
          $pdf->Cell( 25, 10, $columnLabels[5], 1, 0, 'C', true );
          $pdf->Cell( 25, 10, $columnLabels[6], 1, 0, 'C', true );

        $pdf->Ln();
    }
    
    // Create the data cells
    $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
    $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
    $pdf->SetFont( 'Arial', '', 10 );

    $pdf->Cell(28, 10, ($invoiceNegType->getInvoice_type()), 'LT', 0, 'L', $fill);
    $pdf->Cell(36, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(16, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(20, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'T', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'RT', 0, 'C', $fill);
    $pdf->Ln();
    foreach ($invoiceNegType->getReportPropertys() as $reportNegProperty) {
        $pdf->Cell(28, 10, (""), 'L', 0, 'C', $fill);
        $pdf->Cell(36, 10, ($reportNegProperty->getStreet()), 0, 0, 'L', $fill);
        $pdf->Cell(16, 10, ($reportNegProperty->getStreetnumber()), 0, 0, 'C', $fill);
        $pdf->Cell(20, 10, ($reportNegProperty->getPostcode()), 0, 0, 'C', $fill);
        $pdf->Cell(36, 10, ($reportNegProperty->getCity()), 0, 0, 'L', $fill);
        $pdf->Cell(25, 10, ($reportNegProperty->getTotal()), 0, 0, 'R', $fill);
        $pdf->Cell(25, 10, (""), 'R', 0, 'C', $fill);
        $pdf->Ln();
    }
    $pdf->Cell(28, 10, ("Total"), 'LB', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(16, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(20, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(36, 10, (""), 'B', 0, 'C', $fill);
    $pdf->Cell(25, 10, (""), 'B', 0, 'C', $fill);
    $pdf->SetFont( 'Arial', 'B', 10 );
    $pdf->Cell(25, 10, ('CHF '.$invoiceNegType->getTotal()), 'RB', 0, 'R', $fill);
    $pdf->Ln();

  $fill = !$fill;
}

/***
  Serve the PDF
***/

$pdf->Output( "report.pdf", "I" );
?>