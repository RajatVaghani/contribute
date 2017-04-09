<?php

include '../includes/db.php';

if (isset($_POST['submit'])) {
    $j = 0;     // Variable for indexing uploaded image.
    $target_path = "../uploads/gallery/";     // Declaring Path for uploaded images.
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        // Loop to get individual element from the array
        $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
        $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
        $file_extension = end($ext); // Store extensions in the variable.
        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
        $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
        if (($_FILES["file"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
                // If file moved to uploads folder.
                $orgid = $_POST['org'];
                $q = "INSERT INTO gallery VALUES($orgid, '".substr($target_path,3)."')";
                $r = mysqli_query($con, $q);
                echo '<div class="alert alert-success">Image uploaded successfully!</div><br/>';
            } else {     //  If File Was Not Moved.
                echo '<div class="alert alert-danger">please try again!</div><br/><br/>';
            }
        } else {     //   If File Size And File Type Was Incorrect.
            echo '<div class="alert alert-danger">***Invalid file Size or Type***</alert><br/><br/>';
        }
    }
}
?>
