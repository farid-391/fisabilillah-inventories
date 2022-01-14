<?php
include "../../../connection.php";
session_start();

$sql = 'SELECT books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
LEFT JOIN categories ON books.category_id = categories.id 
LEFT JOIN publishers ON books.publisher_id = publishers.id
LEFT JOIN authors ON books.author_id = authors.id;';
$query = mysqli_query($connection, $sql);

header("Content-type: application/vnd-ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=Data Buku.xls");
include "../data.php";
?>

