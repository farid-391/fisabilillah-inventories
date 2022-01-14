<?php
include "../../../connection.php";
session_start();

$sql = 'SELECT items.name, item_categories.name AS category, items.good, items.bad,
    (good+bad) AS quantity FROM items LEFT JOIN item_categories 
    ON items.itemcategory_id = item_categories.id;';

$query = mysqli_query($connection, $sql);

header("Content-type: application/vnd-ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=Data Inventaris.xls");
include "../data.php";
?>

