<?php
include 'includes/db.php';

$code = $_POST['code'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$organization = $_POST['organization'];
$date = $_POST['date'];
$testimonial = $_POST['testimonial'];
$exp = $_POST['exp'];

$target_dir = "uploads/";
$target_file = $target_dir ."photo_". $name."_image.jpg";
$tname = $_FILES["proof"]["name"];
$tdate = str_replace("/", "_", $date);
$ext = end((explode(".", $tname))); # extra () to prevent notice
$target_proof = $target_dir. "doc_". $organization. "_".$tdate."_".substr(md5(uniqid()),0,5)."_proof.".$ext;

$uploadOk = 1;



if($code=="na"){
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image-upload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
    if($uploadOk ==1){
        if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_file)) {
            if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_proof)) {
                //echo $date;
                $flag = 0;
                if($code=="na"){
                    $flag=1;
                    $fullcode = md5(uniqid($email, true));
                    $code = substr(strtoupper($fullcode),0,5);
                }

                if($flag==0){
                    $result = mysqli_query($con,"UPDATE contributers SET `con_name`='$name', `con_phone`='$phone', `con_email`='$email', `con_photo`='$target_file'");
                }else{
                    $result = mysqli_query($con, "INSERT INTO contributers VALUES('','$name', '$phone', '$email', '$target_file', '$code')");
                }
                $conid = mysqli_insert_id($con);
                $wallquery = mysqli_query($con, "INSERT INTO wall VALUES('', $conid, '$target_proof', '$date', '$testimonial', $organization, 0)");

                $ratingquery = mysqli_query($con, "INSERT INTO ratings VALUES('', $organization, $exp)");

                //SENDMAIL

                 header('Location: find.php?s=1');
            } else {
                // header('Location: submit.php?e=1');
                echo $_FILES['image-upload']['tmp_name'];
                echo $_FILES['proof']['tmp_name'];
            }
        } else {
            // header('Location: submit.php?e=1');
        }
    }
}else{
    if (move_uploaded_file($_FILES["proof"]["tmp_name"], $target_proof)) {
        //echo $date;

        $result = mysqli_query($con,"UPDATE contributers SET `con_name`='$name', `con_phone`='$phone', `con_email`='$email', `con_photo`='$target_file'");

        $smallq = "SELECT con_id FROM contributers WHERE `con_email`='$email' AND `code`='$code'";
        $running = mysqli_query($con, $smallq);
        $rows = mysqli_fetch_array($running);

        $conid = $rows['con_id'];
        $wallquery = mysqli_query($con, "INSERT INTO wall VALUES('', $conid, '$target_proof', '$date', '$testimonial', $organization, 0)");

        $ratingquery = mysqli_query($con, "INSERT INTO ratings VALUES('', $organization, $exp)");

        //SENDMAIL

        //header('Location: find.php?s=1');
    } else {
        // header('Location: submit.php?e=1');
        echo $_FILES['image-upload']['tmp_name'];
        echo $_FILES['proof']['tmp_name'];
    }
}




?>
