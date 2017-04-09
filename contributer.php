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

    <title>Contribute - Contributer Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/contributer.css" rel="stylesheet">


    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="100">

    <?php

    include 'includes/nav.php';

    ?>

    <?php

    include 'includes/db.php';

    $con_id = $_GET['id'];

    $sql_contributions="SELECT * FROM wall WHERE con_id='$con_id' AND verified = 1";
    $sql_contributor="SELECT * FROM contributers WHERE con_id='$con_id'";

    $result_contributor=mysqli_query($con,$sql_contributor);
    $result_contributions=mysqli_query($con,$sql_contributions);
    //echo $sql;

    while($row=mysqli_fetch_assoc($result_contributor)){


        ?>


        <!-- Begin page content -->

        <section id="main" class="sec container-fluid" style="margin-bottom:30px; min-height:180px;background: #006064;">
            <div class="row">
                <div class="col-md-3">
                    <img  style="float:right;"class="thumbnail" src="<?php echo $row['con_photo']; ?>" alt="...">
                </div>
                <div class="col-md-9">
                    <p style="font-size:37px;text-align:left;margin-top:40px;color:#f7f7f7;"><?php
                    echo $row['con_name'];
                    ?></p>
                </div>
            </div>
        </section>
        <?php } ?>

        <section>

            <?php
            while($row=mysqli_fetch_assoc($result_contributions)){
                $org_id = $row['org_id'];
                $sql_org = "SELECT * FROM organization WHERE org_id='$org_id'";
                $result_orgs=mysqli_query($con,$sql_org);
                while($row_org=mysqli_fetch_assoc($result_orgs)){
                    ?>
                    <div class="container">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?php echo $row_org['org_name']; ?></h3>
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="<?php echo $row_org['org_logo']; ?>" style="border-radius:4px;padding:0px" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <p class="media-heading"><strong>Testimonial: </strong><?php echo $row['con_testimonial']; ?></p>
                                            <p style="text-align:top;"><strong>Date:</strong> <?php echo $row['con_date']; ?><p>

                                            </div>

                                        </div>
                                    </div>
                                    <a href="view.php?id=<?php echo $row_org['org_id'];?>"  class="btn fillbtn" style="margin-left: 0px;font-size: 13px;width: auto;padding: 5px 15px;margin:14px">View Organization</a>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </section>
















                    <?php

                    include 'includes/footer.php';

                    ?>


                    <!-- Bootstrap core JavaScript
                    ================================================== -->
                    <!-- Placed at the end of the document so the pages load faster -->
                    <script src="js/jquery.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script>
                    $('[data-toggle="popover"]').popover()
                    </script>
                    <script src="js/jquery.scrollTo.min.js"></script>

                    <script>

                    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
                    var mainbottom = $('#main').offset().top - 50;

                    // on scroll,
                    $(window).on('scroll',function(){

                        // we round here to reduce a little workload
                        var stop = Math.round($(window).scrollTop());

                        if (stop > mainbottom) {
                            $('.navbar').addClass('past-main');
                        } else {
                            $('.navbar').removeClass('past-main');
                        }

                    });

                    </script>
                </body>
                </html>
