<?php

include '../includes/db.php';

$id = $_GET['id'];
if(!isset($_GET['id'])){
    header('Location: dashboard.php');
}else{
    $q = "UPDATE wall SET verified=1 WHERE id=$id";
    $res = mysqli_query($con, $q);
    header('Location: manage_contributions.php?view=pending?s=1');

}

 ?>
