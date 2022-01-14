<?php
include "../connection.php";
$email = $_POST['inputEmailAddress'];
$password=md5($_POST['inputPassword']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
$login=mysqli_query($connection,$sql);
$found=mysqli_num_rows($login);
$fetch= mysqli_fetch_array($login);
if ($found> 0){
    session_start();
    $_SESSION['id'] = $fetch['id'];
    $_SESSION['fullName'] = $fetch['full_name'];
    $_SESSION['email'] = $fetch['email'];
    $_SESSION['password'] = $fetch['password'];
    $_SESSION['loggedIn'] = true;
    header('location:../admin/index.php');
}
else{
    header('location:../auth/login.php?returnmessage=wrong_credentials');
}
mysqli_close($connection);
?>