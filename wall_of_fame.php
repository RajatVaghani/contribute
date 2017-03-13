
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

	<link rel="stylesheet" href="css/font-awesome.min.css">


	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">



  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="150">

   <?php

		include 'includes/nav.php';

   ?>

    <!-- Begin page content -->

	<section id="main" class="sec container-fluid wallback">
        <img src="images/wreath.png" alt="" style="display:block; margin:10px auto;">
        <h1>Wall of Fame</h1>
        <h2>"The thrill of taking lasts a day. <br>The thrill of giving lasts a lifetime."</h2>
	</section>


    <section class="sec container" style="padding-bottom:30px">
        <h2 class="page-header">Contributers</h2>

        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="memberbox">
                <div class="memberphoto col-md-12" style="background-image: url('images/default_user.png');">
                    <a href="#" class="mphotohover">
                        <img src="images/view.png" alt="">
                    </a>
                </div>
                <div class="membername col-md-12">
                    sample name
                </div>
                <div class="membercontributions col-md-12">
                    16 Contributions
                </div>
            </div>
        </div>
    </section>

    <section class="sec container-fluid putname">
        <h3>PUT YOUR NAME HERE!</h3>
        <h4><a href="contactus.php">Tell us about your contribution</a></h4>
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

	<script>

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