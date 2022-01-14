<?php
    include "../../connection.php";
    session_start();
    
    $fullName = $_POST['inputUserFullName'];
    $email = $_POST['inputUserEmail'];
    $password = md5($_POST['inputUserPassword']);

    // Insert user data into table 
    $sql = "INSERT INTO users(full_name, email, password) VALUES ('$fullName', '$email', '$password')";
    $query=mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>