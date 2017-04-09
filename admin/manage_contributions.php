<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
}

$view = $_GET['view'];
if(!isset($_GET['view']) || ($_GET['view']!="pending" && $_GET['view']!="approved") ){
    header('Location: dashboard.php');
}

include '../includes/db.php';

$aq = "SELECT count(*) AS count FROM wall WHERE verified=0";
$rq = mysqli_query($con, $aq);
$rr = mysqli_fetch_assoc($rq);
$cq = $rr['count'];
if($cq==0)
$cq = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Contribute - Admin - Manage Contributions</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/font-awesome.min.css">


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="150">

    <?php

    include '../includes/admin_nav.php';

    ?>

    <!-- Begin page content -->

    <section id="main" class="sec container-fluid" style="min-height:180px;background: #006064;">
        <h3 style="text-align:center;color:#f7f7f7;">Welcome, <?php echo $_SESSION['name'];?>!</h3>
    </section>


    <section id="adminnav" class="sec container" style="min-height:110px;border-bottom:none;">
        <ul class="nav nav-tabs nav-justified">
            <li role="presentation"><a href="dashboard.php">Dashboard</a></li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Manage Organizations <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="add_org.php">Add</a></li>
                    <li><a href="edit_org.php">Edit</a></li>
                </ul>
            </li>
            <li role="presentation" class="active" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Manage Contributions <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="manage_contributions.php?view=approved">View Approved</a></li>
                    <li><a href="manage_contributions.php?view=pending">View Pending <span class="badge"><?php echo $cq;?></span></a></li>
                </ul>
            </li>
            <li role="presentation"><a href="add_gallery.php">Add Gallery</a></li>
        </ul>
    </section>

    <section class="sec container">
        <h3 class="page-header"><?php echo ucfirst($view);?> Contributions</h3>

        <?php


        if(isset($_GET['r'])){
        ?>
            <div class="col-md-7 alert alert-danger">
                <h5>Contribution removed successfully</h5>
            </div>
        <?php
        }

        if(isset($_GET['s'])){
        ?>
        <div class="col-md-7 alert alert-success">
            <h5>Contribution added successfully</h5>
        </div>
        <?php
        }

        if($view == "pending"){
            $q = "SELECT * FROM wall WHERE verified=0";
            $res = mysqli_query($con, $q);
        }else{
            $q = "SELECT * FROM wall WHERE verified=1";
            $res = mysqli_query($con, $q);
        }

        while($rows = mysqli_fetch_assoc($res)){
            $conq = "SELECT con_id, con_name, con_photo from contributers WHERE con_id=".$rows['con_id'];
            $conres = mysqli_query($con, $conq);
            $conrow = mysqli_fetch_assoc($conres);

            $orgq = "SELECT org_id, org_name from organization WHERE org_id=".$rows['org_id'];
            $orgres = mysqli_query($con, $orgq);
            $orgrow = mysqli_fetch_assoc($orgres);
            ?>

            <div class="col-md-12" style="margin-top:25px; padding: 20px;">
                <div class="box col-md-12" style="padding:10px">
                    <div class="col-md-2">
                        <img src="../<?php echo $conrow['con_photo'];?>" class="thumbnail img-responsive" alt="">
                    </div>
                    <div class="col-md-10">
                        <h4>Contribution by: <a class="special_link" target="_blank" href="../contributer.php?id=<?php echo $conrow['con_id'];?>"><?php echo $conrow['con_name']; ?></a></h4>
                        <h4>Contributed to: <a class="special_link" target="_blank" href="../view.php?id=<?php echo $orgrow['org_id'];?>"><?php echo $orgrow['org_name']; ?></a></h4>
                        Date: <?php echo $rows['con_date']; ?>
                    </div>
                    <div class="col-md-12" style="margin-top:10px">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="../<?php echo $rows['con_doc']; ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> View Document</a>
                            <a href="action_contribution_remove.php?id=<?php echo $rows['id'];?>&page=<?php echo $view;?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            <?php if($view=="pending") {?>
                            <a href="action_contribution_approve.php?id=<?php echo $rows['id'];?>" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:30px">
                        <div class="well">
                            <blockquote>
                                <p><?php echo $rows['con_testimonial']; ?></p>
                            </blockquote>
                        </div>

                    </div>
                </div>
            </div>


            <?php
        }
        ?>

        <br><br><br><br>    <br><br><br><br>
    </section>

    <br><br>

    <?php

    include '../includes/admin_footer.php';

    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>

    <script>

    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
    var mainbottom = $('#main').offset().top;

    // on scroll,
    $(window).on('scroll',function(){

        // we round here to reduce a little workload
        var stop = Math.round($(window).scrollTop());

        if (stop > 0) {
            $('.navbar').addClass('past-main');
        } else {
            $('.navbar').removeClass('past-main');
        }

    });



    </script>
</body>
</html>
