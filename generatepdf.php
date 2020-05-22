<?php
//include connection file
$conn =mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");
session_start();
include_once('pdf/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('DIGI-VAULT.png',5,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    
    $this->Cell(80,10,'My Activity',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
  $display_heading = array( 'Date'=>'Date','Note_Title'=>'Note-Title','Website'=>'Website Name','Password'=>'Password','ExpenseItem'=>'Expense Item','ExpenseCost'=> 'Cost');
$result = mysqli_query($conn, "SELECT DISTINCT Date,Note_Title,Website,Password,ExpenseItem,ExpenseCost FROM useract") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM useract WHERE field != 'loginid' and field !='diary'");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
foreach($header as $heading) {
$pdf->Cell(27,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(27,10,$column,1);
}
$pdf->Output();
?>