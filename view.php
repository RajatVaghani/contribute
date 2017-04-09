<?php

$cats = ["1"=>"Orphanage", "2"=>"Old Age Home", "3"=>"Blood Bank", "4"=>"Special Schools", "5"=>"Animal Welfare", "6"=>"NGO", "7"=>"Natural Disaster Relief"];


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

    <title>Contribute - Organization Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/organizationprofile.css" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome.min.css">


    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>

<?php

include 'includes/db.php';

$org_id = $_GET['id'];

$sql="SELECT * FROM organization WHERE org_id='$org_id'";
$sql_rating = "SELECT org_id,AVG(rating) FROM ratings WHERE org_id=".$org_id." GROUP BY org_id";

$result=mysqli_query($con,$sql);
//echo $sql;

$rating = 0;

if ($result_rating=mysqli_query($con,$sql_rating))
{
    while ($row=mysqli_fetch_row($result_rating))
    {
        $rating = $row[1];
    }
}

$sql_images = "SELECT * FROM gallery WHERE org_id='$org_id'";
$result_images=mysqli_query($con,$sql_images);

while($row=mysqli_fetch_assoc($result)){
    //echo $row['org_name'];


    ?>



    <body data-spy="scroll" data-target=".navbar" data-offset="150">

        <?php

        include 'includes/nav.php';

        ?>

        <!-- Begin page content -->

        <section id="main" class="sec container-fluid" style="border-bottom:none">
            <h1 class="media-heading" style="margin-top:30px"><?php echo $row['org_name']; ?></h1>
            <div class="media">
                <div class="media-left">
                    <img class="media-object" src="<?php echo $row['org_logo'];?>" alt="img">

                </div>
                <div class="media-body">
                    <div><?php

                    $q = "SELECT * FROM accept WHERE org_id=".$row['org_id'];
                    $res = mysqli_query($con, $q);

                    while($r = mysqli_fetch_assoc($res)){
                        ?>

                        <img class="catagories-img"  data-toggle="tooltip" title="<?php echo $r['acc_value'];?>" src="images/icon_<?php echo $r['acc_value'];?>.png" alt="">

                        <?php

                    }

                    ?></div>

                    <p style="font-size:18px;"><strong>Founded in the year</strong>: <?php echo $row['org_founded']; ?></p>
                    <p style="font-size:18px;"><strong>Rating</strong>: <span style="letter-spacing: 5px;padding: 10px;" class="label label-info"><?php echo round($rating,2); ?>/5</p></span>
                </div>
            </div>
        </section>
        <section class="container-fluid" style="background:#eee;padding:20px">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail" style="padding:30px;margin-bottom:0px;min-height:230px">
                        <div class="caption" style="text-align:center">
                            <h3>Category</h3>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold"><?php echo $cats[$row['org_category']]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail"style="padding:30px;margin-bottom:0px;min-height:230px" >
                        <div class="caption" style="text-align:center">
                            <h3>Timing</h3>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold"><span class="glyphicon glyphicon-time"style="padding:5px;" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $row['org_timing']; ?><br/></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail" style="padding:30px;margin-bottom:0px;min-height:230px" >
                        <div class="caption" style="text-align:center">
                            <h3>Contributions</h3>
                            <?php
                            $q = "SELECT * FROM wall WHERE org_id = ".$org_id;
                            $re = mysqli_query($con, $q);
                            $num = mysqli_num_rows($re);

                            ?>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold"><?php echo $num; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="sec container-fluid" style="min-height: 300px;padding-top:0px;padding:50px;">
            <h1 class="page-header" >Description</h1>
            <p style="font-size:18px;"><?php echo $row['org_description']; ?></p>
        </section>

        <section class="sec container-fluid" style="padding:50px; background:#eee; min-height: 300px;padding-top:0px;">
            <h1 class="page-header">Vision</h1>
            <p style="font-size:18px;"><?php echo $row['org_vision']; ?></p>
        </section>

        <section class="container-fluid" style="padding:20px; padding-bottom:80px">
            <div class="row-sm-4 row-md-4">
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail"style="padding:40px;margin-bottom:0px;min-height:230px" >
                        <div class="caption" style="text-align:center">
                            <h3>Address</h3>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold"><?php echo $row['org_street']; ?>, <?php echo $row['org_zip']; ?>, <?php echo $row['org_city']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail"style="padding:40px;margin-bottom:0px;min-height:230px" >
                        <div class="caption" style="text-align:center">
                            <h3>Phone</h3>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $row['org_representative']; ?> at <?php echo $row['org_phone']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail"style="padding:40px 0px;margin-bottom:0px;min-height:230px" >
                        <div class="caption"style="text-align:center">
                            <h3>Details</h3>
                            <p style="font-size:18px;padding-top:10px;font-weight:bold">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $row['org_url']; ?>
                                <br/><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $row['org_email']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <?php

            $qq = "SELECT count(*) AS countz FROM gallery WHERE org_id=".$row['org_id'];
            $ress = mysqli_query($con, $qq);

            $resss = mysqli_fetch_assoc($ress);

            if($resss['countz']>0){

         ?>


        <div class="container" style="padding-bottom:80px">
            <h1 class="page-header" style="text-align:center">Gallery</h1>
            <br>
            <div class="container">
                <div id="main_area">
                    <!-- Slider -->
                    <div class="row" style="margin-bottom:15px;">
                        <div class="col-sm-6" id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets">

                                <?php  $i=0;
                                while($row_image=mysqli_fetch_assoc($result_images)){ ?>

                                    <li class="col-sm-3">
                                        <a class="thumbnail" id="carousel-selector-<?php echo $i++; ?>"><img style="height:70px" src="<?php echo $row_image['img_url']; ?>"></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-xs-12" id="slider">
                                    <!-- Top part of the slider -->
                                    <div class="row">
                                        <div class="col-sm-12" id="carousel-bounding-box">
                                            <div class="carousel slide" id="myCarousel">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner">
                                                    <!-- <div class="active item" data-slide-number="1">
                                                    <img src="http://placehold.it/470x480&text=1"></div> -->

                                                    <?php
                                                    $i = 1;
                                                    $result_images=mysqli_query($con,$sql_images);
                                                    while($row_image=mysqli_fetch_assoc($result_images)){ ?>
                                                        <div class="<?php if($i==1) echo 'active '; ?> item" data-slide-number="<?php echo $i++; ?>">
                                                            <img style="height:300px" src="<?php echo $row_image['img_url']; ?>"></div>

                                                            <?php } ?>
                                                        </div>
                                                        <!-- Carousel nav -->
                                                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                        </a>
                                                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Slider-->
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                }
                }
                ?>


                <?php

                include 'includes/footer.php';

                ?>


                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.scrollTo.min.js"></script>

                <script>


                jQuery(document).ready(function($) {

                    $('#myCarousel').carousel({
                        interval: 5000
                    });

                    //Handles the carousel thumbnails
                    $('[id^=carousel-selector-]').click(function () {
                        var id_selector = $(this).attr("id");
                        try {
                            var id = /-(\d+)$/.exec(id_selector)[1];
                            console.log(id_selector, id);
                            jQuery('#myCarousel').carousel(parseInt(id));
                        } catch (e) {
                            console.log('Regex failed!', e);
                        }
                    });
                    // When the carousel slides, auto update the text
                    $('#myCarousel').on('slid.bs.carousel', function (e) {
                        var id = $('.item.active').data('slide-number');
                        $('#carousel-text').html($('#slide-content-'+id).html());
                    });
                });

                // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
                var mainbottom = $('#main').offset().top;

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
