<?php
require('../../../vendor/fpdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->setMargins(40, 0, 0, 0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(260,7,'DAFTAR USER SISTEM INVENTARIS FIISABILILLAH',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'No.',1,0,'C');
$pdf->Cell(100,8,'Email',1,0,'C');
$pdf->Cell(100,8,'Fullname',1,1,'C');
$pdf->SetFont('Arial','',12,'C');
include "../../../connection.php";
$no = 1;
$sql = mysqli_query($connection, 'SELECT * FROM users;');
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(20,6,$no,1,0,'C');
    $pdf->Cell(100,6,$row['email'],1,0);
    $pdf->Cell(100,6,$row['full_name'],1,1);
    $no++;
}
$pdf->Output();
?>