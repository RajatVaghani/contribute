<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

include '../includes/db.php';

$q = "SELECT * FROM admin WHERE admin_email='$email' AND admin_password='$password'";
$res = mysqli_query($con, $q);

if(mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_array($res);
    $_SESSION['name'] = $row['admin_name'];
    $_SESSION['id'] = $row['admin_id'];
    $_SESSION['email'] = $row['admin_email'];
    $_SESSION['loggedin'] = 1;

    header('Location: dashboard.php');

}


 ?>
