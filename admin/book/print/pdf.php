<?php
include "../../../connection.php";
require('../../../vendor/fpdf/fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(260,7,'DAFTAR BUKU TPA FIISABILILLAH',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,8,'No.',1,0,'C');
$pdf->Cell(30,8,'Kode Buku',1,0,'C');
$pdf->Cell(50,8,'Judul Buku',1,0,'C');
$pdf->Cell(30,8,'Kategori',1,0,'C');
$pdf->Cell(50,8,'Pengarang',1,0,'C');
$pdf->Cell(50,8,'Penerbit',1,0,'C');
$pdf->Cell(20,8,'Tahun',1,0,'C');
$pdf->Cell(20,8,'Rak',1,0,'C');
$pdf->Cell(20,8,'Jumlah',1,1,'C');
$pdf->SetFont('Arial','',12,'C');

$sql = mysqli_query($connection, 'SELECT books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
LEFT JOIN categories ON books.category_id = categories.id 
LEFT JOIN publishers ON books.publisher_id = publishers.id
LEFT JOIN authors ON books.author_id = authors.id;');
$no = 1;
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(10,6,$no,1,0,'C');
    $pdf->Cell(30,6,$row['number'],1,0,'C');
    $pdf->Cell(50,6,$row['title'],1,0);
    $pdf->Cell(30,6,$row['category'],1,0);
    $pdf->Cell(50,6,$row['author'],1,0);
    $pdf->Cell(50,6,$row['publisher'],1,0);
    $pdf->Cell(20,6,$row['year'],1,0,'C');
    $pdf->Cell(20,6,$row['bookshelf_number'],1,0,'C'); 
    $pdf->Cell(20,6,$row['stock_quantity'],1,1,'C');
    $no++; 
}
$sqlTotalBook = 'SELECT SUM(stock_quantity) AS total_book FROM books;';
$queryTotalBook = mysqli_query($connection, $sqlTotalBook);
$row = mysqli_fetch_array($queryTotalBook);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(260,8,'Total Buku',1,0,'C');
$pdf->Cell(20,8,$row['total_book'],1,1,'C');
$pdf->Output();
?>