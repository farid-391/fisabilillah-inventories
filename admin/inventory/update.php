<?php
    include "../../connection.php";
    session_start();
    
	$itemId = $_POST['editItemId'];
    $itemName = $_POST['editItemName'];
    $itemCategory = $_POST['editItemCategory'];
    $itemGood = $_POST['editItemGood'];
	$itemBad = $_POST['editItemBad'];

    // Insert user data into table 
    $sql = "UPDATE items SET name = '$itemName', itemcategory_id = '$itemCategory', good = '$itemGood', bad = '$itemBad' WHERE id = '$itemId' ";
    $query=mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>