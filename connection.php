<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "fisabilillah_inventories";
$connection = @mysqli_connect($host,$username,$password,$databasename);
if (!$connection) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
?>