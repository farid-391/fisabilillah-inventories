<?php
    include "../../connection.php";
    session_start();
    
    $itemName = $_POST['inputItemName'];
    $itemCategory = $_POST['inputItemCategory'];
    $itemGoodQty = $_POST['inputItemGood'];
    $itemBadQty = $_POST['inputItemBad'];

    // Insert user data into table 
    $sql= "INSERT INTO items(name, itemcategory_id, good, bad) VALUES('$itemName','$itemCategory', '$itemGoodQty','$itemBadQty')";
    $query = mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>