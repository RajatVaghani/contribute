<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$headers = "From: ".$email . "\r\n" .
"CC: rajat.vaghani@gmail.com";

$txt = "Body of message: ".$message . "\r\n";
$txt. = " -- From : ".$name;

if(mail("rajat.vaghani@gmail.com","Contribute Individual Contact Form",$txt,$headers)){
    header('Location: contact.php?s=1');
}else{
    header('Location: contact.php?e=1');
}


 ?>
