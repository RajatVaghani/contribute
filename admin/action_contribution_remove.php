<?php

include '../includes/db.php';

$id = $_GET['id'];
if(!isset($_GET['id'])){
    header('Location: dashboard.php');
}else{
    $q = "UPDATE wall SET verified=-1 WHERE id=$id";
    $res = mysqli_query($con, $q);
    if($_GET['page']=="pending")
        header('Location: manage_contributions.php?view=pending?r=1');
    else {
        header('Location: manage_contributions.php?view=approved?r=1');
    }
}

 ?>
