<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$organization = $_POST['organization'];

$headers = "From: ".$email . "\r\n" .
"CC: rajat.vaghani@gmail.com";

$txt = "Body of message: ".$message . "\r\n";
$txt. = " -- From : ".$name . "\r\n";
$txt. = " -- Phone : ".$phone . "\r\n";
$txt. = " -- Organization : ".$organization . "\r\n";

if(mail("rajat.vaghani@gmail.com","Contribute Organization Contact Form",$txt,$headers)){
    header('Location: contact.php?s=1');
}else{
    header('Location: contact.php?e=1');
}


 ?>
