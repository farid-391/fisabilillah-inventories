<?php
    include "../../connection.php";
    session_start();
    
	$id = $_POST['editUserId'];
    $fullName = $_POST['editUserFullName'];
    $email = $_POST['editUserEmail'];
    $password = md5($_POST['editUserPassword']);

    // Insert user data into table 
    $sql = "UPDATE users SET email = '$email', full_name = '$fullName', password = '$password' WHERE id = '$id' ";
    $query=mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>