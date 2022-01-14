<?php
include "../../../connection.php";
session_start();

$sql = 'SELECT * FROM users;';
$query = mysqli_query($connection, $sql);

header("Content-type: application/vnd-ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=Data User.xls");
include "../data.php";
?>

