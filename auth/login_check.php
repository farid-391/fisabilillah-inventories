<?php
include "../connection.php";
session_start();
$email = $_POST['inputEmailAddress'];
$password=md5($_POST['inputPassword']);
$sql="SELECT * FROM users WHERE email='$email' AND password='$password'";

if ($_POST['inputCaptcha'] == $_SESSION["captcha_code"]) {
    $login=mysqli_query($connection,$sql);
    $found=mysqli_num_rows($login);
    $fetch= mysqli_fetch_array($login);
    if ($found> 0){
        $_SESSION['id'] = $fetch['id'];
        $_SESSION['fullName'] = $fetch['full_name'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['password'] = $fetch['password'];
        $_SESSION['loggedIn'] = true;
        header('location:../auth/login.php?returnmessage=login_success');
    }
    else{
        header('location:../auth/login.php?returnmessage=wrong_credentials');
    }
    mysqli_close($connection);
}else{
    header('location:../auth/login.php?returnmessage=wrong_captcha');
}
?>