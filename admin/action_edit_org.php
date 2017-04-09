<?php

        include '../includes/db.php';

        $org_id = $_POST['org_id'];

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


            $q1 = "UPDATE organization SET `org_name`='$name', `org_category`=$category, `org_timing`='$timing', `org_description`='$description', `org_vision` = '$vision', `org_founded` = $founded, `org_zip` = $zip, `org_city` = '$city', `org_street` = '$street', `org_url` = '$url', `org_email` = '$email', `org_phone` = $phone, `org_representative` = '$rep' WHERE `org_id`=".$org_id;
            $r1 = mysqli_query($con, $q1);



            $q2 = "DELETE FROM accept WHERE org_id=".$org_id;
            $r2 = mysqli_query($con, $q2);

            for($i=0;$i<count($accepts);$i++){
                $q2 = "INSERT INTO accept VALUES('$accepts[$i]', $org_id)";
                $r2 = mysqli_query($con, $q2);
            }


        header('Location: edit_org.php?s=1');

?>
