<?php
include "../../../connection.php";
require('../../../vendor/fpdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->setMargins(30, 0, 0, 0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(260,7,'DAFTAR INVENTARIS TPA FIISABILILLAH',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->SetFont('Arial','B',12,'C');
$pdf->Cell(15,8,'No.',1,0,'C');
$pdf->Cell(80,8,'Item',1,0,'C');
$pdf->Cell(50,8,'Kategori',1,0,'C');
$pdf->Cell(30,8,'Baik',1,0,'C');
$pdf->Cell(30,8,'Buruk',1,0,'C');
$pdf->Cell(30,8,'Jumlah',1,1,'C');
$pdf->SetFont('Arial','',12,'C');

$sql = mysqli_query($connection, 'SELECT items.name, item_categories.name AS category, items.good, items.bad, 
(good+bad) AS quantity FROM items LEFT JOIN item_categories 
ON items.itemcategory_id = item_categories.id;');
$no = 1;
$good = 0;
$bad = 0;
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(15,6,$no,1,0,'C');
    $pdf->Cell(80,6,$row['name'],1,0);
    $pdf->Cell(50,6,$row['category'],1,0);
    $pdf->Cell(30,6,$row['good'],1,0,'C');
    $pdf->Cell(30,6,$row['bad'],1,0,'C');
    $pdf->Cell(30,6,$row['quantity'],1,1,'C');
    $no++;
    $good = $good + $row['good'];
    $bad = $bad + $row['bad'];
}
$sqlTotalIventory = 'SELECT SUM(good+bad) AS total_inventory FROM items ';
$queryTotalInventory = mysqli_query($connection, $sqlTotalIventory);
$row = mysqli_fetch_array($queryTotalInventory);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(145,8,'Total',1,0,'C');
$pdf->Cell(30,8, $good ,1,0,'C');
$pdf->Cell(30,8, $bad ,1,0,'C');
$pdf->Cell(30,8,$row['total_inventory'],1,1,'C');
$pdf->Output();
?>