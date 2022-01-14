<?php
    include "../../connection.php";
    session_start();
    
    $id=$_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    $query=mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>