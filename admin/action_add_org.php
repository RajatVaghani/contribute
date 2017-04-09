<?php

    include '../includes/db.php';

        $name = $_POST['name'];
        $category = $_POST['category'];
        $timing = $_POST['timing'];
        $description = $_POST['description'];
        $vision = $_POST['vision'];
        $founded = $_POST['founded'];
        $zip = $_POST['zip'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $url = $_POST['url'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $rep = $_POST['rep'];


        $accepts = $_POST['accepts'];

        $target_dir = "../uploads/";
        $inputtarget = "uploads/";
        $target_file = $target_dir ."photo_". $name."_image.jpg";
        $inputtarget.= $target_file;

        if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_file)) {
            $q1 = "INSERT INTO organization VALUES('', '$name', $category, '$timing', '$inputtarget', '$description', '$vision', $founded, $zip, '$city', '$street', '$url', '$email', $phone, '$rep')";
            $r1 = mysqli_query($con, $q1);
            $newid = mysqli_insert_id($con);

            for($i=0;$i<count($accepts);$i++){
                $q2 = "INSERT INTO accept VALUES('$accepts[$i]', $newid)";
                $r2 = mysqli_query($con, $q2);
            }

        }

        header('Location: add_org.php?s=1');

?>
