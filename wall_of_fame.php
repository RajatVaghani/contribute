<?php

include 'includes/db.php';
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

    <title>Contribute - Wall of Fame</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">



  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="150">

   <?php

		include 'includes/nav.php';

   ?>

    <!-- Begin page content -->

	<section id="main" class="sec container-fluid wallback">
        <img src="images/wreath.png" alt="" style="display:block; margin:10px auto;">
        <h1 class="animated bounceIn">Wall of Fame</h1>
        <h2 class="animated fadeIn" style="animation-delay: 1s;">"The thrill of taking lasts a day. <br>The thrill of giving lasts a lifetime."</h2>
	</section>


    <section class="sec container" style="padding-bottom:30px">
        <h2 class="page-header"  data-sr="wait 0.2s, move 350px, enter left 700px">Contributers</h2>


        <?php

            $q = "SELECT con_id, con_name, con_photo from contributers";
            $res = mysqli_query($con, $q);
            $totalcount=0;
            while($row = mysqli_fetch_array($res)){

                $q2 = "SELECT count(*) AS count from wall WHERE verified=1 AND con_id = ".$row['con_id'];
                $res2 = mysqli_query($con, $q2);
                $r = mysqli_fetch_array($res2);

                if($r['count']>0){
                    $totalcount++;
        ?>


                        <div class="col-md-3">
                            <div class="memberbox">
                                <div class="memberphoto col-md-12" style="background-image: url('<?php echo $row['con_photo'];?>');">
                                    <a href="#" class="mphotohover">
                                        <img src="images/view.png" alt="">
                                    </a>
                                </div>
                                <div class="membername col-md-12">
                                    <?php echo $row['con_name'];?>
                                </div>
                                <div class="membercontributions col-md-12">
                                    <?php echo $r['count'];?> Contributions
                                </div>
                            </div>
                        </div>


        <?php
                }
            }

            if($totalcount==0){
        ?>

            <div class="alert alert-info col-md-5 col-xs-12" role="alert"><h4>No contributers yet!</h4></div>

        <?php
            }


         ?>




    </section>

    <section class="sec container-fluid putname">
        <h3>PUT YOUR NAME HERE!</h3>
        <h4 data-sr="wait 0.2s, move 250px, enter bottom 0px"><a  style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Tell us about your contribution</a></h4>
    </section>




	<?php

		include 'includes/footer.php';

	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script src='js/scrollReveal.js'></script>
    <script>

	var config = { reset: false, delay: 'always' }
      window.sr = new scrollReveal(config);



	// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
	var mainbottom = $('#main').offset().top-50;

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
